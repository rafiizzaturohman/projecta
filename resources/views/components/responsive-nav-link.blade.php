@props(['active'])

@php
$classes = ($active ?? false)
    ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-primary text-start text-base font-semibold text-primary bg-primary/10 dark:text-dark-primary dark:bg-dark-primary/10 dark:border-dark-primary transition duration-150 ease-in-out'
    : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-text-primary dark:text-dark-text-primary hover:text-primary dark:hover:text-dark-primary hover:bg-primary/5 dark:hover:bg-dark-primary/5 hover:border-primary focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
