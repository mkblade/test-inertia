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
        return [
            //can be and must be overwritten programmatically
            'user_id' => rand(1, 10),
            'title' => ucfirst(fake()->words(5, true)),
            'content' => fake()->realText(400),
        ];
    }
}
