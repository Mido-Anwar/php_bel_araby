<?php

namespace App\Livewire;

use Livewire\Component;

class HiddenForm extends Component
{
    public bool $open = false;
    public $modelId;
    public  $actionUrl;


    public function mount($modelId, $actionUrl = null)
    {
        $this->modelId = $modelId;
        $this->actionUrl = route($actionUrl, $modelId ?? null);

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
