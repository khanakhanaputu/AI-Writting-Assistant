<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function index()
    {
        return view('test.test');
    }
    public function TestResponse(Request $request)
    {

        /** @var Response $response */
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'x-goog-api-key' => env('GEMINI_API_KEY'),
        ])->post(
            'https://generativelanguage.googleapis.com/v1/models/gemini-2.5-flash:generateContent',
            [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $request['prompt']]
                        ]
                    ]
                ]
            ]
        );

        if ($response->successful()) {
            // Ambil teks hasil generate dari struktur JSON Gemini
            return $response->json('candidates.0.content.parts.0.text');
        }

        return "Terjadi kesalahan: " . $response->body();
    }
}
