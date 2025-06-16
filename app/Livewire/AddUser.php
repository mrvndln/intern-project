<?php

namespace App\Livewire;

use App\Traits\BootTrait;
use App\Traits\BootUserRepository;
use App\Traits\BootUserTrait;
use App\Traits\ConstTrait;
use App\Traits\UserValidation;
use App\Traits\ValidationTrait;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AddUser extends Component
{
    use BootTrait;
    use ValidationTrait;
    use ConstTrait;

    protected $repository;

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
        $this->roles = $this->user_repo->getRoles();
    }

    protected function rules()
    {
        return $this->validation_rules_array(self::TYPE_USER,self::ACTION_CREATE);
    }

    protected function messages()
    {
        return $this->validation_rules_messages(self::TYPE_USER);
    }
    
    public function addUser()
    {
    
        $validated = $this->validate();
        
        $type_user = $this->type_user;

        $this->user_repo->add($type_user,$validated);
        $this->dispatch('show-success-modal', message: 'User added successfully!');
        $this->clearInputs();
        $this->dispatch('closeModal');
        $this->dispatch('reload-list');
    }

    #[On('reset-form')]
    public function clearInputs()
    {
        $this->reset(['name','contact','email','address','birthdate','username','password','role_id']);
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.add-user');
    }
}
