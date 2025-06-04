@props(['label','type'])

<div class="relative z-0 w-full mb-2">
    <input type="{{ $type ?? 'text'}}"
        {{ $attributes->merge([
            'class' => 'peer pt-6 pb-1 pl-2 block w-full bg-transparent border-0 border-b border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-[#003399]'
        ]) }}
        placeholder=""
    />

    <label
        class="absolute text-gray-500 duration-300 -translate-y-4 scale-75 top-1 left-2 z-10 origin-[0] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-2 peer-focus:scale-75 peer-focus:-translate-y-4"
    >
        <span>{{ $label ?? '' }}</span>
        @if ($required ?? false)
            <span class="text-red-600">*</span>
        @endif
    </label>
</div>
