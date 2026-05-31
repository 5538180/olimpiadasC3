<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Edicion>
 */
class EdicionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'curso_escolar' => fake()->randomElement(['24/25', '25/26', '26/27']),
            'fecha_celebracion' => fake()->date(),
            'fecha_apertura' => fake()->date(),
            'fecha_cierre' => fake()->date(),
            'css_file' => null,
        ];
    }
}
