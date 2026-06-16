<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ciclo extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'id',
        'codigo',
        'nombre',
        'grado_id',
    ];

    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }
}
