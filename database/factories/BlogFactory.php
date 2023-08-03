<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
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
        return [
            'id_category' => mt_rand(1, 5),
            'id_author' => mt_rand(1, 3),
            'slug' => fake()->slug(),
            'title' => fake()->sentence(mt_rand(2, 5)),
            'excerpt' => fake()->paragraph(),
            // 'body' => '<p>' . implode(fake()->paragraphs(mt_rand(5, 10))) . '</p>'
            'body' => collect(fake()->paragraphs(mt_rand(5, 10)))
                ->map(function ($paragraph) {
                    return "<p>$paragraph</p>";
                })
                ->implode(''),
        ];
    }
}
