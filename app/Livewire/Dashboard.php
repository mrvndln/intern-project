<?php

namespace App\Livewire;

use App\Traits\BootTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Dashboard extends Component
{
    use BootTrait;

    public $pageTitle = 'Dashboard';
    public $activeView = 'dashboard';
    public $totalUsers, $activeUsers;
    public $totalPatients, $activePatients;

    public function mount()
    {
        $this->totalUsers = $this->user_repo->totalUsers();
        $this->activeUsers = $this->user_repo->activeUsers();
        $this->activePatients = $this->patient_repo->activePatients();
        $this->totalPatients = $this->patient_repo->totalPatients();
    }

    public function navPage($pageTitle)
    {
        $this->activeView = $pageTitle;

        switch ($this->activeView) {
            case 'userManagement':
                $this->pageTitle = 'Users';
                break;

            case 'patientManagement':
                $this->pageTitle = 'Patients';
                break;

            case 'dashboard':
                $this->pageTitle = 'Dashboard';
                break;

            default:
                $this->pageTitle = 'Dashboard';
                break;
        }
    }


    #[On('manage_roles')]
    public function openManageRoles($value)
    {
        $this->activeView = $value;
        $this->pageTitle = 'Manage Roles';
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
