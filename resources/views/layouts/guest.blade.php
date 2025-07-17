<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }"
      x-init="$watch('darkMode', value => {
            localStorage.setItem('theme', value ? 'dark' : 'light');
            document.documentElement.classList.toggle('dark', value);
      })"
      :class="{ 'dark': darkMode }"
      class="transition-colors duration-300"
>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Projecta') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,600|roboto:400,500&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=IBM+Plex+Sans&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Alpine.js (if not globally included) --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-background dark:bg-dark-background text-text-primary dark:text-dark-text-primary font-primary antialiased transition-colors duration-300">
    <div class="min-h-screen flex flex-col justify-center items-center px-4 sm:px-0">
        <!-- Logo -->
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-primary hover:opacity-90 transition duration-300" />
            </a>
        </div>

        <!-- Card -->
        <div class="relative w-full sm:max-w-md mt-8 p-6 bg-surface dark:bg-dark-surface border border-border dark:border-dark-border rounded-xl shadow-card transition-all duration-300">

            <!-- Toggle Button (Optional placement here) -->
            <div class="absolute top-4 right-4">
                <button @click="darkMode = !darkMode"
                        class="flex items-center gap-2 px-3 py-1.5 rounded-full text-sm
                               text-text-secondary dark:text-dark-text-secondary
                               bg-border dark:bg-dark-border hover:bg-primary-hover hover:text-white dark:hover:bg-dark-primary-hover
                               transition">
                    <svg x-show="!darkMode" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 3v1m0 16v1m8.485-8.485h1m-16.97 0h1M16.95 7.05l.707-.707M5.636 18.364l.707-.707M16.95 16.95l.707.707M5.636 5.636l.707.707M12 5a7 7 0 100 14 7 7 0 000-14z"/>
                    </svg>
                    <svg x-show="darkMode" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                    </svg>
                    <span x-text="darkMode ? 'Dark' : 'Light'"></span>
                </button>
            </div>

            {{ $slot }}
        </div>
    </div>
</body>
</html>
