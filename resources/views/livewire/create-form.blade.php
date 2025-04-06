<div class="container mx-auto p-4">
    
    <button 
        wire:click="showForm" 
        class="mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
    >
        Add New User
    </button>

    
    <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border">Name</th>
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
                    <td class="py-2 px-4 border">{{ $user->contact }}</td>
                    <td class="py-2 px-4 border">{{ $user->email }}</td>
                    <td class="py-2 px-4 border">{{ $user->address }}</td>
                    <td class="py-2 px-4 border">{{ $user->birthdate }}</td>
                    <td class="py-2 px-4 border">{{ $user->username }}</td>
                    <td class="py-2 px-4 border">
                        <button wire:click="editUser({{ $user->id }})" class="text-blue-500 hover:text-blue-700">Edit</button>
                        <button wire:click="deleteUser({{ $user->id }})" wire:confirm="Are you sure you want to delete this user?"  class="text-red-500 hover:text-red-700 ml-2">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    @if($showModal)
    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold">{{ $editMode ? 'Edit User' : 'Add User' }}</h3>
                <button wire:click="hideForm" class="text-gray-500 hover:text-gray-700">&times;</button>
            </div>
            
        
            <form wire:submit.prevent="{{ $editMode ? 'updateUser' : 'addUser' }}">
                @csrf
                <div class="flex flex-col mt-4">
                    <label>First Name*</label>
                    <input wire:model="name" type="text" class="border-2 w-full rounded-md h-9 shadow-sm" placeholder="Enter name">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                
                <div class="flex flex-col mt-4">
                    <label>Contact Number*</label>
                    <input wire:model="contact" type="text" class="border-2 w-full rounded-md h-9 shadow-sm" placeholder="Enter contact number">
                    @error('contact') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                
                <div class="flex flex-col mt-4">
                    <label>Email</label>
                    <input wire:model="email" type="email" class="border-2 w-full rounded-md h-9 shadow-sm" placeholder="Enter email">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                
                <div class="flex flex-col mt-4">
                    <label>Address*</label>
                    <input wire:model="address" type="text" class="border-2 w-full rounded-md h-9 shadow-sm" placeholder="Enter address">
                    @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                
                <div class="flex flex-col mt-4">
                    <label>Birthdate*</label>
                    <input wire:model="birthdate" type="date" class="border-2 w-full rounded-md h-9 shadow-sm">
                    @error('birthdate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                
                <div class="flex flex-col mt-4">
                    <label>Username*</label>
                    <input wire:model="username" type="text" class="border-2 w-full rounded-md h-9 shadow-sm" placeholder="Enter username">
                    @error('username') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                
                <div class="flex flex-col mt-4">
                    <label>Password{{ $editMode ? ' (Leave blank to keep current)' : '*' }}</label>
                    <input wire:model="password" type="password" class="border-2 w-full rounded-md h-9 shadow-sm" placeholder="Enter password">
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                
                <div class="flex justify-end mt-4 space-x-2">
                    <button 
                        type="button" 
                        wire:click="hideForm" 
                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400"
                    >
                        Cancel
                    </button>
                    <button 
                        type="submit" 
                        class="px-4 py-2 bg-amber-300 rounded hover:bg-amber-200"
                    >
                        {{ $editMode ? 'Update' : 'Submit' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>