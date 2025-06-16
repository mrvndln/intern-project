<?php

namespace App\Livewire;

use App\Traits\BootPatient;
use App\Traits\BootPatientTrait;
use App\Traits\BootTrait;
use App\Traits\BootUserRepository;
use App\Traits\ConstTrait;
use App\Traits\ValidationTrait;
use Livewire\Component;

class UpdatePatient extends Component
{
    use BootTrait;
    use ValidationTrait;
    use ConstTrait;

    public $patient_id;
    public $patient_name, $patient_contact, $patient_email, $patient_address, $patient_birthdate, $patient_gender;
   

    public function mount()
    {
        $this->editPatient($this->patient_id);
    }

    protected function rules()
    {
        return $this->validation_rules_array(self::TYPE_PATIENT, self::ACTION_UPDATE);
    }

    protected function messages()
    {
        return $this->validation_rules_messages(self::TYPE_PATIENT);
    }

    public function editPatient($id)
    {   

        $patient = $this->patient_repo->find($id);

        $this->patient_name = $patient->name ?? "";
        $this->patient_contact = $patient->contact_number ?? "";
        $this->patient_email = $patient->email ?? "";
        $this->patient_address = $patient->address ?? "";
        $this->patient_birthdate = $patient->birth_date ?? "";
        $this->patient_gender = $patient->gender ?? "";
    }

    public function updatePatient()
    {
        $validated = $this->validate();

        $this->patient_repo->update($validated, $this->patient_id);

        $this->dispatch('show-success-modal', message: 'Patient updated successfully!');
        $this->dispatch('reload-Patientlist');
        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.update-patient');
    }
}
