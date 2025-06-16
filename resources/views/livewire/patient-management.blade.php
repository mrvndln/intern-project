<div wire:cloak class="space-y-4">

    {{-- Search and Add Patient Button --}}
    <div class="flex flex-col sm:flex-row items-center justify-between gap-2 p-2">
        <x-search 
            wire:model="searchInput" 
            wire:keydown="searchPatient"
            name="query" 
            type="search"
            class="border-2 w-full sm:max-w-xs rounded-md h-9 shadow-sm px-3 focus:outline-gray-300"
            placeholder="Search patient..."
        />

        <button 
            @click="$dispatch('addPatient_modal')" 
            class="flex items-center px-4 py-2 text-sm text-white bg-green-500 hover:bg-green-600 rounded-md transition-colors"
        >
            <i class="fas fa-user-plus mr-2"></i> Add Patient
        </button>
    </div>

    {{-- Patient Table --}}
    <div class="overflow-auto rounded-md border border-gray-300">
        <table class="min-w-full text-gray-800 text-sm">
            <thead class="bg-gray-200 text-left">
                <tr>
                    <th class="py-2 px-4">Name</th>
                    <th class="py-2 px-4">Gender</th>
                    <th class="py-2 px-4">Birthdate</th>
                    <th class="py-2 px-4">Contact</th>
                    <th class="py-2 px-4">Email</th>
                    <th class="py-2 px-4">Address</th>
                    <th class="py-2 px-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($patients as $patient)
                    <tr class=" border-b hover:bg-gray-50">
                        <td class="py-2 px-4">{{ $patient->name ?? '-' }}</td>
                        <td class="py-2 px-4 capitalize">{{ $patient->gender ?? '-' }}</td>
                        <td class="py-2 px-4">{{ $patient->birth_date ?? '-' }}</td>
                        <td class="py-2 px-4">{{ $patient->contact_number ?? '-' }}</td>
                        <td class="py-2 px-4">{{ $patient->email ?? '-' }}</td>
                        <td class="py-2 px-4">{{ $patient->address ?? '-' }}</td>
                        <td class="py-2 px-4 text-center">
                        <button wire:click="$dispatch('editPatient_modal', { params: { patient_id: {{ $patient->id }} } })"
                                class="text-blue-500 hover:text-blue-700 transition">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button wire:click="triggerPatientDelete({{ $patient->id }})" type="button"
                                class="text-red-500 hover:text-red-700 transition">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-4 text-gray-500">No patients found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <x-loading target="confirmDelete" />

</div>
