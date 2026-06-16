<?php

namespace App\View\Components\Frontend;

use App\Models\Categoria;
use App\Models\Edicion;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EjerciciosEdicionesAnteriores extends Component
{
    public $categoria;

    public function __construct()
    {
        $this->categoria = Categoria::find(1);
    }

    public function render(): View|Closure|string
    {
        $edicionesYcursos = Edicion::with('curso')->get();

        return view('components.frontend.ejercicios-ediciones-anteriores', [
            'edicionesYcursos' => $edicionesYcursos,
        ]);
    }
}
