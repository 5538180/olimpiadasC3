<?php

namespace Database\Seeders;

use App\Models\Grupo;
use App\Models\Prueba;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultadosPruebasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (DB::table('resultados_pruebas')->count() > 0) {
            return;
        }

        Grupo::all()->each(function ($grupo) {
            Prueba::all()->each(function ($prueba) use ($grupo) {
                DB::table('resultados_pruebas')->insert([
                    'grupo_id' => $grupo->id,
                    'prueba_id' => $prueba->id,
                    'puntos' => fake()->randomElement([0, 33, 66, 100]),
                    'tiempo' => fake()->dateTime(),
                    'penalizacion' => '00:00:00',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            });
        });
    }
}
