<?php

namespace App\Livewire;

use App\Repositories\UserRepository;
use Livewire\Attributes\On;
use Livewire\Component;

class Dashboard extends Component
{
    public $id;
    public $name, $contact, $email, $address, $birthdate, $username, $password;
    protected $repository;
    public $showModal = false;

    public function boot(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function rules()
    {
        return [
            'name' => 'required|min:6',
            'contact' => 'required|min:11',
            'email' => 'required|email',
            'address' => 'required|min:10',
            'birthdate' => 'required',
            'username' => 'required|min:6',
            'password' => 'sometimes',
        ];
    }

    #[On('edit-user')]
    public function editUser($id)
    {
        $data = $this->repository->find($id);
        $this->name = $data->name;
        $this->contact = $data->contact;
        $this->email = $data->email;
        $this->address = $data->address;
        $this->birthdate = $data->birthdate;
        $this->username = $data->username;
        $this->id = $data->id;
        $this->showModal = true;
    }

    public function updateUser()
    {

        $this->validate();

        $updatedUser = [
            'name' => $this->name,
            'contact' => $this->contact,
            'email' => $this->email,
            'address' => $this->address,
            'birthdate' => $this->birthdate,
            'username' => $this->username,
            'password' => $this->password
        ];

        $this->repository->update($updatedUser, $this->id);
        $this->dispatch('user-added', message: 'User updated successfully!');
        $this->dispatch('reload-list');
        $this->hideForm();
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

    public function hideForm()
    {
        $this->showModal = false;
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
