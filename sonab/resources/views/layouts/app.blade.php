<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Anniversaires pour enfants</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js']);
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
        <script src="https://js.stripe.com/v3/"></script>
        
    </head>
    <!-- id app sur le body pour intégrer vue  -->
    <body class="font-sans antialiased" id="app" >
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



