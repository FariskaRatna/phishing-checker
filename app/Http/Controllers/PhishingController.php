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

        Phishing::create([
            'url' => $data['url'] ?? $url,
            'prediction' => $data['prediction'] ?? '',
            'confidence' => $data['confidence'] ?? 0,
            'phishing_probability' => $data['phishing_probability'] ?? 0,
            'nameservers' => $data['nameservers'] ?? [],
            'features' => $data['features'] ?? [],
            'extracted_content' => json_encode($data['extracted_content'] ?? [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PARTIAL_OUTPUT_ON_ERROR),
            // 'forms' => json_encode($data['extracted_content']['forms'] ?? []),
            // 'heads' => json_encode($data['extracted_content']['heads'] ?? []),
            // 'titles' => json_encode($data['extracted_content']['titles'] ?? []),
            // 'scripts' => json_encode($data['extracted_content']['scripts'] ?? []),
        ]);

        return response()->json($data);
    }
}
