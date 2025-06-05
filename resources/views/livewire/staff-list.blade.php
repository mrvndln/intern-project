<div wire:cloak>
    <div class="flex items-center w-full p-2">
         <x-search  wire:model="searchInput" wire:keydown="search" name="query" type="search"
        class="border-2 w-full rounded-md h-9 shadow-sm px-3 focus:outline-gray-300"
        placeholder="Search" />

            <div class="flex justify-end w-full gap-1">
                @can('manage-roles')
                    <button @click="$dispatch('manage_roles', { value: 'manageRoles' })" class="w-sm flex items-center justify-center px-4 py-2 text-sm text-white bg-blue-500 hover:bg-blue-600 rounded-md transition-colors"><i class="fas fa-user-gear mr-3 text-gray-100"></i>Manage Roles</button>
                @endcan
                <button @click="$dispatch('create_modal')" class="w-sm flex items-center justify-center px-4 py-2 text-sm text-white bg-green-500 hover:bg-green-600 rounded-md transition-colors"><i class="fas fa-user-plus mr-3 text-gray-100"></i>Add User</button>
            </div>
    </div>  

    <table class="min-w-full border text-[15px]">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border">Name</th>
                <th class="py-2 px-4 border">Role</th>
                <th class="py-2 px-4 border">Contact</th>
                <th class="py-2 px-4 border">Email</th>
                <th class="py-2 px-4 border">Address</th>
                <th class="py-2 px-4 border">Birthdate</th>
                <th class="py-2 px-4 border">Username</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td class="py-2 px-4 border">{{ $user->name }}</td>
                <td class="py-2 px-4 border">{{ $user->role }}</td>
                <td class="py-2 px-4 border">{{ $user->contact }}</td>
                <td class="py-2 px-4 border">{{ $user->email }}</td>
                <td class="py-2 px-4 border">{{ $user->address }}</td>
                <td class="py-2 px-4 border">{{ $user->birthdate }}</td>
                <td class="py-2 px-4 border">{{ $user->username }}</td>
                <td class="py-2 px-4 border">
                    <button wire:click="$dispatch('edit_modal',{ params: { id: {{ $user->id }} } })" class="text-blue-500 hover:text-blue-700"> <i class="fa fa-edit"></i></button>
                    <button wire:click="triggerDelete({{ $user->id }})" type="button" class="text-red-500 hover:text-red-700 ml-2"> <i class="fa fa-trash"></i></button>
                </td>
            </tr>
            @empty
            <tr>
                <td>NO RESULT</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <x-loading target="deleteUser"/>
</div>