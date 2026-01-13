<?php

namespace Database\Seeders;

use App\Models\Platform;
use App\Models\Tone;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Tone::truncate();
        Tone::insert([
            [
                'tone_name' => 'funny',
                'description' => 'agar menjadi tone lebih senang mantap dan keren'
            ],
            [
                'tone_name' => 'professional',
                'description' => 'untuk profesional dan orang serius mantap jiwa'
            ]
        ]);

        Platform::truncate();
        Platform::insert([
            [
                'platform_name' => 'instagram'
            ],
            [
                'platform_name' => 'Facebook'
            ]
        ]);
    }
}
