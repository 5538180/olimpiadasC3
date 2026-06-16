<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\CentroController;
use App\Http\Controllers\Admin\CicloController;
use App\Http\Controllers\Admin\CursoController;
use App\Http\Controllers\Admin\EdicionFileController;
use App\Http\Controllers\Admin\GradoController;
use App\Http\Controllers\Admin\GrupoController;
use App\Http\Controllers\InscripcionesController;
use App\Http\Controllers\Admin\PatrocinadorController;
use App\Http\Controllers\Admin\PruebaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ParticipanteController;
use App\Http\Controllers\Admin\EdicionController;
use App\Http\Controllers\Admin\ResultadoController;
use App\Http\Controllers\SessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/inscripcion', [InscripcionesController::class, 'store'])->name('inscripcion');

Route::prefix('sessions')->group(function () {
    Route::post('setEdicion', [SessionController::class, 'setEdicion'])->name('sessions.setEdicion');
});


Route::prefix('/dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('grupos.index');
    })->name('dashboard');
    // TODO MODIFICADO antes no existia una ruta directa a cursos en el menu; se cambia para redirigir a la edicion actual.
    Route::get('cursos', function () {
        $edicion = \App\Models\Edicion::getEdicionActual();

        if (! $edicion) {
            return redirect()->route('ediciones.index')
                ->withErrors(['curso' => 'No hay ninguna edicion disponible para gestionar cursos.']);
        }

        return redirect()->route('ediciones.cursos.index', ['edicion' => $edicion]);
    })->name('cursos.index');
    Route::resource('categorias', CategoriaController::class);
    Route::resource('centros', CentroController::class);
    Route::resource('grados.ciclos', CicloController::class)->shallow();
    Route::resource('ediciones', EdicionController::class)
        ->parameters(['ediciones' => 'edicion']);
    Route::resource('resultados', ResultadoController::class);
    Route::resource('grados', GradoController::class);
    Route::get('grupos/{grupo}/crearUsuarioMoodle', [GrupoController::class, 'crearUsuarioMoodle'])->name('grupos.crearUsuarioMoodle');
    Route::get('grupos/crearUsuariosMoodle', [GrupoController::class, 'crearUsuariosMoodle'])->name('grupos.crearUsuariosMoodle');
    Route::resource('grupos', GrupoController::class);
    Route::resource('patrocinadores', PatrocinadorController::class)
        ->parameters(['patrocinadores' => 'patrocinador']);
    Route::resource('pruebas', PruebaController::class);
    Route::resource('grupos.participantes', ParticipanteController::class)->shallow();
    Route::prefix('ediciones/{edicion}')->name('admin.ediciones.')->group(function () {
        Route::get('files',            [EdicionFileController::class, 'index'])  ->name('files.index');
        Route::post('files',           [EdicionFileController::class, 'store'])  ->name('files.store');
        Route::delete('files/{file}',  [EdicionFileController::class, 'destroy'])->name('files.destroy');
    });
    // TODO MODIFICADO antes se usaba AdminCursoController por un conflicto de imports; se cambia a CursoController porque ya no hay otro controlador con ese nombre en este archivo.
    Route::resource('ediciones.cursos', CursoController::class)
        ->parameters(['ediciones' => 'edicion', 'cursos' => 'curso']);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
