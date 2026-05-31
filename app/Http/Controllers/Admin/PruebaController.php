<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prueba;
use App\Models\Patrocinador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pruebas = Prueba::all();
        $patrocinadores = Patrocinador::all();
        return view('admin.pruebas.index', compact('pruebas', 'patrocinadores'));
    }

    public function create()
    {
        $patrocinadores = Patrocinador::all();
        return view('admin.pruebas.create', compact('patrocinadores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'categorias_ediciones_id' => 'required|exists:categorias_ediciones,id',
            'patrocinador_id' => 'required|exists:patrocinadores,id',
        ]);

        Prueba::create([
            'nombre' => $request->nombre,
            'categorias_ediciones_id' => $request->categorias_ediciones_id,
            'patrocinador_id' => $request->patrocinador_id,
        ]);

        return redirect()->route('pruebas.index')->with('success', 'Prueba creado correctamente.');
    }

    public function edit(Prueba $prueba)
    {
        $patrocinadores = Patrocinador::all();
        return view('admin.pruebas.edit', compact('prueba', 'patrocinadores'));
    }

    public function update(Request $request, Prueba $prueba)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'categorias_ediciones_id' => 'required|exists:categorias_ediciones,id',
            'patrocinador_id' => 'required|exists:patrocinadores,id',
        ]);

        $prueba->nombre = $request->nombre;
        $prueba->categorias_ediciones_id = $request->categorias_ediciones_id;
        $prueba->patrocinador_id = $request->patrocinador_id;
        $prueba->save();

        return redirect()->route('pruebas.index')->with('success', 'Prueba actualizado correctamente.');
    }

    public function destroy(Prueba $prueba)
    {
        $prueba->delete();

        return redirect()->route('pruebas.index')->with('success', 'Prueba eliminado correctamente.');
    }
}
