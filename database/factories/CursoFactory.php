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

            'nombre' =>  'curso' . fake()->numberBetween(1,20),
            'edicion_id'=> Edicion::factory(),
            'url' => fake()->url(),

        ];
    }
}
