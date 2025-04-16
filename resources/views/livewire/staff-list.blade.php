<div wire:cloak>
    <div wire:click="$dispatch('openModal',{component: 'add-user', params: []})" class="flex justify-end p-2">
        <button class="w-sm flex items-center justify-center px-4 py-2 text-sm text-white bg-green-500 hover:bg-green-600 rounded-lg transition-colors"><i class="fas fa-user-plus mr-3 text-gray-100"></i>Add Users</button>
    </div>
    
    <table class="min-w-full border">
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
            @foreach($users as $user)
            <tr>
                <td class="py-2 px-4 border">{{ $user->name }}</td>
                <td class="py-2 px-4 border">
                    @foreach($user->roles as $role)
                        {{ $role->role }}{{ !$loop->last ? ', ' : '' }}
                    @endforeach
                </td>
                <td class="py-2 px-4 border">{{ $user->user_detail->contact }}</td>
                <td class="py-2 px-4 border">{{ $user->email }}</td>
                <td class="py-2 px-4 border">{{ $user->user_detail->address }}</td>
                <td class="py-2 px-4 border">{{ $user->user_detail->birthdate }}</td>
                <td class="py-2 px-4 border">{{ $user->username }}</td>
                <td class="py-2 px-4 border">
                    <button wire:click="$dispatch('openModal',{component: 'update-user', params: { id: {{ $user->id }} } })" class="text-blue-500 hover:text-blue-700">Edit</button>
                        <button wire:click="triggerDelete({{ $user->id }})" type="button" class="text-red-500 hover:text-red-700 ml-2">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>