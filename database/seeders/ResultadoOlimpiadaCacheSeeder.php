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
        ResultadoOlimpiadaCache::factory(30)->create();
    }
}
