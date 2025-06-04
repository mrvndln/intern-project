<div x-data="{ 
               show:         @entangle('show'),
               addPermissions: @entangle('addPermissions'),
               create_modal: @entangle('create_modal'),
               edit_modal:   @entangle('edit_modal')
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

    <x-modal id="edit_modal">
        <x-slot name="title">Update User</x-slot>
        <x-slot name="body">
            @if($params)
                @livewire('update-user', $params)
            @endif
        </x-slot>
    </x-modal>
</div>