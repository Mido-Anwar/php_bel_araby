<?php

namespace App\View\Components\Master;

use App\Models\Technology;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     */


    public function __construct() {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $technologies = Technology::select('id', 'name')->get();
        return view('components.master.header', [
            'technologies' => $technologies
        ]);
    }
}
