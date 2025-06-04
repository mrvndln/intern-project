<button {{ $attributes->merge(['class' => 'flex justify-center items-center  py-2 space-x-1 border border-[#003399] rounded-md text-sm font-medium']) }}>
    {{ $icon ?? '' }}
    <span>
        {{ $title }}
    </span>
</button>
