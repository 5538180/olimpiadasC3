<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Edicion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $cursos = [
            [
                'curso_escolar' => '21/22',
                'nombre' => 'XIII Olimpiadas',
                'url' => 'https://cifpcarlos3.net/codeweek/course/view.php?id=7',
            ],
            [
                'curso_escolar' => '22/23',
                'nombre' => 'XIV Olimpiadas',
                'url' => 'https://cifpcarlos3.net/codeweek/course/view.php?id=9',
            ],
            [
                'curso_escolar' => '23/24',
                'nombre' => 'XV Olimpiadas',
                'url' => 'https://cifpcarlos3.net/codeweek/course/view.php?id=10',
            ],
        ];

        foreach ($cursos as $curso) {
            $edicion = Edicion::where('curso_escolar', $curso['curso_escolar'])->first();

            if ($edicion) {
                Curso::create([
                    'nombre' => $curso['nombre'],
                    'url' => $curso['url'],
                    'edicion_id' => $edicion->id,
                ]);
            }
        }

        $this->command->info('Tabla cursos inicializada con datos.');

    }
}
