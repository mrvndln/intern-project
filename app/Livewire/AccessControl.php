<?php

namespace App\Livewire;

use App\Traits\BootUserRepository;
use Livewire\Component;

class AccessControl extends Component
{

    use BootUserRepository;

    protected $repository;
    public $moduleName;
    public $suggestions;

    public function suggestModule()
    {
        $this->reset(['suggestions']);
        $this->suggestions = $this->repository->findModule($this->moduleName);
    }

    public function updateOrSave()
    {
        $this->repository->updateOrCreate($this->moduleName);
        $this->dispatch('show-success-modal', message: 'Module Saved or Updated Successfully!');
        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.access-control');
    }
}
