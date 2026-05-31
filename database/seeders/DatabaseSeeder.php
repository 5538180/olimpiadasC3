<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Model::unguard();
        Schema::disableForeignKeyConstraints();
        $this->call(CentroSeeder::class);
        $this->call(CiclosTableSeeder::class);
        $this->call(CategoriasTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        if (App::environment('local')) {
            $this->call(EdicionesSeeder::class);
            $this->call(PatrocinadoresSeeder::class);
            $this->call(CategoriasEdicionesSeeder::class);
            $this->call(PruebasTableSeeder::class);
            $this->call(CursosSeeder::class);
            $this->call(ResultadosSeeder::class);
            $this->call(GruposSeeder::class);
            $this->call(ParticipantesSeeder::class);
            $this->call(EdicionGrupoSeeder::class);
            $this->call(ResultadosPruebasSeeder::class);
            $this->call(ResultadoOlimpiadaCacheSeeder::class);
            $this->command->info('¡Creados 30 ResultadosOlimpiadaCache!');
        }
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->command->info('Tablas inicializadas con datos!');

        Model::reguard();
        Schema::enableForeignKeyConstraints();
    }
}
