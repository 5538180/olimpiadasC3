<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $cursos = Curso::all();
        return view('admin.cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Curso $curso) : View
    {
             return view('admin.cursos.create', compact('curso'));
    
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request, Curso $curso)

    /* ! Deberia controlar en la vista los datos, no aqui */

    {
          $request->validate([
            'edicion_id' => 'required|integer',
            'id_curso_modle' => 'required|integer',
            'olimpiada' => 'required|integer',
        ]);


       try {
             // ? necesario controlar que el id de edicion no esta vinculado a otro curso ya si ya esta puesto que sea unique?
        $curso = new Curso();
        $curso->edicion_id = $request->input('edicion_id');
        $curso->id_curso_modle = $request->input('id_curso_modle');
        $curso->olimpiada =  $request->input('olimpiada');
        


        $curso->save();
       
        return redirect()->route('cursos.index')->with('success', 'curso creado correctamente.'); 
       } catch (\Throwable $th) {
       
        return redirect()->route('cursos.create')->with('error', 'Error al crear el curso: ' . $th->getMessage());
       }
   

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso) : View

    {
        
        return view('admin.cursos.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso)
    {

    /* ! Deberia controlar en la vista los datos, no aqui */
     
           $request->validate([
            'edicion_id' => 'required|integer',
            'id_curso_modle' => 'required|integer',
            'olimpiada' => 'required|integer',
        ]);

       try {
       
        $curso->edicion_id = $request->input('edicion_id');
        $curso->id_curso_modle = $request->input('id_curso_modle');
        $curso->olimpiada = $request->input('olimpiada');
        
        $curso->save();
        return redirect()->route('cursos.index')->with('success', 'curso editado correctamente.'); 
       } catch (\Throwable $th) {
        $th->getMessage();
        return redirect()->route('cursos.edit', ['curso' => $curso->id])->with('error', 'Error al editar el curso: ' . $th->getMessage());
       }
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index')->with('success', 'Curso eliminado correctamente.');
    }
}
