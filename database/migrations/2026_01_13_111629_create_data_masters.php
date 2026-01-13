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
        // 1. Master Platforms
        Schema::create('platforms', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Contoh: "LinkedIn"
            $table->string('slug')->unique(); // Contoh: "linkedin" (untuk coding logic)
            $table->timestamps();
        });

        // 2. Master Tones (Nada Bicara)
        Schema::create('tones', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Contoh: "Profesional"
            // Prompt Instruction: Instruksi rahasia buat AI untuk tone ini
            // Contoh: "Gunakan bahasa baku, hindari singkatan, dan fokus pada data."
            $table->text('ai_instruction')->nullable();
            $table->timestamps();
        });

        // 3. Master Languages
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Contoh: "Bahasa Indonesia"
            $table->string('code', 5); // Contoh: "id", "en"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
        Schema::dropIfExists('tones');
        Schema::dropIfExists('platforms');
    }
};
