<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body id="app" class="font-sans antialiased">
        <div class="min-h-screen bg-transparent">
            @include('layouts.navigation')
            
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <footer>
                @include('layouts.footer')
            </footer>
        </div>
    </body>
</html>
