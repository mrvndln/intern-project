<div wire:cloak class="bg-white rounded-lg p-10 w-[45rem] h-[30rem]">

    <button wire:click="$dispatch('openModal', { component: 'parent-access', params: [] })" class="ml-auto mb-4 w-sm flex items-center justify-center px-4 py-2 h-sm text-sm text-white bg-blue-500 hover:bg-blue-600 rounded-full transition-colors">Parent Acess</button>
    <div class="flex">
        <input wire:model="searchData" wire:keydown="searchModule" name="query" type="search"
            class="border-2 w-full rounded-md h-9 shadow-sm px-3 mr-2 @error('name') border-red-500 @enderror"
            placeholder="Search Module" autocomplete="off">
        <select wire:model.blur="role_id" name="role"
            class="border-2 w-full rounded-md h-9 shadow-sm px-3 @error('role') border-red-500 @enderror">
            <option value="">User Type</option>
            @foreach($roles as $role)
            <option value="{{ $role->id }}">{{ $role->role }}</option>
            @endforeach
        </select>
        @error('role_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>





    <div class="mb-2 flex justify-center items-center flex-col">
        <div class="font-bold text-2xl mb-4 font-mono"></div>

        <div class="overflow-auto w-full">
            <table class="min-w-full border">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border">Modules</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($modules as $module)
                    <tr>
                        <td class="py-2 px-4 border">{{ $module->module_name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>


    </div>

</div>