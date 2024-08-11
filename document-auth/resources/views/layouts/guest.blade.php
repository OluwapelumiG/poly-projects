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
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100" style="background: linear-gradient(to bottom left, green, peachpuff);">
            <div>
                <a class="text-center" href="/" wire:navigate>
                    <svg class="h-32 mx-auto" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M597.3 719.9V533.4h141.9V232.2H405.1v178H238.4l7.4 418.1h493.4V719.9z" fill="#E1F0FF"></path><path d="M606.4 543H807v161.2H606.4z" fill="#E1F0FF"></path><path d="M219 384.8h26.7v443.5H219zM583.9 520.1h26.7v207h-26.7zM802.9 520.1h26.7v207h-26.7z" fill="#446EB1"></path><path d="M583.9 700.4h245.8v26.7H583.9zM583.9 520.1h245.8v26.7H583.9zM219 802.5h517.8v25.8H219zM373.4 206.4h363.3v25.8H373.4z" fill="#446EB1"></path><path d="M713.4 206.4h25.8v103.9h-25.8zM713.4 776.3h25.8v52h-25.8zM392.4 224.4l-19.2-18.1L219 384l19.2 18.1 154.2-177.7z" fill="#446EB1"></path><path d="M379.7 214.9h25.4v177.6h-25.4z" fill="#446EB1"></path><path d="M219 384.8h186.1v25.4H219zM759.3 510v-31.6c0-29-23.6-52.5-52.5-52.6-29 0-52.5 23.6-52.6 52.6V510h-26.3v-31.6c0-43.5 35.4-78.8 78.8-78.8 43.5 0 78.8 35.4 78.8 78.8V510h-26.2z" fill="#446EB1"></path><path d="M692.7 599.4h43v43h-43z" fill="#6D9EE8"></path></g></svg>
                    <h2 class="my-auto text-xl text-white">Document Verification System</h2>
                    {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
