<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Edicion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoriaEdicion>
 */
class CategoriaEdicionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'categoria_id' => Categoria::factory(),
            'edicion_id' => Edicion::factory(),
            'num_convocatoria' => fake()->numberBetween(1, 10),
        ];
    }
}
