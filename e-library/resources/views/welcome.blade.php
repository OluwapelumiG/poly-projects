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
    <body class="bg-gray-100">
    
        <!-- Landing Page Header -->
        <header class="bg-blue-600 text-white py-6">
            <div class="container mx-auto text-center">
                <img class="mx-auto" src="https://www.kcpoly.edu.ng/img/eelib.png" />
                {{-- <h1 class="text-4xl mt-10 font-bold">Welcome to SECURITY INFORMATION SYSTEM</h1> --}}
                {{-- <p class="mt-10 text-lg">Search for someone quickly and easily.</p> --}}
            </div>
        </header>

        <!-- Search Form -->
        <div class="container mx-auto mt-10">
            <div class="bg-white p-6 rounded shadow-lg">
                <h2 class="text-2xl font-bold mb-4">Search for a book</h2>
                
                <form method="GET" action="{{ route('search') }}">
                    <div class="relative mb-4">
                        <input 
                            type="text" 
                            name="search" 
                            class="w-full px-3 py-2 border rounded" 
                            placeholder="Search for books by title, author, or description"
                            value="{{ request('search') }}"
                        >
                        @if(request()->has('search'))
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <svg class="animate-spin h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 0 1 8-8V4a10 10 0 0 0 0 20v-2a8 8 0 0 1-8-8z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
                </form>

                
            </div>
        </div>
    </body>
</html>
