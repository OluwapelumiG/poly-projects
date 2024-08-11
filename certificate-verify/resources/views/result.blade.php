<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" defer></script>


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans">

        <div class="max-w-6xl mx-auto px-32 py-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mx-auto justify-center items-center text-center">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQDIn0Px5JunNHalP4m-2aWZsXeeGxJDJ98Q&s" class="mx-auto" />
                        <h2 class="text-center text-4xl text-green-500 outline" style="font-size: 50px; color:aquamarine; outline-color: gray">KOGI STATE POLYTECHNIC</h2>
                        <p>P.M.B. 1101, Lokoja, Kogi State, Nigeria</p>
                        <p>registrar@kogistatepolytechnic.edu.ng</p>
                        <h4 class="text-red-500 font-bold">OFFICE OF THE REGISTRAR</h4>
                    </div>
                    <div class="justify-between flex">
                        <div>
                            <div class="flex">
                                <span class="text-red-500">
                                    Rector: 
                                </span>
                                <div>
                                    <span>
                                        Salisu Ogbo Usman
                                    </span>
                                    <br />
                                    <span>
                                        B.Sc., Ph.D
                                    </span>
                                </div>
                                
                            </div>
                        </div>

                        <div>
                            <div class="flex">
                                <span class="text-red-500">
                                    Registrar: 
                                </span>
                                <div>
                                    <span>
                                        Aiyeetan Sunday
                                    </span>
                                    <br />
                                    <span>
                                        B.ED, MBA.
                                    </span>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="justify-between flex">
                        <div>

                        </div>
                        <div>
                            <span class="text-red-500">S/N0</span>
                            <span class="underline font-bold">{{ $result->serial_no }}</span>
                        </div>
                    </div>

                    <div class="text-center">
                        <h2 class="italic text-red-500 underline text-center" style="font-size: 30px">Statement of Result</h2>
                        <h3>This is to certify that:</h3>
                        <h1 class="font-bold" style="font-size: 35px">{{ Str::upper($result->name) }}</h1>
                    </div>

                    <div class="px-6">
                        <p class="text-xl">
                            has completed the <strong>{{ $result->program}}</strong> in <strong> {{ $result->course }}</strong>
                            Programme at <strong>{{ $result->grade }}</strong> with CGPA of <strong>{{ $result->cgpa }}</strong>
                            and passed the course(s) as approved by Academic Board on <strong>{{ $result->created_at }}</strong>
                            for <strong>{{ $result->session }}</strong> Academic Session.
                        </p>
                        <div>
                            <p class="italic text-xl"><i>Congratulations!</i></p>
                        </div>
                    </div>


                    <div class="justify-between flex">
                        <div>

                            <span>Audu Matthew</span>
                            <br />
                            <span><i>For: Registrar</i></span>

                        </div>
                        <div>
                            {!! QrCode::size(150)->generate(url('/verify-qr/'.$result->qr)) !!}
                        </div>
                    </div>


                    




                    
                </div>
            </div>
        </div>

    </body>
    </html>    