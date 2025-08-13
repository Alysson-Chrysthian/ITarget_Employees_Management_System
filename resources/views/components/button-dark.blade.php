<div class="
    bg-black text-white
    text-center font-bold
    rounded-md
">
    <button {{ $attributes->merge([
        'type' => 'submit',
        'class' => '
            w-full p-1 cursor-pointer
            flex justify-center
        '
    ]) }}>
        <span
            wire:loading.remove
            wire:target="{{ $attributes->get('wire:target') }}"                
        >{{ $slot }}</span> 
        <x-css-spinner
            class="animate-spin"
            wire:loading
            wire:target="{{ $attributes->get('wire:target') }}"
        />
    </button>
</div>