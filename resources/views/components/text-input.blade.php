@props(['disabled' => false])

<input
    @disabled($disabled)
    {{ $attributes->merge([
        'class' => 'border border-border dark:border-dark-border bg-white dark:bg-dark-surface text-text-primary dark:text-dark-text-primary placeholder-gray-400 dark:placeholder-gray-500 focus:ring-primary focus:border-primary dark:focus:ring-dark-primary dark:focus:border-dark-primary rounded-lg shadow-sm transition duration-200 w-full'
    ]) }}
>
