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
                'builtinfunctions:id,name,syntax,example,description',
                'sections:id,title,content,technology_id',
                'sections.concepts:id,section_id,name,syntax,example,description',

            ])
            ->firstOrFail(['id', 'name', 'description']);
    }

    public function selectItem($type, $id)
    {
        if ($type === 'section') {
            $this->current = $this->technology->sections->firstWhere('id', $id);
        } elseif ($type === 'concept') {
            $this->current = $this->technology->sections
                ->flatMap(fn($section) => $section->concepts)
                ->firstWhere('id', $id);
        } elseif ($type === 'function') {
            $this->current = $this->technology->builtinfunctions
                ->firstWhere('id', $id);
        }
    }
    public function render()
    {
        return view('livewire.technology-tutorial');
    }
}
