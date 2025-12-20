<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableComponent extends Component
{
    public $title;
    public $createRoute;
    public $deleteMultipleUrl;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $createRoute, $deleteMultipleUrl)
    {
        $this->title = $title;
        $this->createRoute = $createRoute;
        $this->deleteMultipleUrl = $deleteMultipleUrl;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table-component', [
            'title' => $this->title,
            'createRoute' => $this->createRoute,
            'deleteMultipleUrl' => $this->deleteMultipleUrl,
        ]);
    }
}
