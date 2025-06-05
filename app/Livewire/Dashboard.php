<?php

namespace App\Livewire;

use App\Traits\BootUserRepository;
use Livewire\Attributes\On;
use Livewire\Component;

class Dashboard extends Component
{
    use BootUserRepository;

    public $activeView = 'dashboard';
    public $totalUsers, $activeUsers;

    public function mount()
    {
        $this->totalUsers = $this->repository->totalUsers();
        $this->activeUsers = $this->repository->activeUsers();
    }

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
