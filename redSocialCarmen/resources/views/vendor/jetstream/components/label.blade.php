@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-md text-crimson']) }}>
    {{ $value ?? $slot }}
</label>
