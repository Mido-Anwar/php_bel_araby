<?php

namespace App\Livewire;

use Livewire\Component;

class HiddenForm extends Component
{
    public bool $open = false;
    public $modelId;

    public function mount($modelId)
    {
        $this->modelId = $modelId;
      
    }

    public function toggle()
    {
        $this->open = !$this->open;
    }
    public function render()
    {
        return view('livewire.hidden-form');
    }
}
