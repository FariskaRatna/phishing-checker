<?php

namespace App\Http\Controllers;

use App\Models\Phishing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
// use Illuminate\Support\Facades\Storage;


class PhishingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        $response = Http::post('http://localhost:5000/predict', ['url' => $url]);

        $data = $response->json();

        // Storage::put('debug_extracted.json', json_encode($data['extracted_content']));

        $phishing = Phishing::create([
            'url' => $data['url'] ?? $url,
            'prediction' => $data['prediction'] ?? '',
            'confidence' => $data['confidence'] ?? 0,
            'phishing_probability' => $data['phishing_probability'] ?? 0,
            'nameservers' => $data['nameservers'] ?? [],
            'features' => $data['features'] ?? [],
            'extracted_content' => json_encode($data['extracted_content'] ?? [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PARTIAL_OUTPUT_ON_ERROR),
        ]); // Removed json_encode here

        $llmResponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('OPENROUTER_API_KEY'), // Use .env variable
            'HTTP-Referer' => config('app.url'), // Use app.url config
            'X-Title' => 'Phishing Content Analysis'
        ])->post('https://openrouter.ai/api/v1/chat/completions', [
            'model' => 'mistralai/mistral-small-3.2-24b-instruct:free',
            'messages' => [
                 [
                    'role' => 'system',
                    'content' => 'You are a helpful assistant specialized in detecting phishing content. Please respond briefly and concisely.'
                ],
                [
                    'role' => 'user',
                    'content' => "Berikut ini adalah hasil ekstraksi konten dari sebuah halaman web:\n\n" . 
                                json_encode($data['extracted_content'] ?? [], JSON_PRETTY_PRINT) . 
                                "\n\nApa indikasi bahwa halaman ini phishing? Jawab maksimal 5 poin singkat saja."
                ]
            ]
        ])->throw(); 
        $llmData = $llmResponse->json()['choices'][0]['message']['content'] ?? null;

        $phishing->save();

        $phishing->update(['llm_analysis' => $llmData]); // Store the LLM analysis to database


        return response()->json([
            'prediction' => $phishing->prediction,
            'confidence' => $phishing->confidence,
            'llm_analysis' => $llmData // Return LLM response to client
        ]);
    }
}
