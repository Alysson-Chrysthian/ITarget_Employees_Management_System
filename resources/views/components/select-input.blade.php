<div>
    <select
        {{ $attributes->merge([
            'class' => '
                shadow-default
                border-2 border-light-dark rounded-md
                p-1
                w-full
            '
        ]) }}
    >
        @if ($attributes->get('placeholder'))
            <option selected disabled>{{ $attributes->get('placeholder') }}</option>
        @endif
        {{ $slot }}
    </select>
</div>