<?php

namespace App\Http\Controllers;

use App\Models\Phishing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Throwable;
use Illuminate\Support\Facades\Log;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\DB;


class PhishingController extends Controller
{

    public function index(Request $request)
    {
        if (auth()->check()) {
            session(['acces' => 'user']);
        } else {
            session(['acces' => 'umum']);
        }

        session(['user_id' => 123]);


        $agent = new Agent();
        $ip = $request->ip();
        session(['ip' => $ip]);
        // Lokasi IP
        $response = @file_get_contents("http://ipinfo.io/{$ip}/json");
        $details = @json_decode($response);

        $ip = '192.178.2';
        $useracces = DB::select(
            "SELECT ip 
             FROM ip_logs
             WHERE ip = ? 
               AND createdate BETWEEN CURDATE() AND CURDATE() + INTERVAL 1 DAY - INTERVAL 1 SECOND",
            [$ip]
        );

        // Jika belum ada, maka insert
        if (count($useracces) == 0) {
            DB::statement(
                "INSERT INTO ip_logs 
                (ip, city, region, country, location, device, platform, browser, user_agent, createdate) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
                [
                    $ip,
                    $details->city ?? 'Unknown',
                    $details->region ?? 'Unknown',
                    $details->country ?? 'Unknown',
                    $details->loc ?? 'Unknown',
                    $agent->device(),
                    $agent->platform() . ' ' . $agent->version($agent->platform()),
                    $agent->browser() . ' ' . $agent->version($agent->browser()),
                    $request->header('User-Agent'),
                    now(),
                ]
            );
        }
        return view('main.home', [
            'ip' => $ip,
            'city' => $details->city ?? 'Unknown',
            'region' => $details->region ?? 'Unknown',
            'country' => $details->country ?? 'Unknown',
            'location' => $details->loc ?? 'Unknown',
            'device' => $agent->device(),
            'platform' => $agent->platform() . ' ' . $agent->version($agent->platform()),
            'browser' => $agent->browser() . ' ' . $agent->version($agent->browser()),
            'user_agent' => $request->header('User-Agent')
        ]);
    }
    public function index2(Request $request)
    {

        session(['id_user' => 123]);
        $agent = new Agent();
        $ip = $request->ip();
        session(['ip' => $ip]);
        // Lokasi IP
        $response = @file_get_contents("http://ipinfo.io/{$ip}/json");
        $details = @json_decode($response);


        return view('phishing', [
            'ip' => $ip,
            'city' => $details->city ?? 'Unknown',
            'region' => $details->region ?? 'Unknown',
            'country' => $details->country ?? 'Unknown',
            'location' => $details->loc ?? 'Unknown',
            'device' => $agent->device(),
            'platform' => $agent->platform() . ' ' . $agent->version($agent->platform()),
            'browser' => $agent->browser() . ' ' . $agent->version($agent->browser()),
            'user_agent' => $request->header('User-Agent')
        ]);
    }

    // public function index()
    // {
    //     return view('phishing');
    // }

    public function check(Request $request)
    {
        $request->validate([
            'url' => 'required|string'
        ]);

        $url = $request->input('url');

        // Normalize the URL - add https:// if no protocol is specified
        if (!preg_match('/^https?:\/\//', $url)) {
            $url = 'https://' . $url;
        }

        // Validate the normalized URL
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return response()->json(['error' => 'Invalid URL format'], 400);
        }

