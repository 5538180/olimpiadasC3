<?php

namespace Database\Seeders;

use App\Models\Patrocinador;
use Illuminate\Database\Seeder;

class PatrocinadoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Patrocinador::query()->exists()) {
            return;
        }

        Patrocinador::factory(15)->create();
    }
}
