<?php

namespace App\Livewire;
use App\Traits\BootUserRepository;
use Livewire\Component;

class ManageRoles extends Component
{
    use BootUserRepository;

    protected $repository;
    public $searchInput;
    public $roles;

    public function mount()
    {
        $this->roles = $this->repository->getRoles();
    }

    public function search()
    {
       $data = $this->searchInput;
       $this->roles = $this->repository->getResults($data,'role-list');
    }


    public function render()
    {
        return view('livewire.manage-roles');
    }
}
