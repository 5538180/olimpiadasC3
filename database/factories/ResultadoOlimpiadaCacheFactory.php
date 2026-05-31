<?php

namespace Database\Factories;

use App\Models\Prueba;
use App\Models\ResultadoOlimpiadaCache;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ResultadoOlimpiadaCache>
 */
class ResultadoOlimpiadaCacheFactory extends Factory
{


    public static function tiempoFinal(string $momentoConsecucion, int $penalizaciones): string
    {
        $segundosFinales = strtotime($momentoConsecucion) + ($penalizaciones * 30);

        return date('Y-m-d H:i:s', $segundosFinales);
    }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $penalizaciones = fake()->numberBetween(0, 5);
        $momentoConsecucion = date('Y') . '-05-13 ' . fake()->time('H:i:s');
        $grado = fake()->randomElement(['GM', 'GS']);
        $pruebasPorGrado = [
            'GM' => ['Hardware', 'Sistemas', 'Redes Locales'],
            'GS' => ['Programación', 'Bases de datos', 'Redes Locales', 'Sistemas', 'Lenguajes de Marcas'],
        ];
        $nombrePrueba = fake()->randomElement($pruebasPorGrado[$grado]);






        return [
            'grado' => $grado,
            'lastname' => fake()->lastName(),
            'firstname' => fake()->firstName(),
            'id_prueba' => Prueba::factory(),
            'maxpuntuacion' => fake()->randomElement([0, 33, 66, 100]),
            'MomentoConsecución' => $momentoConsecucion,
            'penalizaciones' => $penalizaciones,
            'TiempoFinal' => self::tiempoFinal($momentoConsecucion, $penalizaciones),
            'nombrePrueba' => $nombrePrueba,
        ];
    }
}
