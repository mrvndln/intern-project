<?php

namespace App\Livewire;

use App\Traits\BootUserRepository;
use Livewire\Attributes\On;
use Livewire\Component;

class EditRole extends Component
{
    use BootUserRepository;

    public $data, $searchData, $modules, $roles;

    public function mount()
    {
        $this->modules = $this->repository->getModules();
        $this->roles = $this->repository->getRoles();
    }

    #[On('close-parent-access')]
    public function reloadModuleList() 
    {
        $this->modules = $this->repository->getModules();
    }

    public function searchModule()
    {
        $this->modules = $this->repository->findModule($this->searchData);
    }
    public function render()
    {
        return view('livewire.edit-role');
    }
}
