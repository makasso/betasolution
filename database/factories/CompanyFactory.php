<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'industry' => fake()->word(),
            'address' => fake()->address(),
            'country' => fake()->country(),
            'city' => fake()->city(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->companyEmail(),
            'validity_date' => now()->addYears(3),
            'status' => fake()->randomElement(['active', 'inactive']),
        ];
    }
}
