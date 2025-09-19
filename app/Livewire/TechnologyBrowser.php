<?php

namespace App\Livewire;

use App\Models\Technology;
use Livewire\Component;

class TechnologyBrowser extends Component
{

    public $technologies;
    public $selectedTech = null;

    public function mount()
    {
        // هات كل الـ technologies فقط
        $this->technologies = Technology::select('id', 'name')->get();
    }

    public function selectTech($id)
    {
        // لما يختار تكنولوجيا نجيبها بالـ relations
        $this->selectedTech = Technology::with(['sections.concepts', 'sections.builtinFunctions'])
            ->find($id);
    }
    public function render()
    {
        return view('livewire.technology-browser');
    }
}
