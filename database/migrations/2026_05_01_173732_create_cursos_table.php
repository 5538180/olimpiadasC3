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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('edicion_id')->constrained('ediciones')->onDelete('cascade');
            $table->integer('id_curso_modle')->unique();
            $table->integer('olimpiada')->unique();
            /* * Ahora lo saco de edicion el año $table->string('curso'); */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
          Schema::disableForeignKeyConstraints(); // ? Deshabilitar temporalmente las restricciones de clave foránea
        Schema::dropIfExists('cursos');
    }
};
