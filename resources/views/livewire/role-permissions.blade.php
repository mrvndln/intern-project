    <div  class="text-gray-800" x-data="{
        isHidden: @entangle('isHidden'),
        editButton: @entangle('editing'),
    }"
    >
        <div class="flex items-center w-full mb-4">
            <h1 class="text-2xl text-gray-800 font-extrabold">Role / <span class="text-blue-600">{{ $selectedRole ?? ''}}</span></h1>
            <x-button class="px-4 ml-auto" @click="$dispatch('manage_roles', { value: 'manageRoles' })">
                <x-slot:title>
                    Edit Role
                    </x-slot>
            </x-button>
        </div>
        <h1 class="text-xl text-gray-800 font-semibold">Permissions</h1>
        <p class="mb-2 text-gray-800">Assign permissions to roles to give them access to modules.</p>
        <div class="flex justify-between">
            <div x-show="editButton">
                <x-button  @click="$wire.editing=false; $wire.isHidden=true;" class="px-4">
                    <x-slot:title>
                        Edit Permissions
                        </x-slot>
                </x-button>
            </div>

            <div x-show="isHidden"  class="flex space-x-2 w-full">
                <x-button wire:click="save" class="px-4 mr-auto">
                    <x-slot:title>
                        Save
                        </x-slot>
                </x-button>

                <x-button @click="$dispatch('open-add-permissions')" class="px-4">
                    <x-slot:title>
                        Add
                        </x-slot>
                </x-button>
                <x-button @click="$wire.cancelEditing()"
                    class="px-4">
                    <x-slot:title>
                        Cancel
                        </x-slot>
                </x-button>
            </div>
        </div>
        <div class="mt-2">
            <x-search wire:model="moduleSearch" wire:keydown="showModules" name="query" type="search"
                class="border-2 w-full rounded-md h-9 shadow-sm px-3 focus:outline-gray-300"
                placeholder="Search" />
        </div>
        <div class="bg-white flex flex-col shadow-sm mt-2 font-medium py-2 px-4">
            @forelse( $moduleResults as $module )
            <div  wire:key="{{ $module->id }}" class="flex items-center mb-4">
                <label class="font-medium">
                    <input x-bind:disabled="editButton" wire:model="selectedPermissions" value="{{ $module->id }}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    {{ $module->module_name }}
                </label>
            </div>
            @empty
            <p class="font-medium py-2 px-4">No Result</p>
            @endforelse

        </div>
    </div>