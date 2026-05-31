<?php

namespace App\Http\Services;

use App\Http\Resources\ClasificacionesResource;
use App\Models\Grupo;
use App\Models\ResultadoOlimpiadaCache;

class ClasificacionesService
{
    // - LLAMADAS A BBDD

    // - Llamar a Purbas y traer todas
    // - FLUJO participante->grupo->pruebas->resultados_olimpiadas_cache

    /**
     * /
     * @param  mixed  $nombreCompleto
     * @return array
     */

    // -
    public function arrayParciales($nombreCompleto)
    {
        // - Validaciones de entrada


        $arrayNombre = explode(' ', trim($nombreCompleto), 2);

        // ! cambair a ngrupo->nombre
        $nombreGrupo = $arrayNombre[0];
        // ! cambiar a grupo->centro
        $centroGrupo = $arrayNombre[1] ?? null;

        // ? Viene un nombre de centro o un id del centro?? Si es id del centro ok, si no hay que buscar el nombre del centro para saber su id asociado
        // - LLAMADAS A BBDD

        $grupo = Grupo::where('nombre', $nombreGrupo)
            ->where(function ($query) use ($centroGrupo) {
                if (is_numeric($centroGrupo)) {
                    $query->where('centro_id', (int) $centroGrupo);

                    return;
                }

                $query->whereHas('centro', function ($query) use ($centroGrupo) {
                    $query->where('dencen', $centroGrupo);
                });
            })
            ->firstOrFail();

        $pruebasGrupoConSusResultados = $grupo->pruebas()
            ->with(['resultadosOlimpiadasCaches' => function ($query) use ($nombreGrupo, $centroGrupo) {
                $query->where('firstname', $nombreGrupo)
                    ->where('lastname', $centroGrupo);
            }])
            ->get();

        $cambio = $pruebasGrupoConSusResultados->flatMap(function ($prueba) {
            return $prueba->resultadosOlimpiadasCaches->map(function ($roc) {
                $nroc = [
                    'id_prueba' => $roc->id_prueba,
                    'nombrePrueba' => $roc->nombrePrueba,
                    'tiempoFinal' => $roc->TiempoFinal,
                    'grado' => $roc->grado,
                ];

                return $nroc;
            });
        });

        $parciales = $cambio->map(function ($prueba) {

            $idPrueba = $prueba['id_prueba'];
            $posicion = ResultadoOlimpiadaCache::where('id_prueba', $idPrueba)
                ->where('grado', $prueba['grado'])
                ->where('TiempoFinal', '<', $prueba['tiempoFinal'])
                ->count() + 1;

            return [
                'id_prueba' => $prueba['id_prueba'],
                'nombrePrueba' => $prueba['nombrePrueba'],
                'tiempoFinal' => $prueba['tiempoFinal'],
                'posicion' => $posicion,
            ];

        });

        return ClasificacionesResource::collection($parciales);
    }



    public function calcularGlobal($nombreCompleto): int
    {
        $arrayNombre = explode(' ', trim($nombreCompleto), 2);
        $nombreGrupo = $arrayNombre[0] ?? '';
        $centroGrupo = $arrayNombre[1] ?? null;

        $resultadoGrupo = ResultadoOlimpiadaCache::where('firstname', $nombreGrupo)
            ->where('lastname', $centroGrupo)
            ->first();

        if (! $resultadoGrupo) {
            return 0;
        }

        $grupoObjetivo = Grupo::where('nombre', $nombreGrupo)
            ->where(function ($query) use ($centroGrupo) {
                if (is_numeric($centroGrupo)) {
                    $query->where('centro_id', (int) $centroGrupo);
                }

                $query->orWhereHas('centro', function ($query) use ($centroGrupo) {
                    $query->where('dencen', $centroGrupo);
                });
            })
            ->first();

        if (! $grupoObjetivo) {
            return 0;
        }

        $gradoGrupo = $resultadoGrupo->grado;

        $todosLosGrupos = Grupo::with('pruebas.resultadosOlimpiadasCaches')->get();
        $ranking = collect();

        foreach ($todosLosGrupos as $grupo) {
            $esMismoGrado = false;
            $totalPruebasCon100 = 0;

            foreach ($grupo->pruebas as $prueba) {
                $tieneResultadoDelGrado = $prueba->resultadosOlimpiadasCaches->contains(function ($resultado) use ($gradoGrupo) {
                    return $resultado->grado === $gradoGrupo;
                });

                if ($tieneResultadoDelGrado) {
                    $esMismoGrado = true;
                }

                if ($tieneResultadoDelGrado && $prueba->pivot->puntos == 100) {
                    $totalPruebasCon100++;
                }
            }

            if ($esMismoGrado) {
                $ranking->push([
                    'grupo_id' => $grupo->id,
                    'nombre' => $grupo->nombre,
                    'centro_id' => $grupo->centro_id,
                    'total_100' => $totalPruebasCon100,
                ]);
            }
        }

        $ranking = $ranking->sortByDesc('total_100')->values();

        foreach ($ranking as $indice => $grupo) {
            if ((int) $grupo['grupo_id'] === (int) $grupoObjetivo->id) {
                return (int) $indice + 1;
            }
        }

        return 0;
    }


}
