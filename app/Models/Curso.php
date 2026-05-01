<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Curso extends Model
{
    use HasFactory;

        protected $table = 'cursos'; //nombre de la tabla de la base de datos en phpmyadmin me daba problemas y la he especificado

    protected $fillable = [
        'edicion_id',
        'enlace_curso_modle'
    ];

    // -  Relaciones:

    public function edicion(): BelongsTo{
        return $this->belongsTo(Edicion::class);
    }
 }
