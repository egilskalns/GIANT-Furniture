<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Slider extends Component
{
    public $name;
    public $min;
    public $max;
    /**
     * Create a new component instance.
     */
    public function __construct($name, $min, $max)
    {
        $this->name = $name;
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.slider');
    }
}
