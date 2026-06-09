<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NuevaPuntuacionResource;
use App\Models\Puntuacion;
use App\Models\User;
use Illuminate\Http\Request;

class PuntuacionController extends Controller
{
        public function store(Request $request)
    {
       $user =  $request->user();
       
       /* ! Validacion si el susario es Juez */

       
       $participante_id = $request->route('id');
   
       /* ! Validacion con validate de puntos es un nuemro mayor a 0 
       ! comentario es una cadena o nula  
       ! el participante id es un paricipante */  
     $usuarioParticipante =   User::findOrFail('participante_id');
       if ($participante_id->isParticipante($usuarioParticipante)){
            abort(404,"El id de usuario no es un participante");
       }

       $nuevaPuntuacion =   Puntuacion::create([
            'participante_id' => $participante_id,
            'juez_id' => $user->id,
            'puntos' => $request->input('puntos'),
            'comentario' =>$request->input('name'),
        ]);

        /* ! falta añadir el status 201 y mensaje creado  */
        /* return new NuevaPuntuacionResource($nuevaPuntuacion); */
        
         try {
        return new NuevaPuntuacionResource($nuevaPuntuacion);
      /*  return response()->json($nuevaPuntuacion, 201); */
    } catch (\Throwable $th) {
        return response()->json($th->getMessage());

    }
   return response('Hello World', 200)
        ->header('Content-Type', 'text/plain');
    }
}
/* ●
Crear una nueva fila en la tabla puntuaciones.
● El participante_id será el id enviado como parámetro en la URL.
● El juez_id será el identificador del usuario autenticado que realiza la petición.
● Los campos puntos y comentario se extraerán del cuerpo (body) de la
petición.
● Devolverá un JSON (un Resource ) con la información de la puntuación creada y
un código de estado HTTP 201 (Created). */