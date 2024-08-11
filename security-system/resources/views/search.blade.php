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
        <header class="bg-gradient-to-br from-teal-600 to-yellow-600 text-white py-6">
            <a href="/">
                <div class="container mx-auto text-center">
                    <img class="mx-auto w-36" src="https://www.kogistatepolytechnic.edu.ng/wp-content/uploads/2021/03/schoolgate.jpg" />
                    <h1 class="text-4xl mt-10 font-bold">Welcome to <br> Kogi State Polytechnic <br> Smart Security SYSTEM</h1>
                    <p class="mt-10 text-lg">Search for a student or staff quickly and easily.</p>
                </div>
            </a>
        </header>

        <!-- Search Form -->
        <div class="container mx-auto mt-10">
            <div class="bg-white p-6 rounded shadow-lg">
                <h2 class="text-2xl font-bold mb-4">Search for a Person</h2>
                
                <form method="GET" action="{{ route('search') }}">
                    <div class="relative mb-4">
                        <input 
                            type="text" 
                            name="search" 
                            class="w-full px-3 py-2 border rounded" 
                            placeholder="Search by ID, First Name, Last Name, Email, or Phone"
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

                <!-- Persons Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 mt-6">
                    @forelse ($persons as $person)
                        <div class="bg-white p-6 rounded shadow-lg text-center">
                            <div class="mb-4">
                                @if ($person->photo)
                                    <img class="rounded-full mx-auto w-24 h-24 object-cover" src="{{ asset('storage/' . $person->photo) }}" alt="Person Photo">
                                @else
                                    <img class="rounded-full mx-auto w-24 h-24 object-cover" src="https://via.placeholder.com/150" alt="No Photo">
                                @endif
                            </div>
                            <h3 class="text-xl font-bold mb-2">{{ $person->first_name }} {{ $person->last_name }}</h3>
                            <p class="text-gray-700"><strong>ID:</strong> {{ $person->id_number }}</p>
                            <p class="text-gray-700"><strong>Email:</strong> {{ $person->email }}</p>
                            <p class="text-gray-700"><strong>Phone:</strong> {{ $person->phone }}</p>
                            <p class="text-gray-700"><strong>Emergency Contact Name:</strong> {{ $person->emergency_contact_name }}</p>
                            <p class="text-gray-700"><strong>Emergency Contact Phone:</strong> {{ $person->emergency_contact_phone }}</p>
                            <p class="text-gray-700"><strong>Next of Kin Name:</strong> {{ $person->next_of_kin_name }}</p>
                            <p class="text-gray-700"><strong>Next of Kin Phone:</strong> {{ $person->next_of_kin_phone }}</p>
                            <p class="text-gray-700"><strong>Origin:</strong> {{ $person->origin }}</p>
                            <p class="text-gray-700"><strong>Allergies:</strong> {{ $person->allergies }}</p>
                            <p class="text-gray-700"><strong>Disability:</strong> {{ $person->disability ? 'Yes' : 'No' }}</p>
                            @if ($person->disability)
                                <p class="text-gray-700"><strong>Disability Details:</strong> {{ $person->disability_details }}</p>
                            @endif
                        </div>
                    @empty
                        <p class="text-gray-500">No results found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </body>
</html>
