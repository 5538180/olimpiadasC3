<?php

namespace Database\Seeders;

use App\Models\Prueba;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PruebasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Prueba::query()->exists()) {
            return;
        }

        Prueba::factory(15)->create();
        $this->command->info('¡Tabla pruebas inicializada con datos!');
    }
}
