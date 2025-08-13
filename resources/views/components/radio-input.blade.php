<div>
    <label>{{ $slot }}</label>
    <input
        {{ $attributes->merge([
            'type' => 'radio',
        ]) }}
    >
</div>