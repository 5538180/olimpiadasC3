<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\ClasificacionesService;
use Illuminate\Http\Request;

class ClasificacionesControllerApi extends Controller
{
    private ClasificacionesService $clasificacionesService;

    public function __construct(ClasificacionesService $clasificacionesService)
    {
        $this->clasificacionesService = $clasificacionesService;
    }

    /**
     * Display a listing of the resource.
     */
    // - A priori el nombrecompleto es de un PARTICIPANTE
    public function index($nombreCompleto)
    {
        $parciales = $this->clasificacionesService->arrayParciales($nombreCompleto);
        $global = $this->clasificacionesService->calcularGlobal($nombreCompleto);


        return response()->json([
            'parciales' => $parciales,
            'global' => $global,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
