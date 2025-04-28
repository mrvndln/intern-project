<div class="w-80">
    <input wire:model="searchInput" wire:keydown="search" name="query" type="search"
        class="border-2 w-full rounded-md h-9 shadow-sm px-3 @error('name') border-red-500 @enderror"
        placeholder="Search">
    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
</div>