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
    <body class="p-20 bg-blue-100">
      <!-- source https://github.com/themesberg/landwind -->

      <div class="mx-auto">
          <a href="/" class="mx-auto" wire:navigate>
              <img src="{{ asset('ai2.jpg')}}" class="w-20 h-20 mx-auto" />
              <h2 class="text-center text-xl">AI Powered Screening System</h2>
          </a>
      </div>

      <livewire:student-submission-form ></livewire:student-submission-form>
    </body>
</html>
