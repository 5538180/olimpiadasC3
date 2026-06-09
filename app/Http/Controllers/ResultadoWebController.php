<?php

namespace App\Http\Controllers;

use App\Models\Puntuacion;
use Illuminate\Http\Request;

class ResultadoWebController extends Controller
{
  public function index()
    {
        

    $usuarioAutenticadoID =  auth()->user()->id;
   $puntuacionesUsuario =  Puntuacion::where('participante_id',$usuarioAutenticadoID)->get();


        return view('resultados.index', compact($puntuacionesUsuario)); 

    }



    /* Recuperar todas las puntuaciones de la base de datos donde el participante_id
coincida con el id del usuario que ha iniciado sesión actualmente en la
aplicación web.
● Retornar una vista de Blade llamada resultados.index, pasándole la lista de
puntuaciones obtenidas desde el controlador.
 */
}
