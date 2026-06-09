<?php

namespace Database\Seeders;

use App\Models\ResultadoOlimpiadaCache;
use Illuminate\Database\Seeder;

class ResultadoOlimpiadaCacheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (ResultadoOlimpiadaCache::query()->exists()) {
            return;
        }

        ResultadoOlimpiadaCache::factory()->count(30)->create();
        $this->command->info('¡Creados 30 ResultadosOlimpiadaCache!');

    }
}
