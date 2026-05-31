<?php

namespace Database\Factories;

use App\Models\CategoriaEdicion;
use App\Models\Patrocinador;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prueba>
 */
class PruebaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word(),
            'categorias_ediciones_id' => CategoriaEdicion::factory(),
            'patrocinador_id' => Patrocinador::factory(),
        ];
    }
}
