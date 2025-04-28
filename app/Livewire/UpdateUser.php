<?php

namespace App\Livewire;

use App\Traits\BootUserRepository;
use App\Traits\UserValidation;
use Livewire\Component;

class UpdateUser extends Component
{   
    use BootUserRepository;
    use UserValidation;

    public $id;
    public $name, $contact, $email, $address, $birthdate, $username, $password, $current_role, $roles, $role_id;
    protected $repository;

    public function mount(){
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
        $this->id = $user->id;
        $this->name = $user->name;
        $this->contact = $user->user_detail->contact;
        $this->email = $user->email;
        $this->address = $user->user_detail->address;
        $this->birthdate = $user->user_detail->birthdate;
        $this->username = $user->username;
        
        foreach($user->roles as $role){
            $this->role_id = $role->id;
            $this->current_role = $role->role;
        }
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
