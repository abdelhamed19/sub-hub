<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableComponent extends Component
{
    public $title;
    public $createRoute;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $createRoute)
    {
        $this->title = $title;
        $this->createRoute = $createRoute;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table-component', [
            'title' => $this->title,
            'createRoute' => $this->createRoute,
        ]);
    }
}
