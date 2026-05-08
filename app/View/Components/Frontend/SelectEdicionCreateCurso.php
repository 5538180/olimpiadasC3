<?php

namespace App\View\Components\Frontend;

use App\Models\Edicion;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectEdicionCreateCurso extends Component
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

        $ediciones = Edicion::orderBy('id')->get();
        return view('components.frontend.select-edicion-create-curso', compact('ediciones'));
    }
}
