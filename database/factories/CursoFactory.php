<?php

namespace Database\Factories;

use App\Models\Edicion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'edicion_id' => Edicion::query()->inRandomOrder()->value('id') ?? Edicion::factory()->create()->id,
            'id_curso_modle' => fake()->unique()->numberBetween(1000, 9999),
            'olimpiada' => fake()->unique()->numberBetween(10000, 99999),
        ];
    }
}
