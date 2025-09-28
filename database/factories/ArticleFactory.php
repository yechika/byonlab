<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(6, true);
        $content = fake()->paragraphs(8, true);
        
        return [
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title),
            'content' => $content,
            'excerpt' => fake()->paragraph(3),
            'image_url' => null, // Will be set manually if needed
            'is_published' => true,
            'published_at' => fake()->dateTimeBetween('-2 months', 'now'),
            'meta_title' => fake()->sentence(4, true),
            'meta_description' => fake()->paragraph(2)
        ];
    }
}
