<?php

namespace App\Livewire;

use App\Models\Technology;
use Livewire\Component;

class TechnologyTutorial extends Component
{
        public $technology;
    public $current = null;

    public function mount($name)
    {
        $this->technology = Technology::where('name', $name)
            ->with([
                'sections:id,title,content,technology_id',
                'sections.concepts:id,section_id,name,syntax,example,description',
                'sections.builtinFunctions:id,section_id,name,syntax,example,description',
            ])
            ->firstOrFail(['id','name','description']);
    }

    public function selectItem($type, $id)
    {
        if($type === 'section') {
            $this->current = $this->technology->sections->firstWhere('id', $id);
        }
        if ($type === 'concept') {
            $this->current = $this->technology->sections
                ->flatMap->concepts
                ->firstWhere('id', $id);
        } elseif ($type === 'function') {
            $this->current = $this->technology->sections
                ->flatMap->builtinFunctions
                ->firstWhere('id', $id);
        }
    }
    public function render()
    {
        return view('livewire.technology-tutorial');
    }
}
