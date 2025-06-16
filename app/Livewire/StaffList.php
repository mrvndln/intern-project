<?php

namespace App\Livewire;

use App\Traits\BootTrait;
use App\Traits\BootUserTrait;
use App\Traits\ConstTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class StaffList extends Component
{
    use BootTrait;
    use ConstTrait;

    public $users;
    public $staff;
    public $searchInput;

    public $create_modal = false;

    public function mount() {
        $this->users = $this->user_repo->getAll(self::TYPE_USER);  
    }

    #[On('reload-list')]
    public function reloadList(){
        $this->users = $this->user_repo->getAll(self::TYPE_USER);
    }

    public function searchUser(){
        $this->reset(['users']);
        $this->users = $this->user_repo->getResults($this->searchInput, self::TYPE_USER);
    }

    public function triggerDelete($id) {
        $this->dispatch('confirmDeleteUser', id: $id);
    }

    #[On('deleteUser')]
    public function deleteUser($id) {
        $this->user_repo->delete(self::TYPE_USER, $id);
        $this->users = $this->user_repo->getAll(self::TYPE_USER); 
        $this->dispatch('user-deleted');   
    }   

    public function render()
    {
        return view('livewire.staff-list');
    }
}
