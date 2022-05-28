<?php

namespace App\View\Components;

use Illuminate\View\Component;

class item extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $service;
    public $value;

    public function __construct($service, $value)
    {
        $this->value = $value;
        $this->service = $service;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.item');
    }
}
