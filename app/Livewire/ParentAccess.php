<?php

namespace App\Livewire;

use App\Traits\BootUserRepository;
use Livewire\Component;

class ParentAccess extends Component
{

    use BootUserRepository;

    protected $repository;
    public $moduleName;
    public $suggestions;

    public function suggestModule()
    {
        $this->reset(['suggestions']);
        $this->suggestions = $this->repository->findModule($this->moduleName);
    }

    public function updateOrSave()
    {
        if(empty($this->moduleName)){

            
        }else{
            $this->repository->updateOrCreate($this->moduleName);
            $this->dispatch('show-success-modal', message: 'Permission has been successfully added/updated!');
            $this->dispatch('close-parent-access');
            $this->dispatch('hide-permission-edit');
        }
       
    }

    public function searchField($data) {    
        $this->moduleName = $data;
        $this->reset('suggestions');
    }

    public function render()
    {
        return view('livewire.parent-access');
    }
}
