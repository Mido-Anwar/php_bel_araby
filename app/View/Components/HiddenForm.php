<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HiddenForm extends Component
{
    /**
     * Create a new component instance.
     */

    public bool $open;
    public string $actionUrl;

    public function __construct($actionUrl, $open = false)
    {
        $this->open = $open;
        $this->actionUrl = $actionUrl;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hidden-form');
    }
}
