<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                <div class="container mx-auto py-8">

                    <div class="flex justify-between mb-4">
                        <h1 class="text-2xl font-semibold">Results</h1>
                        <button @click="showModal = true" class=" text-white px-4 py-2 rounded" style="background-color: yellowgreen"> + Add New Result</button>
                    </div>

                    {{-- <div class="flex justify-between mb-4">
                        <h1 class="text-2xl font-semibold">Results</h1>
                        <a href="{{ route('results.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New Result</a>
                    </div>
                    
                    @if(session('success'))
                        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif --}}
                
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Name</th>
                                <th class="py-2 px-4 border-b">Serial No</th>
                                <th class="py-2 px-4 border-b">Program</th>
                                <th class="py-2 px-4 border-b">Course</th>
                                <th class="py-2 px-4 border-b">Grade</th>
                                <th class="py-2 px-4 border-b">CGPA</th>
                                <th class="py-2 px-4 border-b">Date</th>
                                <th class="py-2 px-4 border-b">Session</th>
                                <th class="py-2 px-4 border-b">QR</th>
                                <th class="py-2 px-4 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($results && ($results->count() > 0))
                                @foreach($results as $result)
                                    <tr>
                                        <td class="py-2 px-4 border-b">{{ $result->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $result->serial_no }}</td>
                                        <td class="py-2 px-4 border-b">{{ $result->program }}</td>
                                        <td class="py-2 px-4 border-b">{{ $result->course }}</td>
                                        <td class="py-2 px-4 border-b">{{ $result->grade }}</td>
                                        <td class="py-2 px-4 border-b">{{ $result->cgpa }}</td>
                                        <td class="py-2 px-4 border-b">{{ $result->date }}</td>
                                        <td class="py-2 px-4 border-b">{{ $result->session }}</td>
                                        <td class="py-2 px-4 border-b">{{ $result->qr }}</td>
                                        <td class="py-2 px-4 border-b">
                                            <a href="{{ route('results.print', $result) }}"  style="background-color: yellowgreen" class=" text-white px-2 py-1 rounded">Print</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            
                        </tbody>
                    </table>
                    <!-- Modal -->
                    <div x-show="showModal" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <div x-show="showModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>

                            <div x-show="showModal" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-xl sm:w-full">
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    {{-- <div class="sm:flex sm:items-start w-full"> --}}
                                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                                            <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                                Add New Result
                                            </h3>
                                            <div class="mt-2">
                                                <form action="{{ route('results.store') }}" method="POST">
                                                    @csrf
                                                    <div class=" mb-4">
                                                        <div class="w-full">
                                                            <label for="name" class="block text-gray-700">Name</label>
                                                            <input type="text" name="name" id="name" class="w-full border-gray-300 rounded mt-1" required>
                                                        </div>
                                                        <div>
                                                            <label for="program" class="block text-gray-700">Program</label>
                                                            <input type="text" name="program" id="program" class="w-full border-gray-300 rounded mt-1" required>
                                                        </div>
                                                        <div>
                                                            <label for="course" class="block text-gray-700">Course</label>
                                                            <input type="text" name="course" id="course" class="w-full border-gray-300 rounded mt-1" required>
                                                        </div>
                                                        
                                                        <div>
                                                            <label for="cgpa" class="block text-gray-700">CGPA</label>
                                                            <input type="number" step="0.01" name="cgpa" id="cgpa" class="w-full border-gray-300 rounded mt-1" required>
                                                        </div>
                                                        
                                                        <div>
                                                            <label for="session" class="block text-gray-700">Session</label>
                                                            <input type="text" name="session" id="session" class="w-full border-gray-300 rounded mt-1" required>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="flex justify-end">
                                                        <button @click="showModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                                                            Cancel
                                                        </button>
                                                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                            Save
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    {{-- </div> --}}
                                </div>
                                {{-- <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <button @click="showModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                                        Cancel
                                    </button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
