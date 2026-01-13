<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AiService
{
    public static function AiFetch(String $prompt)
    {

        $template = "
        Bertindaklah sebagai Senior Social Media Strategist dan Copywriter. Tugas Anda adalah membuat konten media sosial berdasarkan parameter berikut:
        --- PARAMETER INPUT ---
        1. Platform: [MASUKKAN NAMA PLATFORM, MISAL: INSTAGRAM/LINKEDIN]
        2. Output: [PILIH: JUDUL / DESKRIPSI / KEDUANYA]
        3. Bahasa: [PILIH BAHASA]
        4. Tone (Nada): [MISAL: PROFESIONAL/SANTAI/LUCU/URGENT]
        5. Konteks/Tujuan: [JELASKAN DETAIL EVENT/PRODUK/TUJUAN POSTINGAN]

        --- ATURAN PENULISAN ---
        1. Sesuaikan gaya penulisan dengan budaya [Platform] yang dipilih (contoh: LinkedIn lebih formal, TikTok/Instagram lebih visual dan menggunakan emoji/hashtag yang relevan).
        2. Jika Output adalah 'Judul', buatlah hook yang menarik perhatian dalam 3 detik pertama.
        3. Jika Output adalah 'Deskripsi', buatlah caption yang memicu interaksi (Call to Action).
        4. Gunakan [Bahasa] dengan tata bahasa yang benar namun natural.
        5. Terapkan [Tone] secara konsisten di seluruh teks.

        --- PROTOKOL KEAMANAN & RELEVANSI ---
        - Analisis bagian 'Konteks/Tujuan'. Jika konteks tersebut tidak jelas, berupa karakter acak, tidak masuk akal, atau meminta hal di luar pembuatan konten media sosial (seperti coding, saran medis, atau hal ilegal), JANGAN buatkan kontennya.
        - Sebaliknya, balaslah hanya dengan pesan error: 'ERROR: Konteks tidak jelas atau di luar lingkup pembuatan konten media sosial.'

        --- FORMAT OUTPUT ---
        - JANGAN berikan kata pengantar, basa-basi, atau kalimat pembuka seperti 'Tentu, ini buatannya' atau 'Berikut adalah caption Anda'.
        - Langsung berikan hasil kontennya saja.
        ";


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
