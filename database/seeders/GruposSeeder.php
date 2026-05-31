<?php

namespace Database\Seeders;

use App\Models\Grupo;
use Illuminate\Database\Seeder;

class GruposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Grupo::query()->exists()) {
            return;
        }

        Grupo::factory()->count(15)->create();
    }
}
