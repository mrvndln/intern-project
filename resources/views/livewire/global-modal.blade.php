<div x-data={show:@entangle('show')}>
    <div x-show="show" class = "fixed inset-0 bg-black/50 flex justify-center items-center" >
        @if($component)
            @livewire($component, $params)
        @endif
    </div>
</div>