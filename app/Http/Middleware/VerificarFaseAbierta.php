<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificarFaseAbierta
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $fase_cerrada = $request->route('fase_cerrada');
        /* ! if peticion api */
        if ($request->isMethod('post') && $fase_cerrada ){

        /* ! hay un metodo de crreeacion de un objeto json mas explicito */
        abort(418,"La competición ha finalizado");
        }
        if($request->isMethod('get') && $fase_cerrada ){
            return redirect("/")->withErrors("La fase esta cerrada");
        }

       
        return $next($request);
    }
}
