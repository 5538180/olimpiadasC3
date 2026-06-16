<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Edicion;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Edicion $edicion)
    {
        $curso = $edicion->curso;
        return view('admin.cursos.index', compact('edicion', 'curso'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Edicion $edicion)
    {
        return view('admin.cursos.create', compact('edicion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Edicion $edicion)
    {
        // TODO MODIFICADO antes se podia intentar crear otro curso en la misma edicion; se cambia para bloquearlo porque la relacion es 1:1.
        if ($edicion->curso) {
            return redirect()->route('ediciones.cursos.index', ['edicion' => $edicion])
                ->withErrors(['curso' => 'Esta edicion ya tiene un curso asociado.']);
        }

        $request->validate([
            'nombre' => 'required|max:100',
            'url' => 'required|url|max:255',
        ]);

        Curso::create([
            'nombre' => $request->nombre,
            'edicion_id' => $edicion->id,
            'url' => $request->url,
        ]);

        return redirect()->route('ediciones.cursos.index', ['edicion' => $edicion])->with('success', 'Curso creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Edicion $edicion, Curso $curso)
    {
        // TODO MODIFICADO antes show solo enviaba curso; se cambia para enviar tambien edicion porque la vista usa rutas anidadas.
        if ($curso->edicion_id !== $edicion->id)  return redirect()->route('ediciones.cursos.index', ['edicion' => $edicion])->withErrors(['curso' => 'ERROR Curso no pertenece a una edicion.']);

        return view('admin.cursos.show', compact('edicion', 'curso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Edicion $edicion, Curso $curso)
    {

        // ? MEJORA este control se repite en edit, update y destroy; se podria extraer a un metodo privado para evitar duplicacion.
        if ($curso->edicion_id !== $edicion->id)  return redirect()->route('ediciones.cursos.index', ['edicion' => $edicion])->withErrors(['curso' => 'ERROR Curso no pertenece a una edicion.']);

        return view('admin.cursos.edit', compact('edicion', 'curso')); // ! FALLO antes: compact('curso'); la vista necesita tambien edicion para rutas anidadas.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Edicion $edicion, Curso $curso)
    {

        if ($curso->edicion_id !== $edicion->id)  return redirect()->route('ediciones.cursos.index', ['edicion' => $edicion])->withErrors(['curso' => 'ERROR Curso no pertenece a una edicion.']); // ! FALLO antes no existia este if; update podia modificar un curso de otra edicion.

        $validacion =   $request->validate([
            'nombre' => 'required|max:100',
            'url' => 'required|url|max:255', // ! FALLO antes: 'url' => 'required|max:100'; faltaba validar formato url y la migracion permite 255.
        ]);


        $validacion['edicion_id'] = $edicion->id;
        $curso->update($validacion);

        return redirect()->route('ediciones.cursos.index', ['edicion' => $edicion])->with('success', 'Curso actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Edicion $edicion, Curso $curso)
    {
        if ($curso->edicion_id !== $edicion->id)  return redirect()->route('ediciones.cursos.index', ['edicion' => $edicion])->withErrors(['curso' => 'ERROR Curso no pertenece a una edicion.']); // ! FALLO antes no existia este if; destroy podia borrar sin comprobar la edicion.
        $curso->delete(); // ! FALLO antes: $edicion->curso->delete(); debe borrarse el Curso recibido por la ruta.


        return redirect()->route('ediciones.cursos.index', ['edicion' => $edicion])->with('success', 'Curso eliminado correctamente.');
    }
}
