<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CursoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->edicion?->id,
            'curso_escolar' => $this->edicion?->curso_escolar,
            'fecha_celebracion' => $this->edicion?->fecha_celebracion,
            'fecha_apertura' => $this->edicion?->fecha_apertura,
            'fecha_cierre' => $this->edicion?->fecha_cierre,
            'css_file' => $this->edicion?->css_file,
            'curso' => [
                'id' => $this->id,
                'edicion_id' => $this->edicion_id,
                'enlace_curso_modle' => $this->enlace_curso_modle,
                'olimpiada' => $this->olimpiada,
                'curso' => $this->curso,
            ],
        ];
    }
}
