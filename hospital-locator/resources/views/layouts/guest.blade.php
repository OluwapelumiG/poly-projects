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
    <body class="font-sans bg-gradient-to-bl from-slate-50 to-blue-300 text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-bl from-slate-50 to-blue-300">
            <div>
                <a href="/" wire:navigate>
                    <svg class=" mx-auto block h-9 " viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <path stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 16.016c1.245.529 2 1.223 2 1.984 0 1.657-3.582 3-8 3s-8-1.343-8-3c0-.76.755-1.456 2-1.984"></path>
                        <path stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8.444C17 11.537 12 17 12 17s-5-5.463-5-8.556C7 5.352 9.239 3 12 3s5 2.352 5 5.444z"></path>
                        <circle cx="12" cy="8" r="1" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle>
                    </svg>
                    <h4 class="my-auto text-2xl">Hospital Locator</h4>
                    {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
