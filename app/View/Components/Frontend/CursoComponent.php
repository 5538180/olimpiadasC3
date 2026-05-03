<?php

namespace App\View\Components\Frontend;

use App\Models\Curso;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CursoComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $cursosYediciones = Curso::with('edicion')->orderBy('olimpiada')->get();

        return view('components.frontend.curso-component', compact('cursosYediciones'));
    }
}
