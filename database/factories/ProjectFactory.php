<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // 1. Core structural definitions
        $name = ucwords(fake()->words(fake()->numberBetween(2, 3), true));
        $type = fake()->randomElement(['web', 'app']);
        $randomBg = fake()->randomElement(['6366f1', '4f46e5', '06b6d4', '10b981', 'f59e0b', '8b5cf6', 'ec4899', '3b82f6']);

        return [
            'name'         => $name,
            'details'      => fake()->paragraph(2),

            // Dynamic placeholder matching the title names exactly
            'cover_image'  => "https://placehold.co/600x400/{$randomBg}/ffffff?text=" . urlencode($name),
            'type'         => $type,

            // Exact 50/50 probability breakdown
            'github_url'   => fake()->boolean(50) ? 'https://github.com/profile/' . fake()->word() : null,

            // Strict deterministic alignment with Type assignment profiles
            'live_url'     => $type === 'web' ? 'https://example.com/live/' . fake()->word() : null,
            'download_url' => $type === 'app' ? 'https://example.com/file/' . fake()->word() . '.apk' : null,

            // Exact 30/70 weight balance
            'is_featured'  => fake()->boolean(30),

            // Clean, comma-separated plain text words placeholder
            'tags'         => implode(',', fake()->words(3)),
        ];
    }
}
