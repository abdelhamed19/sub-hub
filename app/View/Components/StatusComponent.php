<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StatusComponent extends Component
{
    /**
     * The status indicator.
     *
     * @var bool
     */
    public $isActive;

    /**
     * Create a new component instance.
     *
     * @param  bool  $isActive
     * @return void
     */
    public function __construct($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.status-component');
    }
}
