<?php

namespace App\View\Components\Master;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Technology;

class DocView extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $technology = Technology::where('name', $this->name)
            ->with([
                'sections:id,title,content,technology_id',
                'sections.concepts:id,section_id,name,syntax,example,description',
                'builtinFunctions:id,name,syntax,example,description,technology_id',
            ])
            ->firstOrFail(['id', 'name', 'description']);
        return view('components.master.doc-view', compact('technology'));
    }
}
