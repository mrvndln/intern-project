<div wire:cloak class="bg-white rounded-lg p-10 w-[45rem] h-[20rem]">
    <div class="mb-2 flex justify-center items-center flex-col">
        <div class="font-bold text-2xl mb-4 font-mono">Access Control</div>
        <div class="w-full">
            <div class="h-[10rem]">
                <input wire:model="moduleName" wire:keydown="suggestModule" name="query" type="search"
                    class="border-2 w-full rounded-md h-9 shadow-sm px-3 @error('name') border-red-500 @enderror"
                    placeholder="Search" autocomplete="off">

                        @if($suggestions !== null && $moduleName !== '')
                            @foreach($suggestions as $suggestion)
                                 <div wire:click="" class="px-3 mt-1">{{ $suggestion->module_name }}</div> 
                            @endforeach
                        @endif

            </div>

            <div class="flex justify-end space-x-3">
                <button wire:click="$dispatch('closeModal')" type="button" value="cancel" class="px-4 py-2 bg-gray-200 rounded-md hover:bg-gray-300 transition-colors text-center">
                    Cancel
                </button>
                <button type="button" wire:click="updateOrSave" class="px-4 py-2 bg-amber-400 rounded-md hover:bg-amber-300 transition-colors">
                    Save
                </button>
            </div>
        </div>
    </div>

</div>