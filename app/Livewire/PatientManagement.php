<?php

namespace App\Livewire;

use App\Traits\BootPatientTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class PatientManagement extends Component
{
    use BootPatientTrait;
    
    public $searchInput;

    public $patients;

    public function mount() {
        $this->patients = $this->patient_repo->getAll();
    }

    public function searchPatient(){
        $this->reset(['patients']); 
        $this->patients = $this->patient_repo->getResults($this->searchInput);
    }

    #[On('reload-Patientlist')]
    public function reloadList(){
        $this->patients = $this->patient_repo->getAll();
    }
    
    public function triggerPatientDelete($id) {
        $this->dispatch('confirmDeletePatient', id: $id);
    }

    #[On('deletePatient')]
    public function deletePatient($id) {
        $this->patient_repo->delete($id);
        $this->patients = $this->patient_repo->getAll(); 
        $this->dispatch('reload-Patientlist'); 
    }   

    public function render()
    {
        return view('livewire.patient-management');
    }
}
