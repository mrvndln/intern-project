<div wire:cloak class="bg-white rounded-lg p-10 w-[45rem] h-[30rem]">
    <x-title>Edit Role</x-title>
    <button wire:click="$dispatch('open-add-permissions')" class="ml-auto mb-4 w-sm flex items-center justify-center px-4 py-2 h-sm text-sm text-white bg-blue-500 hover:bg-blue-600 rounded-full transition-colors">Parent Access</button>
    <div class="flex mb-2">
        <input wire:model="searchData" wire:keydown="searchModule" name="query" type="search"
            class="border-2 w-full rounded-md h-9 shadow-sm px-3 mr-2 @error('name') border-red-500 @enderror"
            placeholder="Search Module" autocomplete="off">
    </div>

    <div class="flex justify-center items-center flex-col h-[16rem]">
        <div class="font-bold text-2xl font-mono"></div>

        <div class="overflow-auto mb-auto w-full">
            <table class="min-w-full border">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border">Modules</th>
                        <th class="py-2 px-4 border">Module Access</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($modules as $module)
                    <tr>
                        <td class="py-2 px-4 border">{{ $module->module_name }}</td>
                        <td class="py-2 px-4 border">{{ $module->access_module_name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    <div class="w-full flex justify-end mt-auto">
    <button class="ml-auto  w-sm px-4 py-2 h-sm text-sm text-white bg-red-500 hover:bg-red-600 rounded-full transition-colors" wire:click="$dispatch('closeModal')">Close</button>
    </div>
   
</div>