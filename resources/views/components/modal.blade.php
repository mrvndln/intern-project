<div wire:key="{{ $id }}" {{ $attributes }} x-show="{{ $id }}" x-cloak
    @keydown.escape.window="$wire.set('{{ $id }}', false); $dispatch('reset-form')"
    class="fixed inset-0 z-40 w-full bg-gray-900 bg-opacity-60">
    <div class="flex items-center justify-center h-screen py-10 overflow-auto">
        <div class="relative p-4 m-auto bg-white rounded-md shadow-md {{ $size }}">
            @if ($close)
                <div @click="$wire.set('{{ $id }}', false); $dispatch('reset-form')"
                    class="absolute top-[-10px] right-[-10px] p-2 bg-white shadow-md rounded-full cursor-pointer">
                    <svg class="w-2 h-2 text-red-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="currentColor"
                            d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" />
                    </svg>
                </div>
            @endif
            <div class="flex justify-between">
                <div class="text-2xl font-semibold text-gray-800">
                    {{ $title ?? '' }}
                </div>
            </div>
            <div class="mt-3">
                {{ $body ?? '' }}
            </div>
            {{ $footer ?? '' }}
        </div>
    </div>
</div>
