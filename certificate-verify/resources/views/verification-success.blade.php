<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">


            <div class="py-12">
                <div class=" mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="max-w-6xl mx-auto px-4 py-8">
                            <div class=" overflow-hidden shadow-sm sm:rounded-lg" style="background-color: yellowgreen">
                                <a href="{{ route('dashboard') }}" wire:navigate>
                                    <img src="{{ asset('cert.png')}}" style="width: 5rem;"/>
                                    
                                    {{-- <x-application-logo class="block h-9 w-auto fill-current text-gray-800" /> --}}
                                </a>
                                <h2 style="font-size: 30px; color:whitesmoke">Certificate Verification System</h2>
                                <div class="p-6 border-b border-gray-200" style="color: black;">
                                    <h2 class="text-2xl font-bold mb-4">Verification Success</h2>
                                    <p>Result Details:</p>
                                    <p>Name: {{ $result->name }}</p>
                                    <p>Program: {{ $result->program }}</p>
                                    <p>Course: {{ $result->course }}</p>
                                    <p>Grade: {{ $result->grade }}</p>
                                    <!-- Add more details as needed -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    </body>
</html>
