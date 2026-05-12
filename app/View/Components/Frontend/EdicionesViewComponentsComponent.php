<?php

namespace App\View\Components\Frontend;

use App\Models\Edicion;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


class EdicionesViewComponentsComponent extends Component
{

    // ? Recuerso que para cosas puntuales en una clase, se usaba funcioes estaticas, pero no se si es mejor simplemente con protected
    static function formateoCursoEscolar($curso_escolar)
    {
        $curso__escolar = explode('/', $curso_escolar);
        return "( 20  $curso__escolar[0]   -   20  $curso__escolar[1]  )";
    }
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
        $ediciones = Edicion::withWhereHas('curso')->get();


        $ediciones->map(function ($edicion, $index) {
            $edicion->curso_escolar = self::formateoCursoEscolar($edicion->curso_escolar);

            return $edicion;
        });

        return view('components.frontend.ediciones-view-components-component', compact('ediciones'));
    }
}
