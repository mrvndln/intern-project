<?php

namespace App\Livewire;

use App\Traits\BootTrait;
use App\Traits\BootUserRepository;
use App\Traits\BootUserTrait;
use Livewire\Component;

class ManageRoles extends Component
{
    use BootTrait;
    
    protected $repository;
    public $searchInput;
    public $roles;

    public function mount()
    {
        $this->roles = $this->user_repo->getRoles();
    }

    public function search()
    {
       $data = $this->searchInput;
       $this->roles = $this->user_repo->getResults($data,'role-list');
    }


    public function render()
    {
        return view('livewire.manage-roles');
    }
}
