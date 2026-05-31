<?php

namespace Database\Seeders;

use App\Models\Edicion;
use App\Models\Resultado;
use Illuminate\Database\Seeder;

class ResultadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Resultado::count() > 0) {
            return;
        }

        Edicion::all()->each(function ($edicion) {
            Resultado::factory()->create([
                'id' => $edicion->id,
            ]);
        });
    }
}
