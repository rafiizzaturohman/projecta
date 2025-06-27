@props(['value'])

<label {{ $attributes->merge([
    'class' => 'block text-sm font-medium text-text-primary dark:text-dark-text-primary transition-colors duration-300'
]) }}>
    {{ $value ?? $slot }}
</label>
