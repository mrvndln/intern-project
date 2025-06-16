<?php

namespace App\Livewire;

use App\Traits\BootTrait;
use App\Traits\BootUserRepository;
use Livewire\Attributes\On;
use Livewire\Component;

class EditRole extends Component
{
    use BootTrait;

    public $data, $searchData, $modules, $roles;

    public function mount()
    {
        $this->modules = $this->user_repo->getModules();
        $this->roles = $this->user_repo->getRoles();
    }

    #[On('close-parent-access')]
    public function reloadModuleList() 
    {
        $this->modules = $this->user_repo->getModules();
    }

    public function searchModule()
    {
        $this->modules = $this->user_repo->findModule($this->searchData);
    }

    public function render()
    {
        return view('livewire.edit-role');
    }
}
