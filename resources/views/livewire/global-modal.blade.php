<div x-data="{ 
               show:         @entangle('show'),
               addPermissions: @entangle('addPermissions'),
               create_modal: @entangle('create_modal'),
               edit_modal:   @entangle('edit_modal'),
               editPatient_modal:   @entangle('editPatient_modal'),
               add_patient: @entangle('add_patient')
}">


    <div x-show="show" class="fixed inset-0 bg-black/50 flex justify-center items-center">
        @if($component)
            @livewire($component, $params)
        @endif
    </div>

    <div x-show="addPermissions" class="fixed inset-0 bg-black/50 flex justify-center items-center">
        @if($addPermissions)
            @livewire('parent-access', $params) 
        @endif
    </div>
    
    <x-modal id="create_modal">
        <x-slot name="title">Add User</x-slot>
        <x-slot name="body">
            @livewire('add-user')
        </x-slot>
    </x-modal>

    <x-modal id="add_patient">
        <x-slot name="title">Add Patient</x-slot>
        <x-slot name="body">
            @livewire('add-patient')
        </x-slot>
    </x-modal>

    <x-modal id="edit_modal">
    <x-slot name="title">Update User</x-slot>
    <x-slot name="body">
        @if($params)
            @livewire('update-user', $params, key('update-user-' . ($params['id'] ?? uniqid())))
        @endif
    </x-slot>
</x-modal>

<x-modal id="editPatient_modal">
    <x-slot name="title">Update Patient</x-slot>
    <x-slot name="body">
        @if($params)
            @livewire('update-patient', $params, key('update-patient-' . ($params['id'] ?? uniqid())))
        @endif
    </x-slot>
</x-modal>


    
</div>