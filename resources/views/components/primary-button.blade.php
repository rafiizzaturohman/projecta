<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => '
        inline-flex items-center px-4 py-2 rounded-md
        bg-primary dark:bg-dark-primary
        text-sm font-semibold text-white
        hover:bg-primary-hover dark:hover:bg-dark-primary-hover
        focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2
        disabled:opacity-50 transition duration-200 ease-in-out
    ']) }}>
    {{ $slot }}
</button>
