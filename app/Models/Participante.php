<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participante extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'grupo_id',
        'nombre',
        'apellidos',
    ];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }
}
