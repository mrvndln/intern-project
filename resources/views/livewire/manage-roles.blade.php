<div wire:cloak>
        
        <h1 class="text-2xl font-extrabold mb-4">User / Roles</h1>
        <div class="flex w-ful">
                <x-search wire:model="searchInput" wire:keydown="search" name="query" type="search"
                        class="border-2 w-full rounded-md h-9 px-3 focus:outline-gray-300"
                        placeholder="Search" />
                <x-button class="px-4 ml-auto">
                     <x-slot:title>
                           Add Role
                     </x-slot>
                </x-button>
        </div>

        <div class="w-full bg-white rounded-md shadow mt-4">
                @forelse( $roles as $role )
                <p wire:click="$dispatch('role_permissions', { value: 'rolePermissions', role: '{{ $role->role }}', roleId: {{ $role->id }} })" class="shadow-sm font-medium py-2 hover:bg-blue-50">
                        <span class="mr-4 ml-2">{{ $role->id }}</span>{{ $role->role }}
                </p>
                @empty
                <p class="shadow-sm font-medium py-2 px-4">No Result</p>
                @endforelse
        </div>
</div>