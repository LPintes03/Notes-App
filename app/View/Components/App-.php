<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class App extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // You can initialize any properties or dependencies here if needed
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.app');
    }
}