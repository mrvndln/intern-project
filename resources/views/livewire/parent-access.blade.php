<div wire:cloak class="bg-white rounded-lg p-10 w-[45rem] h-[20rem] z-40">
    <div class="mb-2 flex justify-center items-center flex-col">
        <div class="font-bold text-lg mb-4 mr-auto font-mono">Add Permission</div>
        <div class="w-full">
            <div class="h-[10rem]">
                <input wire:model="moduleName" wire:keydown="suggestModule" id="search" name="search" type="search"
                    class="border-2 w-full rounded-md h-9 shadow-sm px-3 @error('moduleName') border-red-500 @enderror"
                    placeholder="Search" autocomplete="off">
                   @error('moduleName')
                    <p class="text-red-500 text-sm">Enter a module.</p>
                   @enderror


                @if($suggestions !== null && $moduleName !== '')
                @foreach($suggestions as $suggestion)
                <div wire:click="searchField('{{ $suggestion->module_name }}')" class="px-3 mt-1 hover:bg-gray-100">{{ $suggestion->module_name }}</div>
                @endforeach
                @endif

            </div>

            <div class="flex justify-end space-x-3">
                <x-button @click="$dispatch('close-add-permissions')" class="px-4">
                    <x-slot:title>
                        Cancel
                        </x-slot>
                </x-button>
                <x-button wire:click="updateOrSave" class="px-4">
                    <x-slot:title>
                        Save
                        </x-slot>
                </x-button>
            </div>
        </div>
    </div>

</div>