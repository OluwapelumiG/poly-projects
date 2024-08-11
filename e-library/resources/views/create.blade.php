<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Item') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-green-500 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto px-4">
                        {{-- <h1 class="text-2xl font-bold mb-4">Add Library Item</h1> --}}
                        <form action="{{ route('library-items.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="title" class="block text-gray-700">Title</label>
                                <input type="text" name="title" id="title" class="w-full border rounded p-2">
                            </div>
                            <div class="mb-4">
                                <label for="author" class="block text-gray-700">Author</label>
                                <input type="text" name="author" id="author" class="w-full border rounded p-2">
                            </div>
                            <div class="mb-4">
                                <label for="description" class="block text-gray-700">Description</label>
                                <textarea name="description" id="description" class="w-full border rounded p-2"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="file" class="block text-gray-700">File</label>
                                <input type="file" name="file" id="file" class="w-full border rounded p-2">
                            </div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Item</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
