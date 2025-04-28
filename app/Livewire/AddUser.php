<?php

namespace App\Livewire;

use App\Traits\BootUserRepository;
use App\Traits\UserValidation;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AddUser extends Component
{
    use BootUserRepository;
    use UserValidation;
<<<<<<< HEAD


    protected $repository;

    public function boot(UserRepository $repository)
    {
        $this->repository = $repository;
    }
=======

    protected $repository;
>>>>>>> 57c6a68 (Exclude role properties to reset)

    #[Validate] public $name;
    #[Validate] public $contact;
    #[Validate] public $email;
    #[Validate] public $address;
    #[Validate] public $birthdate;
    #[Validate] public $username;
    #[Validate] public $password;
    #[Validate] public $role_id;
    #[Validate] public $roles;
    
    
    public function mount() {
        $this->roles = $this->repository->getRoles();
    }

<<<<<<< HEAD

=======
>>>>>>> 57c6a68 (Exclude role properties to reset)
    protected function rules()
    {
        return $this->validation_rules_array('create');
    }

    protected function messages()
    {
        return $this->validation_rules_messages('create');
    }
    
    public function addUser()
    {
    
        $validated = $this->validate();

        $this->repository->add($validated);
        $this->dispatch('show-success-modal', message: 'User added successfully!');
        $this->clearInputs();
        $this->dispatch('closeModal');
        $this->dispatch('reload-list');
    }

    public function clearInputs()
    {
        $this->reset(['name','contact','email','address','birthdate','username','password']);
    }

    public function render()
    {
        return view('livewire.add-user');
    }
}
