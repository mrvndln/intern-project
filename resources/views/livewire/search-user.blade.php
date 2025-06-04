<div class="w-80">
    <input wire:model="searchInput" wire:keydown="search" name="query" type="search"
        class="border-2 w-full rounded-md h-9 shadow-sm px-3 focus:outline-gray-300 @error('name') border-red-500 @enderror"
        placeholder="Search">
</div>