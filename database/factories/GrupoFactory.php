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
            'nombre' => fake()->unique()->words(2, true),
            'abreviatura' => strtoupper(fake()->unique()->bothify('G###')),
            'password' => 'password',
            'tutor' => User::query()->value('id') ?? User::factory()->create()->id,
            'centro_id' => Centro::query()->inRandomOrder()->value('id') ?? Centro::factory()->create()->id,
            'ciclo_id' => Ciclo::query()->inRandomOrder()->value('id') ?? Ciclo::factory()->create()->id,
            'categoria_id' => Categoria::query()->inRandomOrder()->value('id') ?? Categoria::factory()->create()->id,
        ];
    }
}
