<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Centro>
 */
class CentroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codcen' => fake()->unique()->numberBetween(30000000, 30999999),
            'dencen' => fake()->company(),
            'titularidad' => fake()->randomElement(['P', 'V']),
            'domcen' => fake()->streetAddress(),
            'cpcen' => fake()->numberBetween(30000, 30999),
            'loccen' => fake()->city(),
            'muncen' => fake()->city(),
            'telcen' => fake()->numerify('#########'),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
