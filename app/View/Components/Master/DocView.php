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
    public function __construct(
        public Technology $technology
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // التأكد من جلب العلاقات المطلوبة بكفاءة عالية
        $this->technology->loadMissing([
            'sections:id,title,description,slug,technology_id',
            'sections.concepts:id,section_id,title,slug,description,type,syntax,return_type',
        ]);

        return view('components.master.doc-view');
    }
}
