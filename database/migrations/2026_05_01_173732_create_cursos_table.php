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
            $table->bigInteger('edicion_id')->unique();
            $table->string('enlace_curso_modle')->nullable();
            $table->integer('olimpiada')->unique();
            $table->string('curso');
            $table->timestamps();
        });
    }
/*   <li class="icon solid">
            <a href="https://cifpcarlos3.net/codeweek/course/view.php?id=13" target="_blank">
                <h4><b>XVI Olimpiadas</b> (Curso 2024-2025)</h4>
            </a>
        </li> */
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
