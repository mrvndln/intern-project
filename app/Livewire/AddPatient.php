<?php

namespace App\Livewire;

use App\Traits\BootPatient;
use App\Traits\BootPatientTrait;
use App\Traits\BootTrait;
use App\Traits\BootUserRepository;
use App\Traits\ConstTrait;
use App\Traits\ValidationTrait;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

use Livewire\Component;

class AddPatient extends Component
{

    use BootTrait;
    use ValidationTrait;
    use ConstTrait;

    #[Validate] public $patient_name;
    #[Validate] public $patient_gender;
    #[Validate] public $patient_birthdate;
    #[Validate] public $patient_contact;
    #[Validate] public $patient_email;
    #[Validate] public $patient_address;

    protected function rules()
    {
        return $this->validation_rules_array(self::TYPE_PATIENT, self::ACTION_CREATE);
    }

    protected function messages()
    {
        return $this->validation_rules_messages(self::TYPE_PATIENT);   
    }
   
    

    public function addPatient(){

        $validated = $this->validate();
        $this->patient_repo->add($validated);
        $this->dispatch('show-success-modal', message: 'Patient added successfully!');
        $this->clearInputs();
        $this->dispatch('closeModal');
        $this->dispatch('reload-Patientlist');
    }

    #[On('reset-form')]
    public function clearInputs()
    {
        $this->reset(['patient_name','patient_contact','patient_email','patient_address','patient_birthdate','patient_gender']);
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.add-patient');
    }
}
