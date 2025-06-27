<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Projecta') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,600|roboto:400,500&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=IBM+Plex+Sans&display=swap" rel="stylesheet">

    <!-- DataTables -->
    <link href="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.3.2/b-3.2.3/b-html5-3.2.3/b-print-3.2.3/fh-4.0.3/r-3.0.4/sp-2.3.3/sr-1.4.1/datatables.min.css"
        rel="stylesheet"
        integrity="sha384-y2ZkTyeqWywVuI75vRpvaz6bAvS9oC1TrvRe8qJ9CatXFUcqjKgxw78Xn2XUBS6l"
        crossorigin="anonymous">

    <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.3.2/b-3.2.3/b-html5-3.2.3/b-print-3.2.3/fh-4.0.3/r-3.0.4/sp-2.3.3/sr-1.4.1/datatables.min.js"
        integrity="sha384-jRZXDbd6mmCH0PxmBrvh2SQVnrAzPldaC1r/47Bl1JQ8yAVn8iQjmLuSlCnLYyQJ"
        crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-background text-text-primary">
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

    {{-- DataTable Init --}}
    <script>
        let table = new DataTable('#tasks-table');
    </script>
</body>
</html>
