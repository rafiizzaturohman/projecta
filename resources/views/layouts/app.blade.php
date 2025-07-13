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
    <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.3.2/b-3.2.3/b-html5-3.2.3/b-print-3.2.3/fh-4.0.3/r-3.0.4/sp-2.3.3/sr-1.4.1/datatables.min.js"
    integrity="sha384-jRZXDbd6mmCH0PxmBrvh2SQVnrAzPldaC1r/47Bl1JQ8yAVn8iQjmLuSlCnLYyQJ"
    crossorigin="anonymous"></script>
    
    {{-- <script src="resources/js/jquery-3.7.1.min.js"></script> --}}
    
    <script src="https://kit.fontawesome.com/11d621a1c8.js" crossorigin="anonymous"></script>
        
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/jquery-3.7.1.min.js'])
</head>
<body class="font-sans antialiased bg-background text-text-primary dark:bg-dark-background dark:text-dark-text-primary transition-colors duration-300">
    <div class="min-h-screen flex flex-col">
        {{-- Navigation --}}
        @include('layouts.navigation')

        {{-- Page Heading --}}
        @isset($header)
            <header class="bg-surface shadow-soft border-b border-border">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-2xl font-semibold text-text-primary">
                        {{ $header }}
                    </h1>
                </div>
            </header>
        @endisset

        {{-- Page Content --}}
        <main class="flex-1 px-4 sm:px-6 lg:px-8 py-6">
            {{ $slot }}
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>

<script>
    window.userSearchUrl = "{{ route('userManagement.search') }}";
</script>

</html>
