<?php

namespace App\Livewire;

use App\Traits\BootTrait;
use App\Traits\BootUserRepository;
use App\Traits\BootUserTrait;
use Livewire\Component;

class AccessControl extends Component
{

    use BootTrait;

    public $roles;

    public function mount() {
        $this->roles = $this->user_repo->getRoles();
    }

    public function render()
    {
        return view('livewire.access-control');
    }
}
