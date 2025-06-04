<div wire:cloak id="updateUserForm">
  <form wire:submit.prevent="updateUser" class="relative px-4 py-6 space-y-6">

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-12">
      <div  class="flex flex-col relative">

        <x-input wire:model="name" label="Name" name="name" />
        <x-input-error for="name" />
      </div>   

      <div class="flex flex-col relative">
        <x-select wire:model="role_id" name="role" label="Role">
          <option value="{{ $role_id }}" hidden selected>{{ $current_role }}</option>
          @foreach($roles as $role)
          <option value="{{ $role->id }}">{{ $role->role }}</option>
          @endforeach
        </x-select>
        <x-input-error for="role_id" />
      </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-12">
      <div class="flex flex-col relative">
        <x-input wire:model="email" label="Email" name="email" />
        <x-input-error for="email" />
      </div>

      <div class="flex flex-col relative">
        <x-input wire:model="contact" label="Contact" name="contact" type="tel" />
        <x-input-error for="contact" />
      </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-12">
      <div class="flex flex-col relative">
        <x-input wire:model="address" label="Address" name="address" />
        <x-input-error for="address" />
      </div>

      <div class="flex flex-col relative">
        <x-input wire:model="birthdate" label="Birthdate" name="birthdate" type="date" />
        <x-input-error for="birthdate" />
      </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-12">
      <div class="flex flex-col relative">
        <x-input wire:model="username" label="Username" name="username" />
        <x-input-error for="username" />
      </div>

      <div class="flex flex-col relative">
        <x-input wire:model="password" label="Password" name="password" type="password" />
        <x-input-error for="password" />
      </div>
    </div>

    
    <div class="flex flex-col sm:flex-row justify-end items-end gap-3 pt-6">
      <x-button wire:click="updateUser" class="px-4">
        <x-slot:title>
            Update
        </x-slot>
      </x-button>
    </div>
  </form>

  <x-loading target="updateUser" />
</div>
