<?php

namespace App\Livewire;

use App\Models\User;
use App\Repositories\UserRepository;
use Livewire\Component;

class CreateForm extends Component
{

    public $name, $contact, $email, $address, $birthdate, $username, $password;
    public $showModal = false;
    public $editMode = false;
    public $userId;
    public $users;
    protected $repository;


    public function mount(UserRepository $repository)
    {
        $this->repository = $repository;
        $this->users = $this->repository->getAll();
    }

    public function addUser(UserRepository $repository)
    {
        $this->repository = $repository;
        $user_data = [
            'name' => $this->name,
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

    public function clearInputs()
    {
        $this->name = '';
        $this->contact = '';
        $this->email = '';
        $this->address = '';
        $this->birthdate = '';
        $this->username = '';
        $this->password = '';
    }

    public function showForm()
    {
        $this->clearInputs();
        $this->showModal = true;
        $this->editMode = false;
    }

    public function hideForm()
    {
        $this->showModal = false;
    }

    public function editUser(UserRepository $repository, $id)
    {
        $this->repository = $repository;
        $user = $this->repository->find($id);
        $this->name = $user->name;
        $this->contact = $user->contact;
        $this->email = $user->email;
        $this->address = $user->address;
        $this->birthdate = $user->birthdate;
        $this->username = $user->username;
        $this->showModal = true;
        $this->editMode = true;
        $this->userId = $id;
    }

    public function updateUser(UserRepository $repository) {
        $this->repository = $repository;
        
        $updatedUser = [
            'name' => $this->name,
            'contact' => $this->contact,
            'email' => $this->email,
            'address' => $this->address,
            'birthdate' => $this->birthdate,
            'username' => $this->username,
            'password' => $this->password
        ];

        $this->repository->update($updatedUser,$this->userId);
        $this->users = $this->repository->getAll();
        $this->clearInputs();
        $this->hideForm();
    }

    public function deleteUser($id,UserRepository $repository) {
        $this->repository = $repository;
        $this->repository->delete($id);
        $this->repository->getAll();    
    }


    public function render()
    {
        return view('livewire.create-form');
    }
}
