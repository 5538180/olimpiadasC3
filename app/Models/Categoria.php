<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
    ];

    /**
     * Accessor para calcular el valor romano de num_convocatoria.
     *
     * @return int|null
     */
    public function getRomanoConvocatoriaAttribute()
    {
        // Verificar si el atributo pivot está disponible
        if (isset($this->pivot->num_convocatoria)) {
            return $this->convertirARomano($this->pivot->num_convocatoria);
        }

        return null; // Retornar null si no hay valor en el pivot
    }

    public function ediciones()
    {
        return $this->belongsToMany(Edicion::class, 'categorias_ediciones')
                    ->withPivot('num_convocatoria');
    }

    /**
     * @param int $number
     * @return string
     */
    function convertirARomano($number) {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }
}
