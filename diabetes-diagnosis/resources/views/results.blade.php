<x-app-layout>
    <div class="mx-10">
        <h1 class="text-2xl font-semibold text-center text-gray-800 dark:text-gray-200 mb-5">Diabetes Diagnosis Results</h1>

        <div class="flex justify-center mt-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg max-w-2xl w-full p-6">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Score
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Edit
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $result)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                    {{ $result->user->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $result->score }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $result->has_diabetes ? 'High Risk' : ($result->score <= 30 ? 'Low Risk' : 'Medium Risk') }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    {{-- <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
