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
    public function index()
    {
        //
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
    {
          $request->validate([
            'edicion_id' => 'required',
            'enlace_curso_modle' => 'nullable',
        ]);

       
        $curso = new Curso();
        $curso->edicion_id = $request->input('edicion_id');
        $curso->enlace_curso_modle = $request->input('enlace_curso_modle');
        


        $curso->save();

        return redirect()->route('ediciones.index')->with('success', 'curso creado correctamente.'); 
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
    public function edit(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        //
    }
}
