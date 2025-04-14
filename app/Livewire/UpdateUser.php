<?php

namespace App\Livewire;

use App\Repositories\UserRepository;
use App\Traits\UserValidation;
use Livewire\Attributes\On;
use Livewire\Component;

class UpdateUser extends Component
{
    use UserValidation;

    public $id;
    public $name, $contact, $email, $address, $birthdate, $username, $password;
    protected $repository;

    public function boot(UserRepository $repository)
    {
        $this->repository = $repository;
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
        $this->contact = $user->contact;
        $this->email = $user->email;
        $this->address = $user->address;
        $this->birthdate = $user->birthdate;
        $this->username = $user->username;
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
