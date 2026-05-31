<?php

namespace Database\Factories;

use App\Models\Edicion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resultado>
 */
class ResultadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Edicion::query()
                ->whereNotIn('id', \App\Models\Resultado::query()->select('id'))
                ->inRandomOrder()
                ->value('id') ?? Edicion::factory()->create()->id,
            'palmares' => fake()->sentence(),
        ];
    }
}
