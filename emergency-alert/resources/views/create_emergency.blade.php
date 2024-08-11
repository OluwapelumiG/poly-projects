<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 w-full">
                    @if (session('success'))
                        <div class="bg-green-500 text-white p-4 rounded mb-4">{{ session('success') }}</div>
                    @endif
                    {{-- <div class="w-full max-w-xs"> --}}
                        <form action="{{ route('emergencies.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                    Title
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" name="title" value="{{ old('title') }}">
                                @error('title')
                                    <div class="text-red-500 text-xs italic">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                    Description
                                </label>
                                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" name="description">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-red-500 text-xs italic">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="location">
                                    Location
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="location" type="text" name="location" value="{{ old('location') }}">
                                @error('location')
                                    <div class="text-red-500 text-xs italic">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="severity">
                                    Severity
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="severity" type="text" name="severity" value="{{ old('severity') }}">
                                @error('severity')
                                    <div class="text-red-500 text-xs italic">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex items-center justify-between">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                    Send Emergency Alert
                                </button>
                            </div>
                        </form>
                        {{-- <p class="text-center text-gray-500 text-xs">
                            &copy;2024 Acme Corp. All rights reserved.
                        </p> --}}
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
