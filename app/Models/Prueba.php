<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'categorias_ediciones_id',
        'patrocinador_id',
    ];

    public function resultadosOlimpiadasCaches()
    {
        return $this->hasMany(ResultadoOlimpiadaCache::class, 'id_prueba');
    }

    // * Nueva relacion creada
    public function grupos()
    {
        return $this->belongsToMany(
            Grupo::class,
            'resultados_pruebas',
            'prueba_id',
            'grupo_id',
        )->withPivot('puntos','tiempo','penalizacion');
    }
}
