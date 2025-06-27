<?php

namespace App\Http\Controllers;

use App\Models\Phishing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Throwable;
use Illuminate\Support\Facades\Log;

class PhishingController extends Controller
{
    public function index()
    {
        return view('phishing');
    }

    public function check(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $url = $request->input('url');

        try {
            // Kirim request POST ke Flask API untuk analisis phishing
            $response = Http::timeout(30)->post('http://localhost:5000/predict', ['url' => $url]);

            if ($response->failed()) {
                // This handles 4xx and 5xx responses from the Flask API
                Log::error('Phishing API returned a failed status.', ['status' => $response->status(), 'body' => $response->body()]);
                return response()->json(['error' => 'Layanan analisis phishing mengembalikan error.'], 500);
            }

            // Try to decode the JSON response. This can fail if the body is not valid JSON.
            $data = $response->json();

            if (is_null($data)) {
                throw new \Exception('Failed to decode JSON from Phishing API. Body: ' . $response->body());
            }

            // Log the successful response
            Log::info('Phishing API Response:', ['status' => $response->status(), 'body' => $data]);
        } catch (Throwable $e) {
            // This handles connection errors and JSON decoding errors
            Log::error('Gagal berkomunikasi dengan layanan analisis phishing: ' . $e->getMessage());
            return response()->json(['error' => 'Gagal berkomunikasi dengan layanan analisis phishing.'], 500);
        }

        Storage::put('debug_extracted.json',json_encode($data['extracted_content']));

        // Simpan hasil analisis phishing ke database
        $phishing = Phishing::create([
            'url' => $data['url'] ?? $url,
            'prediction' => $data['prediction'] ?? '',
            'confidence' => $data['confidence'] ?? 0,
            'phishing_probability' => $data['phishing_probability'] ?? 0,
            'nameservers' => $data['nameservers'] ?? [],
            'features' => $data['features'] ?? [],
            'extracted_content' => json_encode($data['extracted_content'] ?? [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PARTIAL_OUTPUT_ON_ERROR),
        ]);
        
        $llmAnalysis = 'Analisis LLM tidak tersedia atau gagal.';

        try {
            // Kirim konten ke Flask untuk analisis LLM
            $llmResponse = Http::timeout(60)->get('http://localhost:5002/llm-analyze/' . $phishing->id);

            // Log respons dari LLM API untuk debugging
            Log::info('LLM API Response:', [
                'status' => $llmResponse->status(),
                'body' => $llmResponse->json()
            ]);

            // Ambil data LLM hanya jika request berhasil
            if ($llmResponse->successful()) {
                $llmData = $llmResponse->json();
                $llmAnalysis = $llmData['llm_insight'] ?? 'Gagal mendapatkan insight dari respons LLM.';
            }
        } catch (Throwable $e) {
            // Tangkap error koneksi atau lainnya dan catat di log
            Log::error('Gagal saat menghubungi LLM service: ' . $e->getMessage());
            
        }

        $data['llm_analysis'] = $llmAnalysis;

        // Simpan hasil gabungan analisis ke database
        $phishing->update([
            'llm_analysis' => $llmAnalysis
        ]);

        // Kirimkan hasil analisis kembali ke frontend
        return response()->json($data);
    }
}
