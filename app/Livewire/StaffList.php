<?php

namespace App\Livewire;

use App\Repositories\UserRepository;
use Livewire\Attributes\On;
use Livewire\Component;

class StaffList extends Component
{
    public $users;
    protected $repository;

    public function boot(UserRepository $repository) {
        $this->repository = $repository;
        $this->users = $this->repository->getAll();
    }
    
    #[On('reload-list')]
    public function reloadList(UserRepository $repository){
        $this->repository = $repository;
        $this->users = $this->repository->getAll();
    }

    public function editUser($id) {
        $this->dispatch('edit-user', $id);
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
