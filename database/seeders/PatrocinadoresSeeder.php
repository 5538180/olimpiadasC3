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
        Patrocinador::factory(2)->create();
    }
}
