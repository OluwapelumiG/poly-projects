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
    <body class="bg-gray-100 text-gray-800">

        <header class="bg-blue-600 text-white py-4 shadow-md">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-bold">Diabetes Diagnosis</h1>
                <nav>
                    <a href="#features" class="px-4">Features</a>
                    <a href="#about" class="px-4">About</a>
                    <a href="#contact" class="px-4">Contact</a>
                    <a href="/login" class="bg-white text-blue-600 py-2 px-4 rounded-lg shadow-md hover:bg-gray-100">Login</a>
                    <a href="/register" class="bg-white text-blue-600 py-2 px-4 rounded-lg shadow-md hover:bg-gray-100">Register</a>
                
                </nav>
            </div>
        </header>
    
        <main>
            <section class="bg-white py-20">
                <div class="container mx-auto text-center">
                    <h2 class="text-4xl font-semibold mb-4">Welcome to Diabetes Diagnosis Software</h2>
                    <p class="text-lg text-gray-600 mb-8">Accurate, fast, and easy-to-use software to help diagnose diabetes.</p>
                    <a href="#features" class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-700">Learn More</a>
                </div>
            </section>
    
            <section id="features" class="py-20 bg-gray-100">
                <div class="container mx-auto">
                    <h2 class="text-3xl font-semibold text-center mb-12">Features</h2>
                    <div class="grid md:grid-cols-3 gap-8">
                        <div class="bg-white p-6 rounded-lg shadow-md text-center">
                            <h3 class="text-2xl font-semibold mb-4">Accurate Diagnosis</h3>
                            <p class="text-gray-600">Our software uses advanced algorithms to provide accurate diabetes diagnosis.</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-md text-center">
                            <h3 class="text-2xl font-semibold mb-4">User-Friendly Interface</h3>
                            <p class="text-gray-600">Designed with a simple and intuitive interface for ease of use.</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-md text-center">
                            <h3 class="text-2xl font-semibold mb-4">Real-Time Results</h3>
                            <p class="text-gray-600">Get your diagnosis results instantly with our real-time processing.</p>
                        </div>
                    </div>
                </div>
            </section>
    
            <section id="about" class="py-20 bg-white">
                <div class="container mx-auto text-center">
                    <h2 class="text-3xl font-semibold mb-8">About Us</h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">We are dedicated to providing the best tools for healthcare professionals to diagnose and manage diabetes effectively. Our team of experts continuously improves the software to ensure accuracy and reliability.</p>
                </div>
            </section>
    
            <section id="contact" class="py-20 bg-gray-100">
                <div class="container mx-auto text-center">
                    <h2 class="text-3xl font-semibold mb-8">Contact Us</h2>
                    <p class="text-lg text-gray-600 mb-8">Have questions or need assistance? Reach out to our support team.</p>
                    <a href="mailto:support@diabetesdiagnosis.com" class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-700">Email Us</a>
                </div>
            </section>
        </main>
    
        <footer class="bg-blue-600 text-white py-4 text-center">
            <p>&copy; 2024 Diabetes Diagnosis Software. All rights reserved.</p>
        </footer>
    </body>
</html>
