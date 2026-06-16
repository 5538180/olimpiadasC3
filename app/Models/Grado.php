<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grado extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
    ];

    public function ciclos()
    {
        return $this->hasMany(Ciclo::class);
    }
}
