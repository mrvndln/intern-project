<?php

namespace App\Livewire;

use App\Traits\BootUserRepository;
use App\Traits\UserValidation;
use App\Traits\ValidationTrait;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ParentAccess extends Component
{

    use BootUserRepository;
    use ValidationTrait;

    protected $repository;

    public $suggestions;
    public $moduleName;
   

    protected function rules()
    {
       return $this->validation_rules_array('searchPermssions'); // this will return an array of validation rules.
    }

    public function suggestModule()
    {
        $this->reset(['suggestions']);
        $this->resetValidation();
        $this->suggestions = $this->repository->findModule($this->moduleName);
    }

    public function updateOrSave()
    {
        $validated = $this->validate();
        $this->repository->updateOrCreate($validated['moduleName']);
        $this->dispatch('show-success-modal', message: 'Permission has been successfully added/updated!');
        $this->dispatch('close-add-permissions');
        $this->dispatch('hide-permission-edit');
    }

    public function searchField($data) {    
        $this->moduleName = $data;
        $this->reset('suggestions');
    }

    public function render()
    {
        return view('livewire.parent-access');
    }
}
