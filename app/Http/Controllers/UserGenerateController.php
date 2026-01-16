<?php

namespace App\Http\Controllers;

use App\Services\UserGenerate;
use Illuminate\Http\Request;

class UserGenerateController extends Controller
{
    private $generateResponse;
    public function __construct()
    {
        $this->generateResponse = new UserGenerate();
    }
    public function generate(Request $request)
    {
        $validated = $request->validate([
            'context'       => 'required|string|min:1|max:2000',
            'platform_id'   => 'required|exists:platforms,id', // Cek apakah ID ada di tabel platforms
            'language_id'   => 'required|exists:languages,id',  // Cek apakah ID ada di tabel languages
            'tone_id'       => 'required|exists:tones,id',      // Cek apakah ID ada di tabel tones
            'output_length' => 'nullable|string|max:100',
        ], [

            'platform_id.exists' => 'Platform yang dipilih tidak valid.',
            'tone_id.exists'     => 'Tone yang dipilih tidak tersedia.',
            'language_id.exists' => 'Bahasa yang dipilih tidak didukung.',
        ]);

        return $this->generateResponse->generatePrompt($validated);
    }
}
