<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Centro;
use App\Models\Ciclo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grupo>
 */
class GrupoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->word(),
            'abreviatura' => fake()->word(),
            'password' => 'password',
            'tutor' => User::factory(),
            'centro_id' => Centro::factory(),
            'ciclo_id' => Ciclo::factory(),
            'categoria_id' => Categoria::factory(),
        ];
    }
}
