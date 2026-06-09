<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Puntuacion extends Model
{
    use HasFactory;

    protected $table = 'puntuaciones';

        protected $fillable = [
        'participante_id',
        'juez_id',
        'puntos',
        'comentario'
    ];

    /* * Casteo por si necesito el validate */
/*         protected $casts = [
        'participante_id' => 'datetime',
        'juez_id' => 'hashed',
        'puntos' => 'hashed',
        'comentario' => 'string',
    ]; */

    /* *  Metodos */
    public function participante(): BelongsTo
    {
        return $this->belongsTo(User::class,'participante_id');
    }
    public function juez(): BelongsTo
    {
        return $this->belongsTo(User::class,'juez_id');
    }
}
