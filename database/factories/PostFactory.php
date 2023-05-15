<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'title'       => fake()->title,
            'description' => fake()->words(20),
            'tags'        => fake()->word,
        ];
    }
}
