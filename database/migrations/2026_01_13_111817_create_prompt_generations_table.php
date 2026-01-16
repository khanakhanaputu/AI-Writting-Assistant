<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prompt_generations', function (Blueprint $table) {
            $table->id();

            // --- FOREIGN KEYS (Relasi ke Master Data) ---
            // Menggunakan constrained() agar data valid (harus ada di tabel master)

            $table->foreignId('platform_id')->constrained('platforms')->onDelete('restrict');
            $table->foreignId('tone_id')->constrained('tones')->onDelete('restrict');
            $table->foreignId('language_id')->constrained('languages')->onDelete('restrict');
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');

            // --- DATA SPESIFIK TRANSAKSI ---
            // Output type
            $table->string('output_type')->nullable();

            // Konteks user (Input manual user)
            $table->text('context_description');

            // Hasil Generate AI
            $table->longText('generated_result')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prompt_generations');
    }
};
