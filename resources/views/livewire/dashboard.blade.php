<div class="flex h-screen overflow-hidden">
    <!-- Sidebar Navigation -->
    <div class="hidden md:flex md:flex-shrink-0">
        <div class="flex flex-col w-64 bg-white border-r border-gray-200">
            <div class="flex items-center h-16 px-4 border-b border-gray-200">
                <span class="text-lg font-semibold text-gray-800">User Management</span>
            </div>
            <div class="flex-1 overflow-y-auto">
                <nav class="px-2 py-4">
                    <!-- Dashboard Link -->
                    <a href="#" class="flex items-center px-4 py-2 text-gray-700 bg-gray-100 rounded-lg">
                        <i class="fas fa-tachometer-alt mr-3 text-gray-500"></i>
                        Dashboard
                    </a>

                    <!-- User Management Links -->
                    <a href="#" @click="activeView = 'staffList'" class="flex items-center px-4 py-2 mt-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-users mr-3 text-gray-500"></i>
                        Users
                    </a>
                    <a href="#" class="flex items-center px-4 py-2 mt-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-user-shield mr-3 text-gray-500"></i>
                        Roles & Permissions
                    </a>

                    <!-- Other Management Links -->
                    <a href="#" class="flex items-center px-4 py-2 mt-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-cog mr-3 text-gray-500"></i>
                        Settings
                    </a>
                </nav>
            </div>

            <!-- User Profile & Logout -->
            <div class="p-4 border-t border-gray-200">
                <div class="flex items-center mb-3">
                    <img class="w-8 h-8 rounded-full" src="https://randomuser.me/api/portraits/women/11.jpg" alt="Admin">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700">Admin</p>
                        <p class="text-xs text-gray-500">admin@example.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="flex-1 overflow-auto">
        <!-- Top Header -->
        <header class="bg-white shadow-sm">
            <div class="flex items-center justify-between px-4 py-3 sm:px-6">
                <!-- Mobile menu button -->
                <button class="md:hidden p-2 rounded-md text-gray-500 hover:bg-gray-100 focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Page title - will change based on view -->
                <h1 class="text-lg font-medium text-gray-800 ml-2">Dashboard</h1>

                <!-- User controls -->
                <div class="flex items-center space-x-4">
                    <livewire:logout-user>
                        <!-- Mobile logout (hidden on desktop) -->
                        <button class="md:hidden p-2 rounded-full text-gray-500 hover:bg-gray-100 focus:outline-none">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-4 sm:p-6">
            <!-- This is where your content will go -->
            <div x-show="activeView === 'staffList' " class="bg-white rounded-lg">
                <livewire:staff-list>
            </div>
            <div x-show=" activeView==='addUser'" class=" bg-white rounded-lg shadow p-6">
                <livewire:add-user>
            </div>

            @if($showModal)
            <div  wire:cloak class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
                <div class="bg-white rounded-lg p-10 w-[45rem]">
                    <div class="mb-2 flex justify-center">
                        <div class="font-bold text-2xl font-mono">Update User</div>
                    </div>
                    <form wire:submit.prevent="updateUser" class="h-[27rem]">
                        <!-- Row 1: Full width -->
                        <div class="grid grid-cols-1 gap-4 h-[6rem]">
                            <div class="flex flex-col">
                                <label for="name">Full Name*</label>
                                <input wire:model="name" name="name" type="text"
                                    class="border-2 w-full rounded-md h-9 shadow-sm px-3 @error('name') border-red-500 @enderror"
                                    placeholder="Enter full name">
                                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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
                            <button wire:click="hideForm" type="button" value="cancel" class="px-4 py-2 bg-gray-200 rounded-md hover:bg-gray-300 transition-colors text-center">
                                Cancel
                            </button>
                            <button type="submit" class="px-4 py-2 bg-amber-400 rounded-md hover:bg-amber-300 transition-colors">
                                Update User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @endif


            <!-- <div class="bg-white rounded-lg shadow p-6">
                    <div class="text-center py-12">
                        <i class="fas fa-users text-4xl text-gray-300 mb-4"></i>
                        <h2 class="text-lg font-medium text-gray-700">User Management Dashboard</h2>
                        <p class="mt-2 text-gray-500">Select an option from the sidebar to begin</p>
                    </div>
                </div> -->
        </main>
    </div>
</div>