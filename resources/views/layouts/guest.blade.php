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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-text-primary font-primary antialiased">
    <div class="min-h-screen flex flex-col justify-center items-center px-4 sm:px-0">
        <!-- Logo -->
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-primary hover:opacity-90 transition duration-300" />
            </a>
        </div>

        <!-- Card -->
        <div class="w-full sm:max-w-md mt-8 p-6 bg-surface border border-border rounded-2xl shadow-card transition-all duration-300">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
