<div wire:cloak id="updatePatientForm">
  <form wire:submit.prevent="updatePatient" class="relative px-4 py-6 space-y-6">

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-12">
      <div class="flex flex-col relative">
        <x-input wire:model="patient_name" label="Name" name="name" />
        <x-input-error for="patient_name" />
      </div>   

      <div class="flex flex-col relative">
        <x-input wire:model="patient_gender" label="Gender" name="gender" />
        <x-input-error for="patient_gender" />
      </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-12">
      <div class="flex flex-col relative">
        <x-input wire:model="patient_email" label="Email" name="email" />
        <x-input-error for="patient_email" />
      </div>

      <div class="flex flex-col relative">
        <x-input wire:model="patient_contact" label="Contact" name="contact_number" type="tel" />
        <x-input-error for="patient_contact" />
      </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-12">
      <div class="flex flex-col relative">
        <x-input wire:model="patient_address" label="Address" name="address" />
        <x-input-error for="patient_address" />
      </div>

      <div class="flex flex-col relative">
        <x-input wire:model="patient_birthdate" label="Birthdate" name="birthdate" type="date" />
        <x-input-error for="patient_birthdate" />
      </div>
    </div>

    <div class="flex flex-col sm:flex-row justify-end items-end gap-3 pt-6">
      <x-button wire:click="updatePatient" class="px-4">
        <x-slot:title>
            Update
        </x-slot:title>
      </x-button>
    </div>
  </form>

  <x-loading target="updatePatient" />
</div>
