<?php

namespace App\Livewire;

use App\Repositories\UserRepository;
use Livewire\Component;

class CreateForm extends Component
{
    public $name, $contact, $email, $address, $birthdate, $username, $password;
    protected $repository;
    public function addUser(UserRepository $repository) {
        $this->repository = $repository;
        $user_data = [ 
            'name'=> $this->name,
            'contact' => $this->contact,
            'email' => $this->email,
            'address' => $this->address,
            'birthdate' => $this->birthdate,
            'username' => $this->username,
            'password' => $this->password
        ];
        
        $this->repository->add($user_data);
        $this->clearInputs();
        return redirect()->route('test');
    }

    public function clearInputs() {
        $this->name = '';
        $this->contact = '';
        $this->email = '';
        $this->address = '';
        $this->birthdate = '';
        $this->username = '';
        $this->password = '';
    }
    
    public function render()
    {
        return view('livewire.create-form');
    }
}
