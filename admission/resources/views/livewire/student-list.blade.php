<div class="max-w-7xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-md">
            {{ session('message') }}
        </div>
    @endif

    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Level</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment Status</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Admission Status</th>
                <th class="px-6 py-3 bg-gray-50"></th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($students as $student)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $student->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $student->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $student->phone }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $student->level }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $student->payment_status ? 'Paid' : 'Unpaid' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $student->admission_status ? 'Admitted' : 'Not Admitted' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        @if (!$student->admission_status)
                            <button wire:click="admitStudent({{ $student->id }})" class="text-indigo-600 hover:text-indigo-900">Admit</button>
                        @else
                            <span class="text-gray-500">Admitted</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
