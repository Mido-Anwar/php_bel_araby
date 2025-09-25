<?php

namespace App\Livewire;

use Livewire\Component;

class HiddenForm extends Component
{
    public bool $open = false;
    public ?int $modelId = null;
    public string $actionUrl;
    public array $fields = []; // الحقول

    public function mount(?int $modelId = null, string $actionUrl, array $fields = [])
    {
        $this->modelId = $modelId;
        $this->actionUrl = route($actionUrl, $modelId ?? null);
        $this->fields = $fields;
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
