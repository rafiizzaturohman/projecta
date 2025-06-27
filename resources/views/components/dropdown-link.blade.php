<a {{ $attributes->merge([
    'class' => 'block w-full px-4 py-2 text-start text-sm leading-5
                text-text-secondary dark:text-dark-text-secondary
                hover:bg-primary-hover dark:hover:bg-dark-primary-hover
                hover:text-white dark:hover:text-white
                rounded transition duration-150 ease-in-out'
]) }}>
    {{ $slot }}
</a>
