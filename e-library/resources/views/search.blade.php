<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Search</title>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 p-6">
    <header class="bg-blue-600 text-white py-6">
        <a href="/">
            <div class="container mx-auto text-center">
                <img class="mx-auto h-30" style="height: 200px" src="https://www.kcpoly.edu.ng/img/eelib.png" />
                {{-- <h1 class="text-4xl mt-10 font-bold">Welcome to SECURITY INFORMATION SYSTEM</h1> --}}
                {{-- <p class="mt-10 text-lg">Search for someone quickly and easily.</p> --}}
            </div>
        </a>
    </header>
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Search Books</h1>
        <form action="{{ route('search') }}" method="GET" class="mb-6">
            <div class="flex items-center border-b border-b-2 border-teal-500 py-2">
                <input type="text" name="query" placeholder="Search for books by title, author, or description"
                       class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none">
                <button type="submit" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">
                    Search
                </button>
            </div>
        </form>

        <div class="mt-4">
            @forelse($items as $item)
            <div class="border p-4 mb-4 bg-gray-50 rounded shadow">
                <h2 class="text-xl font-bold">{{ $item->title }}</h2>
                <p>Author: {{ $item->author }}</p>
                <p>{{ $item->description }}</p>
                @if($item->file_path)
                    <a href="{{ asset('storage/' . $item->file_path) }}" class="text-blue-500" target="_blank">View File</a>
                @endif
            </div>
            
            @empty
                <p class="text-gray-500">No results found.</p>
            @endforelse
        </div>
    </div>
</body>
</html>
