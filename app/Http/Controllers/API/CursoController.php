<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CursoEdicionResource;
use App\Models\Curso;
use App\Models\Edicion;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $cursoConEdiciones = Curso::with('edicion')->get();


        return  CursoEdicionResource::collection($cursoConEdiciones);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request ,$edicion , $curso)
    {





    }

    /**
     * Display the specified resource.
     */
    public function show(Curso $curso)
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
