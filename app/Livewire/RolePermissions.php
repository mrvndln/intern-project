<?php

namespace App\Livewire;

use App\Traits\BootUserRepository;
use Livewire\Attributes\On;
use Livewire\Component;

class RolePermissions extends Component
{
    use BootUserRepository;

    public $selectedRole;
    public $roleId;
    public $selectedPermissions = [];
    public $moduleSearch = '';
    public $moduleResults;
    public $editing = true;
    public $isHidden = false;

    use BootUserRepository;


    public function mount()
    {
        $this->moduleResults = $this->repository->getModules();
    }

    #[On('role_permissions')]
    public function setHeader($role, $roleId)
    {
        $this->roleId = $roleId;
        $this->selectedRole = $role;
        $this->selectedPermissions = $this->repository->getRolePermissions($roleId);
    }

    public function showModules()
    {
        if (strlen($this->moduleSearch) > 0) {
            $this->moduleResults = $this->repository->findModule($this->moduleSearch);
        } else {
            $this->moduleResults = $this->repository->getModules();
        }
    }

    public function save()
    {
        // dd($this->selectedPermissions);
        // exit;
        $this->repository->addRolePermission($this->selectedPermissions, $this->roleId);
        $this->dispatch('show-success-modal');
        $this->editing = true;
        $this->isHidden = false;
    }

    public function cancelEditing()
    {
        $this->reset(['selectedPermissions']);
        $this->selectedPermissions = $this->repository->getRolePermissions($this->roleId);
        $this->moduleResults = $this->repository->getModules();
        $this->moduleSearch = '';
        $this->editing = true;
        $this->isHidden = false;
       
    }

    
    #[On('hide-permission-edit')]
    public function closeEdit()
    {
        $this->cancelEditing();
    }


    public function render()
    {
        return view('livewire.role-permissions');
    }
}
