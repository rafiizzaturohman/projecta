@props(['disabled' => false])

<input
    @disabled($disabled)
    {{ $attributes->merge([
        'class' => '
            w-full
            px-4 py-2
            h-10
            border border-border dark:border-dark-border
            bg-white dark:bg-dark-surface
            text-text-primary dark:text-dark-text-primary
            placeholder-gray-400 dark:placeholder-gray-500
            focus:ring-primary focus:border-primary
            dark:focus:ring-dark-primary dark:focus:border-dark-primary
            rounded-lg shadow-sm transition duration-200

            disabled:bg-white disabled:text-text-primary
            dark:disabled:bg-dark-surface dark:disabled:text-dark-text-primary
            disabled:opacity-100 disabled:cursor-not-allowed
        '
    ]) }}
>
