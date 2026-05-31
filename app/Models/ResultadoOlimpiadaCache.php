<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultadoOlimpiadaCache extends Model
{
    use HasFactory;

    protected $table = 'resultados_olimpiadas_cache';

    protected $fillable = [
        'grado',
        'lastname',
        'firstname',
        'id_prueba',
        'maxpuntuacion',
        'MomentoConsecución',
        'penalizaciones',
        'TiempoFinal',
        'nombrePrueba',
    ];

    protected $casts = [
        'id_prueba' => 'integer',
        'maxpuntuacion' => 'decimal:5',
        'MomentoConsecución' => 'datetime',
        'penalizaciones' => 'integer',
        'TiempoFinal' => 'datetime',
    ];

    public function prueba()
    {
        return $this->belongsTo(Prueba::class, 'id_prueba');
    }
}
