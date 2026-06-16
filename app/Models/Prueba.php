<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prueba extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'categorias_ediciones_id',
        'patrocinadores_id'
    ];
}
