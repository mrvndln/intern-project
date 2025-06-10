<?php

namespace App\Livewire;

use App\Traits\BootUserRepository;
use App\Traits\UserValidation;
use App\Traits\ValidationTrait;
use Livewire\Component;

class UpdateUser extends Component
{
    use BootUserRepository;
    use ValidationTrait;

    public $id;
    public $name, $contact, $email, $address, $birthdate, $username, $password, $currentRole_id, $current_role, $roles, $role_id;
    protected $repository;

    public function mount()
    {
        $this->roles = $this->repository->getRoles();
        $this->editUser($this->id);
    }

    protected function rules()
    {
        return $this->validation_rules_array('update', $this->id);
    }

    public function editUser($id)
    {
        $user = $this->repository->find($id);
        
        $this->id = $user->id ?? "";
        $this->name = $user->name ?? "";
        $this->contact = $user->contact ?? "";
        $this->email = $user->email ?? "";
        $this->address = $user->address ?? "";
        $this->birthdate = $user->birthdate ?? "";
        $this->username = $user->username ?? "";
        $this->current_role = $user->role ?? "";
        $this->role_id = $user->role_id ?? "";
        
    }

    public function updateUser()
    {
        $validated = $this->validate();
        
        $this->repository->update($validated, $this->id);
        $this->dispatch('show-success-modal', message: 'User updated successfully!');
        $this->dispatch('reload-list');
        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.update-user');
    }
}
