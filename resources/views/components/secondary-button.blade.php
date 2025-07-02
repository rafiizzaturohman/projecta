<button {{ $attributes->merge([
    'type' => 'button',
    'class' => '
        inline-flex items-center justify-center px-4 py-2
        rounded-md border border-border dark:border-dark-border
        bg-surface dark:bg-dark-surface
        text-sm font-medium text-text-primary dark:text-dark-text-primary
        hover:bg-secondary-hover dark:hover:bg-dark-secondary-hover
        focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2
        disabled:opacity-50 shadow-soft transition duration-200 ease-in-out
    '
]) }}>
    {{ $slot }}
</button>
