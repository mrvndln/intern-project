<?php

namespace App\Livewire;

use App\Traits\BootTrait;
use App\Traits\BootUserRepository;
use App\Traits\BootUserTrait;
use App\Traits\ConstTrait;
use App\Traits\UserValidation;
use App\Traits\ValidationTrait;
use Livewire\Component;

class UpdateUser extends Component
{
    use BootTrait;
    use ValidationTrait;
    use ConstTrait;

    public $id;
    public $name, $contact, $email, $address, $birthdate, $username, $password, $currentRole_id, $current_role, $roles, $role_id;
    protected $repository;

    public function mount()
    {
        $this->roles = $this->user_repo->getRoles();
        $this->editUser($this->id);
    }

    protected function rules()
    {
        return $this->validation_rules_array(self::TYPE_USER,self::ACTION_UPDATE);
    }

    protected function messages()
    {
        return $this->validation_rules_messages(self::TYPE_USER);
    }

    public function editUser($id)
    {
        $user = $this->user_repo->find($id);
        
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
        
        $this->user_repo->update($validated, $this->id);
        $this->dispatch('show-success-modal', message: 'User updated successfully!');
        $this->dispatch('reload-list');
        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.update-user');
    }
}
