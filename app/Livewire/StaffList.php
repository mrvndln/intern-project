<?php

//try next time to implement a base class for all components

namespace App\Livewire;

use App\Traits\BootUserRepository;
use Livewire\Attributes\On;
use Livewire\Component;

class StaffList extends Component
{
    use BootUserRepository;

    public $users;
    public $staff;
    protected $repository;

    public function mount() {
        $this->users = $this->repository->getAll();  
    }

    #[On('reload-list')]
    public function reloadList(){
        $this->users = $this->repository->getAll();
    }

    #[On('search-user')]
    public function searchUser($data){
        $this->reset(['users']);
        $this->users = $this->repository->getResults($data);
    }

    public function triggerDelete($id) {
        $this->dispatch('triggerDelete', userId: $id);
    }

    #[On('deleteUser')]
    public function deleteUser($userId) {
        $this->repository->delete($userId);
        $this->users = $this->repository->getAll(); 
        $this->dispatch('user-deleted');   
    }   

    public function render()
    {
        return view('livewire.staff-list');
    }
}
