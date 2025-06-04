<div class=" max-w-md bg-white shadow-md rounded-md w-1/2">
    <div class="text-center font-bold text-xl mt-8">Sign In</div>

    <div class="mb-6">
        <form wire:submit="login" class="px-6 relative">
            <div class="flex flex-col mt-4 relative">
                <x-input wire:model="username" label="Username" name="username" />
            </div>
            <div class="flex flex-col mt-4 relative">
                <x-input wire:model="password" label="Password" name="password" type="password" />
                @if (isset($errorMessage))
                <div class="text-red-500 absolute bottom-0 translate-y-4">{{ $errorMessage }}</div>
                @endif
            </div>
            <div class="flex justify-center mt-8">
                <x-button class="px-8">
                    <x-slot:title>
                        Login
                    </x-slot>
                </x-button>
            </div>
        </form>
    </div>
</div>