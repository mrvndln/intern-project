<?php

namespace App\Livewire;

use App\Repositories\UserRepository;
use Livewire\Attributes\On;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard');
    }
}
