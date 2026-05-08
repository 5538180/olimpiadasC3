<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Curso extends Model
{
    use HasFactory;

    // - Referencia tabla
        protected $table = 'cursos'; 

        // - Atributos a rellenar
    protected $fillable = [
        'edicion_id',
        'id_curso_modle',
        'olimpiada',
        /* * Ahora de edicion de edicion'curso' */
    ];
    
    // - Casteos
       protected $casts = [
        'edicion_id' => 'integer',
        'id_curso_modle' => 'integer',
        'olimpiada' => 'integer',
        /* * Ahora en edicion 'curso'=>'string' */

    ];

    // -  Relaciones:

    public function edicion(): BelongsTo{
        return $this->belongsTo(Edicion::class);
    }
 }
