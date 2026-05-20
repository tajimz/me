<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence();
        $content = $this->faker->paragraphs(6, true);
        return [
            'title'        => $title,
            'slug'         => Str::slug($title),
            'content'      => $content,
            'excerpt'      => Str::limit(strip_tags($content), 150),
            'cover_image'  => 'https://picsum.photos/800/400?random=' . rand(1, 100),
            'is_featured'  => $this->faker->boolean(20), // 20% chance to be true
            'views'        => $this->faker->numberBetween(10, 5000),
            'is_published' => true,
        ];
    }
}
