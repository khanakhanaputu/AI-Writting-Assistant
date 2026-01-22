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
        // 1. Master Data (Platforms, Tones, Languages)
        $this->call(MasterDataSeeder::class);

        // 2. Create Users (1000 users, password '1234567890')
        $users = User::factory(1000)->create();

        // 3. Create Transactions (10000 records)
        // Recycle users to avoid creating new ones, and ensure foreign keys are valid.
        \App\Models\PromptGeneration::factory(10000)
            ->recycle($users)
            ->create();
    }
}
