<div wire:cloak id="addUserForm">
  <form wire:submit.prevent="addUser" class="relative px-4 py-6 space-y-6">

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-12">
      <div class="flex flex-col relative">
        <x-input wire:model.blur="name" label="Name" name="name" />
        <x-input-error for="name" />
      </div>  

      <div class="flex flex-col relative">
        <x-select wire:model.blur="role_id" name="role" label="Role">
          <option value="" hidden selected>-- Assign a Role --</option>
          @foreach($roles as $role)
          <option value="{{ $role->id }}">{{ $role->role }}</option>
          @endforeach
        </x-select>
        <x-input-error for="role_id" />
      </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-12">
      <div class="flex flex-col relative">
        <x-input wire:model.blur="email" label="Email" name="email" />
        <x-input-error for="email" />
      </div>

      <div class="flex flex-col relative">
        <x-input wire:model.blur="contact" label="Contact" name="contact" type="tel" />
        <x-input-error for="contact" />
      </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-12">
      <div class="flex flex-col relative">
        <x-input  wire:model.blur="address" label="Address" name="address" />
        <x-input-error for="address" />
      </div>

      <div class="flex flex-col relative">
        <x-input  wire:model.blur="birthdate" label="Birthdate" name="birthdate" type="date" />
        <x-input-error for="birthdate" />
      </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-12">
      <div class="flex flex-col relative">
        <x-input  wire:model.blur="username" label="Username" name="username" />
        <x-input-error for="username" />
      </div>

      <div class="flex flex-col relative">
        <x-input wire:model.blur="password" label="Password" name="password" type="password" />
        <x-input-error for="password" />
      </div>
    </div>

   
    <div class="flex flex-col sm:flex-row justify-end items-end gap-3 pt-6">
      <x-button wire:click="addUser" class="px-4">
        <x-slot:title>
          Save
        </x-slot>
      </x-button>
    </div>
  </form>

  <x-loading target="addUser" />
</div>
