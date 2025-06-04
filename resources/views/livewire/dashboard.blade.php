<div class="flex h-screen overflow-hidden"
    x-data="{
    show: @entangle('show'),
    activeView: @entangle('activeView')
}">
    <!-- Sidebar Navigation -->
    <div class="hidden md:flex md:flex-shrink-0">
        <div class="flex flex-col w-64 bg-white border-r border-gray-200">
            <div class="flex items-center h-16 px-4 border-b border-gray-200">
                <span class="text-lg font-semibold text-gray-800">User Management</span>
            </div>
            <div class="flex-1 overflow-y-auto">
                <nav class="px-2 py-4">
                    <!-- Dashboard Link -->
                    <a href="#"  wire:click="$set('activeView','dashboard')" class="flex items-center px-4 py-2 text-gray-700 bg-gray-100 rounded-lg">
                        <i class="fas fa-tachometer-alt mr-3 text-gray-500"></i>
                        Dashboard
                    </a>

                    <!-- User Management Links -->
                    <a href="#" wire:click="$set('activeView','staffList')" class="flex items-center px-4 py-2 mt-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-users mr-3 text-gray-500"></i>
                        Users
                    </a>
                    <!-- Other Management Links -->
                     @can('settings')
                    <a href="#" class="flex items-center px-4 py-2 mt-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-cog mr-3 text-gray-500"></i>
                        Settings
                    </a>
                    @endcan
                </nav>
            </div>

            <!-- User Profile & Logout -->
            <div class="p-4 border-t border-gray-200">
                <!-- <div class="flex items-center mb-3">
                    <img class="w-8 h-8 rounded-full" src="" alt="Admin">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700">Admin</p>
                        <p class="text-xs text-gray-500">admin@example.com</p>
                    </div>
                </div> -->
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
            <div x-show="activeView === 'dashboard'">
                <div class="max-w-sm p-4 bg-white rounded-2xl shadow-md flex items-center gap-4">
                    <div class="bg-blue-100 text-blue-600 p-3 rounded-full">
                        <!-- User icon (Heroicons or Lucide) -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A9 9 0 0112 15c2.485 0 4.735.998 6.379 2.621M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm text-gray-500">Users</h4>
                        <p class="text-2xl font-bold text-gray-800">1,234</p>
                        <p class="text-sm text-green-600 mt-1">+8% this week</p>
                    </div>
                </div>

            </div>
            <div x-show="activeView === 'staffList'" class="bg-white rounded-lg">
                <livewire:staff-list />
            </div>
            <div x-show="activeView === 'accessControl'" class="flex justify-center bg-white rounded-lg shadow p-2">
                <livewire:access-control />
            </div>
            <div x-show="activeView === 'manageRoles'" class="p-2">
                <livewire:manage-roles />
            </div>
            <div x-show="activeView === 'rolePermissions'" class="p-2">
                <livewire:role-permissions />
            </div>


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