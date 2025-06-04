{{-- @extends('layouts/app')
@section('content') --}}
<div {{ $attributes }} class="px-2 pb-6 text-gray-800">
    {{ $loading ?? '' }}
    {{ $modals ?? '' }}
    <div class="mt-6 space-y-2">
        <div class="px-6 py-6">
            <div class="flex items-center justify-between">
                <h2 class="flex items-center space-x-6 text-2xl font-medium text-gray-700 capitalize">
                    <span class="text-red-500 font-bold">
                        {{ $header_title ?? '' }}
                        <div class="ml-1" style="width:56px; height: 0; border-radius:5px; border-top: 4px solid rgb(254, 130, 130);"></div>
                    </span>
                    @if ($search_form ?? false)
                        <svg @click="search_form = !search_form" class="w-5 h-5 " aria-hidden="true" focusable="false"
                            data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <path fill="currentColor"
                                d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                            </path>
                        </svg>
                    @endif
                </h2> 
                <div class="flex items-center justify-between space-x-3">
                    {{ $header_button ?? '' }}
                </div>
            </div>
        </div>
        @if ($header_card ?? false)
            <div class="grid grid-cols-2 gap-6 md:grid-cols-5 lg:grid-cols-5">
                {{ $header_card ?? '' }}
            </div>
        @endif
        @if ($search_form ?? false)
            <div x-cloak x-show="search_form">
                <div class="grid grid-cols-2 gap-3 sm:grid-cols-2 md:grid-cols-5 lg:grid-cols-5 xl:grid-cols-5">
                    {{ $search_form ?? '' }}
                </div>
            </div>
        @endif
        {{ $body ?? '' }}
    </div>
</div>

{{-- @endsection --}}