        try {
            // Log the request
            Log::info('Sending request to Flask API', ['original_url' => $request->input('url'), 'normalized_url' => $url]);

            $response = Http::timeout(30)->post('http://localhost:5000/predict', ['url' => $url]);

            // Log the raw response for debugging
            Log::info('Flask API Response', [
                'status' => $response->status(),
                'headers' => $response->headers(),
                'body_preview' => substr($response->body(), 0, 500)
            ]);

            // Check if response failed
            if ($response->failed()) {
                Log::error('Flask API failed', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                return response()->json(['error' => 'Flask API returned error: ' . $response->status()], 500);
            }

            // Check content type
            $contentType = $response->header('Content-Type');
            if (!$contentType || !str_contains($contentType, 'application/json')) {
                Log::error('Flask API returned non-JSON', [
                    'content_type' => $contentType,
                    'body' => $response->body()
                ]);
                return response()->json(['error' => 'Flask API returned non-JSON response'], 500);
            }

            $data = $response->json();

            if (is_null($data)) {
                Log::error('Failed to parse JSON from Flask API', [
                    'body' => $response->body(),
                    'json_error' => json_last_error_msg()
                ]);
                return response()->json(['error' => 'Invalid JSON response from Flask API'], 500);
            }

            // Log successful response
            Log::info('Flask API success', ['data' => $data]);
        } catch (\Exception $e) {
            Log::error('Exception calling Flask API', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['error' => 'Failed to connect to Flask API: ' . $e->getMessage()], 500);
        }

        $trustedDomains = json_decode(file_get_contents(storage_path('app/trusted_domain.json')), true);

        $domain = $data['domain'] ?? null;

        $isTrusted = collect($trustedDomains)->contains(function ($trusted) use ($domain) {
            return $domain && str_ends_with($domain, $trusted);
        });

        $prediction = $data['prediction'] ?? 'phishing';
        $confidence = $data['confidence'] ?? 0;
        $adjustedConfidence = $confidence;

        if ($prediction === 'phishing' && $isTrusted) {
            $adjustedConfidence = max(0, $confidence - 0.3);
        }
        // Jika model bilang ini legit tapi domain tidak trusted → kurangi sedikit confidence legit
        elseif ($prediction === 'legitimate' && !$isTrusted) {
            $adjustedConfidence = max(0, $confidence - 0.1);
        }

        // Lalu prediksi akhirnya tetap mengacu ke label & confidence
        $finalPrediction = $prediction;
        if ($adjustedConfidence < 0.5) {
            // Jika confidence rendah, kita bisa kasih warning
            $finalPrediction .= '_low_confidence';
        }
        // Storage::put('debug_extracted.json', json_encode($data['extracted_content']));
        $ip = session('ip');
        $id_user = session('id_user') ?? '';
        Phishing::create([
            'url' => $data['url'] ?? $url,
            // 'ip' => $ip,
            // 'id_user' => $id_user ?? '',
            'prediction' => $data['prediction'] ?? '',
            'confidence' => $data['confidence'] ?? 0,
            'domain' => $data['domain'] ?? [],
            'phishing_probability' => $data['phishing_probability'] ?? 0,
            'nameservers' => $data['nameservers'] ?? [],
            'features' => $data['features'] ?? [],
            'extracted_content' => json_encode($data['extracted_content'] ?? [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PARTIAL_OUTPUT_ON_ERROR),
            'adjusted_confidence' => $adjustedConfidence,
            'final_prediction' => $finalPrediction,
            'trusted_domain' => $isTrusted,
        ]);

        // $llmAnalysis = 'Analisis LLM tidak tersedia atau gagal.';

        // try {
        //     // Kirim konten ke Flask untuk analisis LLM
        //     $llmResponse = Http::timeout(60)->get('http://localhost:5002/llm-analyze/' . $phishing->id);

        //     // Log respons dari LLM API untuk debugging
        //     Log::info('LLM API Response:', [
        //         'status' => $llmResponse->status(),
        //         'body' => $llmResponse->json()
        //     ]);

        //     // Ambil data LLM hanya jika request berhasil
        //     if ($llmResponse->successful()) {
        //         $llmData = $llmResponse->json();
        //         $llmAnalysis = $llmData['llm_insight'] ?? 'Gagal mendapatkan insight dari respons LLM.';
        //     }
        // } catch (Throwable $e) {
        //     // Tangkap error koneksi atau lainnya dan catat di log
        //     Log::error('Gagal saat menghubungi LLM service: ' . $e->getMessage());

        // }

        // $data['llm_analysis'] = $llmAnalysis;

        // // Simpan hasil gabungan analisis ke database
        // $phishing->update([
        //     'llm_analysis' => $llmAnalysis
        // ]);

        return response()->json($data);
    }
}
