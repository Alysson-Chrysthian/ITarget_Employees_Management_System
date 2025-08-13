<div>
    <input 
        {{ $attributes->merge([
            'type' => 'text',
            'class' => '
                shadow-default
                border-2 border-light-dark rounded-md
                p-1
                w-full
            '
        ]) }}
        placeholder="{{ $slot }}"
    >
</div>