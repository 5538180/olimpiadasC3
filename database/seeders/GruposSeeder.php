<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Centro;
use App\Models\Ciclo;
use App\Models\Grupo;
use App\Models\User;
use Illuminate\Database\Seeder;

class GruposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Grupo::count() > 0) {
            return;
        }

        Grupo::factory(4)->create([
            'tutor' => User::first()->id,
            'centro_id' => Centro::first()->id,
            'ciclo_id' => Ciclo::first()->id,
            'categoria_id' => Categoria::first()->id,
        ]);
    }
}
