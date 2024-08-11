<x-app-layout>
    <div class="flex justify-center items-center h-screen">
        <div class="bg-white dark:bg-gray-D1600 shadow-lg rounded-lg p-6 w-full mx-20 my-6">
            <h1 class="text-2xl font-semibold text-center text-gray-L800 dark:text-gray-D200 mb-5">Diabetes Diagnosis</h1>
            {{-- <p class="text-base text-center text-gray-L600 dark:text-gray-D300 mb-5">Test your understanding of using Tailwind CSS in your cloud native web application.</p> --}}
            
            <div class="mt-8">
                <livewire:quiz />
            </div>
        </div>
    </div>
</x-app-layout>
