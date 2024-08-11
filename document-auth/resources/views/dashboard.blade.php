<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">My Documents</h2>

                    @foreach($documents as $document)
                    <div class="flex items-center justify-between py-2">
                        <div class="flex items-center space-x-4">
                            <!-- Document Icon (optional based on file type) -->
                            <svg class="h-6 w-6 text-gray-500">
                                @if($document->type == 'pdf')
                                <path fill="currentColor" d="M11.5 0C17.299 0 22 4.701 22 10.5S17.299 21 11.5 21C5.701 21 1 16.299 1 10.5S5.701 0 11.5 0zm-1 13v-2h2V7h-2V5h3v8h-3z"/>
                                @elseif($document->type == 'doc' || $document->type == 'docx')
                                <path fill="currentColor" d="M4 4v16h12V4H4zm9 12h-4v-1h4v1zm0-2h-4v-1h4v1zm0-2h-4V9h4v3zm2 7V4h-1v15H5v1h10z"/>
                                @else
                                <!-- Default icon for other file types -->
                                <path fill="currentColor" d="M14.75 3H9.25c-.69 0-1.25.56-1.25 1.25v15.5c0 .69.56 1.25 1.25 1.25h5.5c.69 0 1.25-.56 1.25-1.25V4.25c0-.69-.56-1.25-1.25-1.25zm-7.5 1.25v15.5c0 .138.112.25.25.25h5.5c.138 0 .25-.112.25-.25V4.25c0-.138-.112-.25-.25-.25h-5.5c-.138 0-.25.112-.25.25z"/>
                                @endif
                            </svg>

                            <!-- Document Title -->
                            <div>
                                <div class="text-lg font-semibold">{{ $document->title }}</div>
                                <div class="text-gray-500">{{ Str::ucfirst($document->status ) }} - {{ $document->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                        
                        <!-- Download Button url('storage/'.$image->link) -->
                        
                        <a href="{{ asset('storage/' . $document->file) }}" download class="text-blue-500 hover:text-blue-700">
                            Download
                        </a>
                    </div>
                    @endforeach

                    @if($documents->isEmpty())
                    <p class="text-gray-400">No documents found.</p>
                    @endif
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
