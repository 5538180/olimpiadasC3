<?php

namespace Database\Seeders;

use App\Models\Edicion;
use App\Models\Grupo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EdicionGrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (DB::table('edicion_grupo')->count() > 0) {
            return;
        }

        $edicion = Edicion::first();

        Grupo::all()->each(function ($grupo) use ($edicion) {
            DB::table('edicion_grupo')->insert([
                'edicion_id' => $edicion->id,
                'grupo_id' => $grupo->id,
            ]);
        });
    }
}
