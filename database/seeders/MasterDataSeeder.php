<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MasterDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // ==========================================
        // 1. DATA PLATFORMS
        // ==========================================
        $platforms = [
            ['name' => 'LinkedIn', 'slug' => 'linkedin'],
            ['name' => 'Instagram (Feed)', 'slug' => 'instagram-feed'],
            ['name' => 'Instagram (Story)', 'slug' => 'instagram-story'],
            ['name' => 'Twitter / X', 'slug' => 'twitter'],
            ['name' => 'TikTok (Script)', 'slug' => 'tiktok'],
            ['name' => 'Facebook', 'slug' => 'facebook'],
            ['name' => 'Medium / Blog', 'slug' => 'medium'],
        ];

        // Masukkan data platforms
        DB::table('platforms')->insert($this->addTimestamps($platforms, $now));


        // ==========================================
        // 2. DATA TONES (Nada Bicara)
        // ==========================================
        $tones = [
            [
                'name' => 'Profesional',
                'ai_instruction' => 'Gunakan bahasa yang formal, objektif, dan sopan. Hindari penggunaan slang atau emoji yang berlebihan. Fokus pada kredibilitas dan kejelasan data.'
            ],
            [
                'name' => 'Kasual / Santai',
                'ai_instruction' => 'Gunakan bahasa sehari-hari yang akrab dan mudah dimengerti. Boleh menggunakan slang yang wajar dan emoji untuk membuat suasana lebih hidup. Seperti berbicara kepada teman.'
            ],
            [
                'name' => 'Humoris / Lucu',
                'ai_instruction' => 'Buat konten terasa menghibur dengan selipan humor atau jokes ringan. Gunakan gaya bahasa yang santai dan tidak kaku, namun tetap menyampaikan pesan utama.'
            ],
            [
                'name' => 'Persuasif / Jualan',
                'ai_instruction' => 'Fokus pada teknik copywriting (AIDA/PAS). Gunakan kata-kata yang memicu emosi, urgency, dan diakhiri dengan Call to Action (CTA) yang kuat untuk mengajak audiens bertindak.'
            ],
            [
                'name' => 'Edukatif / Informatif',
                'ai_instruction' => 'Jelaskan topik dengan mendalam namun mudah dipahami. Gunakan analogi jika perlu. Fokus pada memberikan nilai tambah (value) dan wawasan baru bagi pembaca.'
            ],
            [
                'name' => 'Empatik',
                'ai_instruction' => 'Gunakan nada bicara yang lembut, penuh pengertian, dan suportif. Tunjukkan kepedulian terhadap masalah atau perasaan audiens.'
            ],
            [
                'name' => 'Storytelling',
                'ai_instruction' => 'Sampaikan pesan dalam bentuk cerita atau narasi. Mulai dengan hook yang menarik, bangun alur cerita, dan akhiri dengan pesan moral atau kesimpulan.'
            ],
        ];

        // Masukkan data tones
        DB::table('tones')->insert($this->addTimestamps($tones, $now));


        // ==========================================
        // 3. DATA LANGUAGES
        // ==========================================
        $languages = [
            ['name' => 'Bahasa Indonesia', 'code' => 'id'],
            ['name' => 'English (US)', 'code' => 'en-us'],
            ['name' => 'English (UK)', 'code' => 'en-uk'],
            ['name' => 'Javanese (Basa Jawa)', 'code' => 'jv'],
        ];

        // Masukkan data languages
        DB::table('languages')->insert($this->addTimestamps($languages, $now));
    }

    /**
     * Helper kecil untuk menambahkan timestamp ke setiap array
     */
    private function addTimestamps(array $data, Carbon $now): array
    {
        return array_map(function ($item) use ($now) {
            return array_merge($item, [
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }, $data);
    }
}
