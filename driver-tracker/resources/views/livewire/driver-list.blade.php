<div>
    {{-- <div class="h-screen bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-white"> --}}
        <div class="container mx-auto px-4 py-8">
            <h2 class="text-3xl font-semibold text-center text-gray-800 dark:text-gray-200 mb-8">
                All Drivers
            </h2>
    
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                @if ($drivers)
                    @foreach ($drivers as $index => $driver)
                        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                            {{-- <img src="https://tailwindcss.com/_next/static/media/headlessui@75.c1d50bc1.jpg" --}}
                                {{-- alt="Headless UI" class="w-full h-64 object-cover"> --}}
                            <div class="p-4 md:p-6">
                                <h3 class="text-xl font-semibold text-center text-indigo-500 dark:text-indigo-300 mb-2">
                                    {{ $driver->name }}
                                </h3>
                                <p class="text-gray-700 text-center dark:text-gray-300 mb-4 two-lines">
                                    Bus {{ '00'.$index+1 }}
                                </p>
                                <a href="driver/{{ $driver->id }}/location"
                                    class="inline-block bg-indigo-500 text-center hover:bg-indigo-600 text-white px-4 py-2 rounded-full">
                                View Location
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
                
    
                
    
                <!-- Add more items as needed, following the same structure -->
    
            </div>
        </div>
    {{-- </div> --}}
</div>
