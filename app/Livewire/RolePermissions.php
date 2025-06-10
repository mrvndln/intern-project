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
    public $originalPermissions = [];
    public $moduleId;
    public $toggledModule = []; 
    public $moduleSearch = '';
    public $moduleResults;
    public $editing = true;
    public $isHidden = false;

    use BootUserRepository;


    public function mount()
    {
        $this->moduleResults = $this->repository->getModules();
    }

    // public function togglePermission($id)
    // {
    //     // $this->toggledModule = array_unique(
    //     //     array_merge($this->toggledModule, [$id])
    //     // );        

    //     if (in_array($id, $this->selectedPermissions)) {
    //         $this->selectedPermissions = array_diff($this->selectedPermissions, [$id]);
    //         // $this->repository->addRolePermission($this->selectedPermissions, $this->roleId);
    //     } else {
    //         $this->selectedPermissions[] = $id;
    //         // $this->repository->addRolePermission($this->selectedPermissions, $this->roleId);
    //     }
    // }


    #[On('role_permissions')]
    public function setHeader($role, $roleId)
    {
        $this->roleId = $roleId;
        $this->selectedRole = $role;

        $permissions =  $this->repository->getRolePermissions($roleId);

        $this->selectedPermissions = $permissions;
        $this->originalPermissions = $permissions;

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
    
        $this->repository->addRolePermission($this->selectedPermissions, $this->roleId);
        $this->dispatch('show-success-modal'); 
        $this->editing = true;
        $this->isHidden = false;
        $this->moduleSearch = '';
        $this->moduleResults = $this->repository->getModules();
        $this->selectedPermissions = $this->repository->getRolePermissions($this->roleId);

    }

    public function cancelEditing()
    {

        $this->moduleResults = $this->repository->getModules();
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
