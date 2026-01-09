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
        Schema::create('content_generations', function (Blueprint $table) {
            $table->id();
            // Foreign Keys
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('platform_id')->constrained()->onDelete('cascade');
            $table->foreignId('tone_id')->constrained()->onDelete('cascade');

            // Content Data
            $table->text('input_context');
            $table->string('language', 20);
            $table->string('output_title')->nullable();
            $table->text('output_description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_generations');
    }
};
