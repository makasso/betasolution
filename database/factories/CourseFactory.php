<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => rand(1, 20),
            'title' => fake()->word(),
            'description' => fake()->paragraph(),
            'objectives' => fake()->paragraph(),
            'prerequisites' => fake()->paragraph(),
            'private_link' => fake()->url(),
        ];
    }
}
