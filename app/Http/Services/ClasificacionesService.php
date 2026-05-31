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
        $grupo = $this->grupoDesdeNombreCompleto($nombreCompleto);

        if (! $grupo) {
            return ClasificacionesResource::collection(collect());
        }

        $resultados = $this->resultadosGrupo($grupo)->get();

        $parciales = $resultados->map(function ($resultado) {
            $idPrueba = $resultado->id_prueba;
            $posicion = ResultadoOlimpiadaCache::where('id_prueba', $idPrueba)
                ->where('grado', $resultado->grado)
                ->where('TiempoFinal', '<', $resultado->TiempoFinal)
                ->count() + 1;

            return [
                'id_prueba' => $resultado->id_prueba,
                'nombrePrueba' => $resultado->nombrePrueba,
                'tiempoFinal' => $resultado->TiempoFinal,
                'posicion' => $posicion,
            ];
        });

        return ClasificacionesResource::collection($parciales);
    }



    public function calcularGlobal($nombreCompleto): int
    {
        $grupo = $this->grupoDesdeNombreCompleto($nombreCompleto);

        if (! $grupo) {
            return 0;
        }

        $resultadoParticipante = $this->resultadosGrupo($grupo)->first();

        if (! $resultadoParticipante) {
            return 0;
        }

        $ranking = ResultadoOlimpiadaCache::selectRaw(
            'firstname, lastname, SUM(CASE WHEN maxpuntuacion = 100 THEN 1 ELSE 0 END) as total_100, SUM(maxpuntuacion) as total_puntos, MIN(TiempoFinal) as mejor_tiempo'
        )
            ->where('grado', $resultadoParticipante->grado)
            ->groupBy('firstname', 'lastname')
            ->orderByDesc('total_100')
            ->orderByDesc('total_puntos')
            ->orderBy('mejor_tiempo')
            ->get();

        foreach ($ranking as $indice => $participante) {
            if (
                $participante->firstname === $resultadoParticipante->firstname
                && $participante->lastname === $resultadoParticipante->lastname
            ) {
                return (int) $indice + 1;
            }
        }

        return 0;
    }

    private function grupoDesdeNombreCompleto(string $nombreCompleto): ?Grupo
    {
        $nombreCompleto = trim($nombreCompleto);
        $ultimaSeparacion = strrpos($nombreCompleto, ' ');

        if ($ultimaSeparacion === false) {
            return null;
        }

        $nombreGrupo = trim(substr($nombreCompleto, 0, $ultimaSeparacion));
        $centroId = trim(substr($nombreCompleto, $ultimaSeparacion + 1));

        if ($nombreGrupo === '' || ! ctype_digit($centroId)) {
            return null;
        }

        return Grupo::where('nombre', $nombreGrupo)
            ->where('centro_id', (int) $centroId)
            ->first();
    }

    private function resultadosGrupo(Grupo $grupo)
    {
        return ResultadoOlimpiadaCache::where('firstname', $grupo->nombre)
            ->where('lastname', (string) $grupo->centro_id);
    }

}
