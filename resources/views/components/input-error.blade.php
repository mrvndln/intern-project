@props(['for'])
    
    @error($for)
        <p {{ $attributes->merge(['class' => 'absolute bottom-0 text-red-500 text-sm translate-y-4']) }}>{{ $message }}</p>
    @enderror
