<?php

namespace Database\Seeders;

use App\Models\Grupo;
use App\Models\Participante;
use Illuminate\Database\Seeder;

class ParticipantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Participante::count() > 0) {
            return;
        }

        Grupo::all()->each(function ($grupo) {
            Participante::factory(3)->create([
                'grupo_id' => $grupo->id,
            ]);
        });
    }
}
