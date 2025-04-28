<div wire:cloak>
    <table class="min-w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border">Roles</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
            <tr>
                <td class="py-2 px-4 border">{{ $role->role }}</td>
                <td class="py-2 px-4 border">
                    <button wire:click="$dispatch('openModal', { component: 'edit-role', params: [] })" class="text-blue-500 hover:text-blue-700"> <i class="fa fa-edit"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>