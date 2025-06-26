<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Projecta') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link href="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.3.2/b-3.2.3/b-html5-3.2.3/b-print-3.2.3/fh-4.0.3/r-3.0.4/sp-2.3.3/sr-1.4.1/datatables.min.css" rel="stylesheet" integrity="sha384-y2ZkTyeqWywVuI75vRpvaz6bAvS9oC1TrvRe8qJ9CatXFUcqjKgxw78Xn2XUBS6l" crossorigin="anonymous">
        
        <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.3.2/b-3.2.3/b-html5-3.2.3/b-print-3.2.3/fh-4.0.3/r-3.0.4/sp-2.3.3/sr-1.4.1/datatables.min.js" integrity="sha384-jRZXDbd6mmCH0PxmBrvh2SQVnrAzPldaC1r/47Bl1JQ8yAVn8iQjmLuSlCnLYyQJ" crossorigin="anonymous"></script>


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>

    <script>
        let table = new DataTable('#tasks-table');
    </script>
</html>
