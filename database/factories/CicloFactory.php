<?php

namespace Database\Factories;

use App\Models\Grado;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ciclo>
 */
class CicloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => fake()->bothify('??####'),
            'nombre' => fake()->word(),
            'grado_id' => Grado::query()->inRandomOrder()->value('id') ?? Grado::factory()->create()->id,
        ];
    }
}
