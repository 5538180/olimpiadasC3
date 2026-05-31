<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Edicion;
use Illuminate\Database\Seeder;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Curso::count() > 0) {
            return;
        }

        Edicion::all()->each(function ($edicion) {
            Curso::factory()->create([
                'edicion_id' => $edicion->id,
            ]);
        });
    }
}
