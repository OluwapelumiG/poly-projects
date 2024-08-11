<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hospital Locator</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3 bg-gradient-to-bl from-slate-50 to-blue-300">
                        <div class="text-center justify-center lg:col-start-2">
                            <svg class=" mx-auto block h-9 " viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                <path stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 16.016c1.245.529 2 1.223 2 1.984 0 1.657-3.582 3-8 3s-8-1.343-8-3c0-.76.755-1.456 2-1.984"></path>
                                <path stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8.444C17 11.537 12 17 12 17s-5-5.463-5-8.556C7 5.352 9.239 3 12 3s5 2.352 5 5.444z"></path>
                                <circle cx="12" cy="8" r="1" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle>
                            </svg>
                            <h4 class="my-auto text-2xl">Hospital Locator</h4>
                        </div>
                        @if (Route::has('login'))
                            <livewire:welcome.navigation />
                        @endif
                    </header>

                    <main class="mt-6">
                        <div class="grid">
                            <div id="search-container" class="relative min-h-screen w-full flex-1 items-stretch">
                                <form class="w-full max-w-5xl mx-auto" method="GET" action="{{ route('welcome') }}">   
                                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                            </svg>
                                        </div>
                                        <input type="search" id="default-search" name="query" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search hospital name, state, LGA, location, address..." required />
                                        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                                    </div>
                                </form>

                                @if (!empty($results))
                                    @foreach ($results as $hospital)
                                        <article class="border w-2/4 mx-auto border-gray-400 rounded-lg md:p-4 bg-white sm:py-3 py-4 px-2 m-10" data-article-path="#">
                                            <div role="presentation">
                                                <div>
                                                  <div class="m-2">
                                                    <div class="flex items-center">
                                                        {{-- <div class="mr-2">                
                                                          <a href="#">          
                                                            <img class="rounded-full w-8" src="https://res.cloudinary.com/practicaldev/image/fetch/s---dcV6iX4--/c_fill,f_auto,fl_progressive,h_90,q_auto,w_90/https://dev-to-uploads.s3.amazonaws.com/uploads/user/profile_image/112962/b1373942-b945-4d16-af76-c448e080d14a.jpeg" alt="hospital image" loading="lazy">        
                                                          </a>      
                                                        </div> --}}
                                                        <div>
                                                            <h2 class="text-2xl font-bold mb-2 hover:text-blue-600 leading-7">
                                                                <a href="#" id="article-link-151230">
                                                                    {{ $hospital->name }}
                                                                </a>
                                                              </h2>
                                                          {{-- <p>          
                                                            <a href="#" class="text text-gray-700 text-sm hover:text-black">{{ $hospital->name }}</a>                  
                                                          </p> --}}
                                                          <a href="#" class="text-xs text-gray-600 hover:text-black">          
                                                            <time datetime="2019-08-02T13:58:42.196Z">{{ $hospital->address }}</time>        
                                                          </a>
                                                          <p>          
                                                            {{ \App\Models\Lga::where('id', $hospital->lga_id)->first()->name }},
                                                            {{ \App\Models\State::where('id', $hospital->state_id)->first()->name }}
                                                            
                                                          </p>      
                                                        </div>
                                                    </div>
                                                  </div>
                                                  <div class="pl-12 md:pl-10 xs:pl-10">
                                                    <h2 class="text-2xl font-bold mb-2 hover:text-blue-600 leading-7">
                                                      {{-- <a href="#" id="article-link-151230">
                                                        {{ $hospital->state }}, {{ $hospital->lga }}
                                                      </a>
                                                    </h2> --}}
                                                    {{-- <div class="mb-1 leading-6">
                                                        {{ $hospital->location }}
                                                    </div> --}}
                                                  </div>
                                                  <div class="pl-12 md:pl-10 xs:pl-10 mt-4">
                                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($hospital->name.', '.$hospital->address) }}" target="_blank" class="inline-block text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Find on Map</a>
                                                    <a href="tel:{{ $hospital->phone }}" class="inline-block text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Call Hospital</a>
                                                  </div>
                                              </div>
                                            </div>
                                          </article>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>
