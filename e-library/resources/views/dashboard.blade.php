<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-green-500 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto px-4">
                        <h1 class="text-2xl font-bold mb-4">Library Dashboard</h1>
                        <a href="{{ route('library-items.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Item</a>
                        <div class="mt-4">
                            @foreach($items as $item)
                                <div class="border p-4 mb-4">
                                    <h2 class="text-xl font-bold">{{ $item->title }}</h2>
                                    <p>Author: {{ $item->author }}</p>
                                    <p>{{ $item->description }}</p>
                                    @if($item->file_path)
                    <a href="{{ asset('storage/' . $item->file_path) }}" class="text-blue-500" target="_blank">View File</a>
                @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>
