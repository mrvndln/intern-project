<?php

namespace App\Livewire;
use Livewire\Attributes\On;
use Livewire\Component;

class Dashboard extends Component
{
    public $activeView = 'dashboard';

    #[On('manage_roles')]
    public function openManageRoles($value)
    {
        $this->activeView = $value;
    }

    #[On('role_permissions')]
    public function openRolePermissions($value)
    {
        $this->activeView = $value;
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
