<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-teal-600 to-yellow-600">
            <div>
                <a href="/">
                    <div class="container mx-auto text-white text-center">
                        <img class="mx-auto w-36" src="https://www.kogistatepolytechnic.edu.ng/wp-content/uploads/2021/03/schoolgate.jpg" />
                        <h1 class="text-4xl mt-10 font-bold">Welcome to <br> Kogi State Polytechnic <br> Smart Security SYSTEM</h1>
                        {{-- <p class="mt-10 text-lg">Search for a student or staff quickly and easily.</p> --}}
                    </div>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>