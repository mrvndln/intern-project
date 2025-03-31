
<div class=" max-w-md bg-white shadow-md mt-4 rounded-md">
        <div class="text-center font-bold text-lg mt-8">Add User</div>
       
        <div class="mb-6">
            <form wire:submit="addUser" class="px-6">
                @csrf
                <div class="flex flex-col mt-4 ">
                    <label >First Name*</label>
                    <input wire:model="name" wire:model="" type="text" class="border-2 w-96 rounded-md h-9 shadow-sm" placeholder="Enter name">
                </div>
                <div class="flex flex-col mt-4 ">
                    <label>Contact Number*</label>
                    <input wire:model="contact" type="text" class="border-2 w-96 rounded-md h-9 shadow-sm" placeholder="Enter contact number">
                </div>
                <div class="flex flex-col mt-4 ">
                    <label>Email</label>
                    <input wire:model="email" type="email" class="border-2 w-96 rounded-md h-9 shadow-sm" placeholder="Enter email">
                </div>
                <div class="flex flex-col mt-4 ">
                    <label>Address*</label>
                    <input wire:model="address" type="text" class="border-2 w-96 rounded-md h-9 shadow-sm" placeholder="Enter address">
                </div>
                <div class="flex flex-col mt-4 ">
                    <label>Birthdate*</label>
                    <input wire:model="birthdate" type="date" class="border-2 w-96 rounded-md h-9 shadow-sm" placeholder="Enter birthdate">
                </div>
                <div class="flex flex-col mt-4 ">
                    <label>Username*</label>
                    <input wire:model="username" type="text" class="border-2 w-96 rounded-md h-9 shadow-sm" placeholder="Enter username">
                    @error('username') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="flex flex-col mt-4 ">
                    <label>Password*</label>
                    <input wire:model="password" type="password" class="border-2 w-96 rounded-md h-9 shadow-sm" placeholder="Enter password">
                </div>
                <div class="flex justify-center mt-4">
                    <button type="submit" class="rounded-md bg-amber-300 h-9 shadow-sm px-12 font-semibold hover:bg-amber-200">Submit</button>
                </div>
            </form>
        </div>
    </div> 