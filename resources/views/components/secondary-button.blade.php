<button {{ $attributes->merge([
    'type' => 'button',
    'class' => '
        inline-flex items-center px-4 py-2 rounded-md
        border border-border bg-white dark:bg-dark-surface
        text-sm font-medium text-text-primary dark:text-text-primary
        hover:bg-gray-100 dark:hover:bg-dark-hover
        focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2
        disabled:opacity-50 shadow-sm transition duration-200 ease-in-out
    ']) }}>
    {{ $slot }}
</button>
