<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patrocinador extends BaseModel
{
    use HasFactory;

    protected $table = 'patrocinadores';

    protected $fillable = [
        'nombre',
        'logotipo',
    ];
}
