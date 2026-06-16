<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Curso extends BaseModel
{
     protected $table = 'cursos';
    use HasFactory;
        protected $fillable = [
        'nombre',
        'edicion_id',
        'url',
    ];

    


       public function edicion()
    {
        return $this->belongsTo(Edicion::class,'edicion_id');
    }
}
