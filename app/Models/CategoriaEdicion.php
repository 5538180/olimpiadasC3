<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaEdicion extends Model
{
    use HasFactory;

    protected $table = 'categorias_ediciones';

    protected $fillable = [
        'categoria_id',
        'edicion_id',
        'num_convocatoria',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function edicion()
    {
        return $this->belongsTo(Edicion::class);
    }
}
