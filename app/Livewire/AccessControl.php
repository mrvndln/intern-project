<?php

namespace App\Livewire;

use App\Traits\BootUserRepository;
use Livewire\Component;

class AccessControl extends Component
{

    use BootUserRepository;

    protected $repository;
    public $roles;

    public function mount() {
        $this->roles = $this->repository->getRoles();
    }

    public function render()
    {
        return view('livewire.access-control');
    }
}
