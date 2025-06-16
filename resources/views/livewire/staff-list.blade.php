<div wire:cloak class="space-y-4">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 p-2">
        <x-search wire:model="searchInput" wire:keydown="searchUser" name="query" type="search"
            class="border w-full rounded-md h-10 px-4 shadow-sm focus:outline-none focus:ring-1 focus:ring-gray-300"
            placeholder="Search user..." />

        <div class="flex justify-end gap-2">
            @can('manage-roles')
                <button @click="$dispatch('manage_roles', { value: 'manageRoles' })"
                    class="flex items-center px-4 py-2 text-sm text-white bg-blue-500 hover:bg-blue-600 rounded-md transition">
                    <i class="fas fa-user-gear mr-2"></i>Manage Roles
                </button>
            @endcan

            <button @click="$dispatch('create_modal')"
                class="flex items-center px-4 py-2 text-sm text-white bg-green-500 hover:bg-green-600 rounded-md transition">
                <i class="fas fa-user-plus mr-2"></i>Add User
            </button>
        </div>
    </div>

    <div class="overflow-auto rounded-md border border-gray-300">
    <table class="min-w-full text-gray-800 text-sm">
        <thead class="bg-gray-200 text-left">
            <tr>
                <th class="py-2 px-4">Name</th>
                <th class="py-2 px-4">Role</th>
                <th class="py-2 px-4">Contact</th>
                <th class="py-2 px-4">Email</th>
                <th class="py-2 px-4">Address</th>
                <th class="py-2 px-4">Birthdate</th>
                <th class="py-2 px-4">Username</th>
                <th class="py-2 px-4 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-2 px-4">{{ $user->name ?? '-' }}</td>
                    <td class="py-2 px-4">{{ $user->role ?? '-' }}</td>
                    <td class="py-2 px-4">{{ $user->contact ?? '-' }}</td>
                    <td class="py-2 px-4">{{ $user->email ?? '-' }}</td>
                    <td class="py-2 px-4">{{ $user->address ?? '-' }}</td>
                    <td class="py-2 px-4">{{ $user->birthdate ?? '-' }}</td>
                    <td class="py-2 px-4">{{ $user->username ?? '-' }}</td>
                    <td class="py-2 px-4  text-center">
                        <button wire:click="$dispatch('edit_modal', { params: { id: {{ $user->id }} } })"
                            class="text-blue-500 hover:text-blue-700 transition">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button wire:click="triggerDelete({{ $user->id }})" type="button"
                            class="text-red-500 hover:text-red-700 transition">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center py-4 text-gray-500">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

    <x-loading target="deleteUser" />
</div>
