<?php

namespace Database\Factories;

use App\Models\Grupo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Participante>
 */
class ParticipanteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'grupo_id' => Grupo::factory(),
            'nombre' => fake()->firstName(),
            'apellidos' => fake()->lastName(),
        ];
    }
}
