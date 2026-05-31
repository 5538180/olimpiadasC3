<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('resultados_olimpiadas_cache', function (Blueprint $table) {
            $table->id();
            $table->string('grado', 2)->charset('utf8')->default(null)->nullable();
            $table->string('lastname', 100)->default('');
            $table->string('firstname', 100)->default('');
            $table->bigInteger('id_prueba')->default(0);
            $table->decimal('maxpuntuacion', 10, 5)->default(null)->nullable(); // ! decimal?? nunca podran ser decimales ya que los puntos son enteros, 2 no podran ser mas de 3 digitos ya que nunca sera mas de 100
            $table->dateTime('MomentoConsecución')->default(null)->nullable();
            $table->bigInteger('penalizaciones')->default(0);
            $table->dateTime('TiempoFinal')->default(null)->nullable();
            $table->string('nombrePrueba', 255)->default(null)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultados_olimpiadas_cache');
    }
};
