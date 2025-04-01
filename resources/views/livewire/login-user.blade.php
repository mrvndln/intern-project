<div class=" max-w-md bg-white shadow-md rounded-md mt-40">
        <div class="text-center font-bold text-xl mt-8">Sign In</div>
       
        <div class="mb-6">
            <form wire:submit="login" class="px-6">
                <div class="flex flex-col mt-4 ">
                    <label class="font-semibold">Username</label>
                    <input id="username" wire:model="username" type="text" class="border-2 w-96 rounded-md h-9 shadow-sm @error('username') border-red-500 @enderror" placeholder="Enter username">
                        @error('username')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                </div>
                 <div class="flex flex-col mt-4 ">
                    <label class="font-semibold">Password</label>
                    <input id="password" wire:model="password" type="password" class="border-2 w-96 rounded-md h-9 shadow-sm @error('password') border-red-500 @enderror" placeholder="Enter password">
                        @error('password')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                </div>
                    @if (isset($errorMessage))
                    <div class="text-red-500">{{ $errorMessage }}</div>
                    @endif
                <div class="flex justify-center mt-4">
                    <button type="submit" class="rounded-md bg-amber-300 h-9 shadow-sm px-12 font-semibold hover:bg-amber-200">Login</button>
                </div>
            </form>
        </div>
    </div>