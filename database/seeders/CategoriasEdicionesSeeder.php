<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\CategoriaEdicion;
use App\Models\Edicion;
use Illuminate\Database\Seeder;

class CategoriasEdicionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (CategoriaEdicion::count() > 0) {
            return;
        }

        Edicion::all()->each(function ($edicion) {
            Categoria::all()->each(function ($categoria) use ($edicion) {
                CategoriaEdicion::create([
                    'categoria_id' => $categoria->id,
                    'edicion_id' => $edicion->id,
                    'num_convocatoria' => fake()->numberBetween(1, 10),
                ]);
            });
        });
    }
}
