<div class="bg-white p-6 rounded shadow-lg">
    <h2 class="text-2xl font-bold mb-4">Search for a Person</h2>
    
    <!-- Search Input and Button -->
    <div class="relative mb-4">
        <input 
            type="text" 
            wire:model="search" 
            class="w-full px-3 py-2 border rounded" 
            placeholder="Search by ID, First Name, Last Name, Email, or Phone"
        >
        @if ($isLoading)
            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                <svg class="animate-spin h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 0 1 8-8V4a10 10 0 0 0 0 20v-2a8 8 0 0 1-8-8z"></path>
                </svg>
            </div>
        @endif
    </div>

    <button wire:click="search" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>

    <!-- Persons Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6">
        @forelse ($persons as $person)
            <div class="bg-white p-6 rounded shadow-lg">
                <h3 class="text-xl font-bold mb-2">{{ $person->first_name }} {{ $person->last_name }}</h3>
                <p class="text-gray-700"><strong>ID:</strong> {{ $person->id_number }}</p>
                <p class="text-gray-700"><strong>Email:</strong> {{ $person->email }}</p>
                <p class="text-gray-700"><strong>Phone:</strong> {{ $person->phone }}</p>
            </div>
        @empty
            <p class="text-gray-500">No results found.</p>
        @endforelse
    </div>
</div>
