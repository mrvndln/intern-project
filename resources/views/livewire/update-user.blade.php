<div wire:cloak class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg p-10 w-[45rem]">
        <div class="mb-2 flex justify-center">
            <div class="font-bold text-2xl font-mono">Update User</div>
        </div>
        <form wire:submit.prevent="updateUser" class="h-[27rem]">
            <!-- Row 1: Full width -->
            <div class="grid grid-cols-2 gap-4 h-[6rem]">
                <div class="flex flex-col">
                    <label for="name">Full Name*</label>
                    <input wire:model.blur="name" name="name" type="text"
                        class="border-2 w-full rounded-md h-9 shadow-sm px-3 @error('name') border-red-500 @enderror"
                        placeholder="Enter full name">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col">
                    <label for="role">Role*</label>
                    <select wire:model.blur="role_id" name="role"
                        class="border-2 w-full rounded-md h-9 shadow-sm px-3 @error('role') border-red-500 @enderror">
                        <option value="role_id">{{ $current_role }}</option>
                        @foreach( $roles as $role)
                         <option value="{{ $role->id }}">{{ $role->role }}</option>
                        @endforeach
                    </select>
                    @error('role') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Row 2: Two columns -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 h-[6rem]">
                <div class="flex flex-col">
                    <label for="email">Email</label>
                    <input wire:model="email" name="email" type="email"
                        class="border-2 w-full rounded-md h-9 shadow-sm px-3 @error('email') border-red-500 @enderror"
                        placeholder="Enter email">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="flex flex-col">
                    <label for="contact">Contact Number*</label>
                    <input wire:model="contact" name="contact" type="tel"
                        class="border-2 w-full rounded-md h-9 shadow-sm px-3 @error('contact') border-red-500 @enderror"
                        placeholder="Enter phone number">
                    @error('contact') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Row 3: Two columns -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 h-[6rem]">
                <div class="flex flex-col">
                    <label for="address">Address*</label>
                    <input wire:model="address" name="address" type="text"
                        class="border-2 w-full rounded-md h-9 shadow-sm px-3 @error('address') border-red-500 @enderror"
                        placeholder="Enter address">
                    @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="flex flex-col">
                    <label for="birthdate">Birthdate*</label>
                    <input wire:model="birthdate" name="birthdate" type="date"
                        class="border-2 w-full rounded-md h-9 shadow-sm px-3 @error('birthdate') border-red-500 @enderror">
                    @error('birthdate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Row 4: Two columns -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div class="flex flex-col">
                    <label for="username">Username*</label>
                    <input wire:model="username" name="username" type="text"
                        class="border-2 w-full rounded-md h-9 shadow-sm px-3 @error('username') border-red-500 @enderror"
                        placeholder="Choose username">
                    @error('username') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="flex flex-col">
                    <label for="password">Password (Leave this blank if needed)</label>
                    <input wire:model="" name="password" type="password"
                        class="border-2 w-full rounded-md h-9 shadow-sm px-3 @error('password') border-red-500 @enderror"
                        placeholder="Create password">
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Form Buttons -->
            <div class="flex justify-end space-x-3">
                <button wire:click="$dispatch('closeModal')" type="button" value="cancel" class="px-4 py-2 bg-gray-200 rounded-md hover:bg-gray-300 transition-colors text-center">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 bg-amber-400 rounded-md hover:bg-amber-300 transition-colors">
                    Update User
                </button>
            </div>
        </form>
    </div>
</div>