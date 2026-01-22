<?php

namespace Database\Factories;

use App\Models\Language;
use App\Models\Platform;
use App\Models\Tone;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PromptGeneration>
 */
class PromptGenerationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'platform_id' => Platform::inRandomOrder()->first()?->id ?? Platform::factory(),
            'tone_id' => Tone::inRandomOrder()->first()?->id ?? Tone::factory(),
            'language_id' => Language::inRandomOrder()->first()?->id ?? Language::factory(),
            'user_id' => User::factory(), // Will be overridden by recycle()
            'output_type' => fake()->randomElement(['caption', 'article', 'script']),
            'context_description' => fake()->paragraph(),
            'generated_result' => fake()->paragraphs(3, true),
        ];
    }
}
