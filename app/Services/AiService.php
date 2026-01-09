<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AiService
{
    public static function AiFetch(String $prompt)
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
                            ['text' => $prompt]
                        ]
                    ]
                ]
            ]
        );

        if ($response->successful()) {
            $result = $response->json('candidates.0.content.parts.0.text');
            return $result;
        }
        $result = "Terjadi Kesalahan";
        return $result;
    }
}
