<?php

namespace App\View\Components;

use App\Models\Slide as ModelsSlide;
use Illuminate\View\Component;

class Slide extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $slides = ModelsSlide::all();
        return view('components.slide', compact('slides'));
    }
}
