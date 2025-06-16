<?php

namespace App\Livewire;

use App\Traits\BootTrait;
use App\Traits\BootUserRepository;
use App\Traits\BootUserTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class RolePermissions extends Component
{
    use BootTrait;

    public $selectedRole;
    public $roleId;
    public $selectedPermissions = [];
    public $originalPermissions = [];
    public $moduleId;
    public $toggledModule = []; 
    public $moduleSearch = '';
    public $moduleResults;
    public $editing = true;
    public $isHidden = false;

    public function mount()
    {
        $this->moduleResults = $this->user_repo->getModules();
    }

    #[On('role_permissions')]
    public function setHeader($role, $roleId)
    {
        $this->roleId = $roleId;
        $this->selectedRole = $role;

        $permissions =  $this->user_repo->getRolePermissions($roleId);

        $this->selectedPermissions = $permissions;
        $this->originalPermissions = $permissions;
    }

    public function showModules()
    {
        if (strlen($this->moduleSearch) > 0) {
            $this->moduleResults = $this->user_repo->findModule($this->moduleSearch);
        } else {
            $this->moduleResults = $this->user_repo->getModules();
        }
    }

    public function save()
    {
        $this->user_repo->addRolePermission($this->selectedPermissions, $this->roleId);
        $this->dispatch('show-success-modal'); 
        $this->editing = true;
        $this->isHidden = false;
        $this->moduleSearch = '';
        $this->moduleResults = $this->user_repo->getModules();
        $this->selectedPermissions = $this->user_repo->getRolePermissions($this->roleId);
    }

    public function cancelEditing()
    {
        $this->moduleResults = $this->user_repo->getModules();
        $this->selectedPermissions = $this->originalPermissions;
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
