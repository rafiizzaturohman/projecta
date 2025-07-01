@props(['value'])

<th {{ $attributes->merge([
    'class' => 'px-6 py-4 font-medium'
]) }}>
    {{ $value ?? $slot }}
</th>