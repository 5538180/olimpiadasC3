<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
 * Modifica una tabla existente de la base de datos.
 *
 * Este método se ejecuta al lanzar el comando:
 *
 * php artisan migrate
 *
 * En este caso se utiliza Schema::table() porque la tabla ya existe
 * y solamente se quiere alterar su estructura, por ejemplo:
 * añadir una columna, crear una clave foránea, modificar un campo
 * o eliminar algún elemento.
 * 
 * @example  php artisan make:migration add_curso_id_fk_to_ediciones --table=ediciones
 * 
 * Importante:
 * - Schema::table() se usa para modificar tablas existentes.
 * - Schema::create() se usa para crear tablas nuevas.
 * - Antes de añadir una columna puede comprobarse si ya existe
 *   usando Schema::hasColumn().
 *
 * @return void
 */

    public function up(): void
    {
        if (1 == 0) {
            Schema::table('ediciones', function (Blueprint $table) {
                $table->foreignId('curso_id')->constrained('cursos')->cascadeOnDelete();
            });


        }
        ;
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ediciones', function (Blueprint $table) {
            //
        });
    }
};
