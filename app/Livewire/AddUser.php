<?php

namespace App\Livewire;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Livewire\Forms\CreateUserForm;
use App\Traits\UserValidation;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AddUser extends Component
{
    use UserValidation;
   
    protected $repository;

    public function boot(UserRepository $repository){
        $this->repository = $repository;
    }

    #[Validate] public $name;
    #[Validate] public $contact;
    #[Validate] public $email;
    #[Validate] public $address;
    #[Validate] public $birthdate;
    #[Validate] public $username;
    #[Validate] public $password;


    protected function rules() {
        return $this->validation_rules_array('create');
    }
      
    protected function messages() {
        return $this->validation_rules_messages('create');
    }
    public function addUser()
    {
        $validated = $this->validate();
        
        $this->repository->add($validated);
        $this->dispatch('user-added', message: 'User added successfully!');
        $this->clearInputs();
        $this->dispatch('closeModal');
        $this->dispatch('reload-list');
    }

    public function clearInputs()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.add-user');
    }
}
