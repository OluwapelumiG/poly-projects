<div>
    <!-- Student Table -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course Applied</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($students as $student)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $student->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $student->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $student->phone }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $student->course_applied }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <button wire:click="viewStudent({{ $student->id }})" class="text-indigo-600 hover:text-indigo-900">View</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Student Details Modal -->
    @if($viewingStudent)
        <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Student Details</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">Name: {{ $selectedStudent->name }}</p>
                                    <p class="text-sm text-gray-500">Email: {{ $selectedStudent->email }}</p>
                                    <p class="text-sm text-gray-500">Phone: {{ $selectedStudent->phone }}</p>
                                    <p class="text-sm text-gray-500">JAMB Score: {{ $selectedStudent->jamb_score }}</p>
                                    <p class="text-sm text-gray-500">Course Applied: {{ $selectedStudent->course_applied }}</p>
                                    <p class="text-sm text-gray-500">O-Level Result:</p>
                                    <ul class="list-disc list-inside">
                                        @foreach(json_decode($selectedStudent->o_level_result, true) as $result)
                                            <li class="text-sm text-gray-500">{{ $result['subject'] }}: {{ $result['grade'] }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button wire:click="closeModal" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>