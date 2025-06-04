<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class GlobalModal extends Component
{
    public $show = false;
    public $parentAccess = false;
    public $create_modal = false;
    public $edit_modal = false;
    public $component = '';
    public $user_id;  
    public $params = [];
    
    #[On('openModal')]
    public function openModal($component, $params) {
        $this->component = $component;
        $this->params = $params;
        $this->show = true;
    }

    #[On('create_modal')]
    public function open_create_modal(){
        $this->create_modal = true;
    }

    #[On('edit_modal')]
    public function open_edit_modal($params){
        $this->params = $params;

        if($this->params){
            $this->edit_modal = true;
        }
       
    }

    #[On('closeModal')]
    public function closeModal() {
        $this->dispatch('reload-list');
        $this->reset();
        $this->create_modal = false;
    }

    #[On('open-parent-access')]
    public function openParentAccess() {
        $this->parentAccess = true;
    }

    #[On('close-parent-access')]
    public function closeParentAccess() {
        $this->parentAccess = false;
    }

    public function render()
    {
        return view('livewire.global-modal');
    }
}
