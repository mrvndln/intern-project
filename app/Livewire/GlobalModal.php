<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class GlobalModal extends Component
{
    public $show = false;
    public $component = '';
    public $params = [];  
    
    #[On('openModal')]
    public function openModal($component, $params) {
        $this->component = $component;
        $this->params = $params;
        $this->show = true;
    }

    #[On('closeModal')]
    public function closeModal() {
        $this->dispatch('reload-list');
        $this->reset();
        $this->show = false;
    }
    public function render()
    {
        return view('livewire.global-modal');
    }
}
