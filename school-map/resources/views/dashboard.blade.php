<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    <!-- Add Location Form -->
                    <form action="{{ route('locations.store') }}" method="POST" class="mb-6">
                        @csrf
                        <div class="flex gap-4 mb-4">
                            <input type="text" name="location_name" placeholder="Location Name"
                                class="border border-gray-300 rounded-md p-2 w-full" required>
                            <input type="number" step="any" name="latitude" placeholder="Latitude"
                                class="border border-gray-300 rounded-md p-2 w-full" required>
                            <input type="number" step="any" name="longitude" placeholder="Longitude"
                                class="border border-gray-300 rounded-md p-2 w-full" required>
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md">Add
                            Location</button>
                    </form>

                    <!-- Location Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Latitude</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Longitude</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($locations as $location)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $location->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $location->latitude }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $location->longitude }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <!-- Delete Form -->
                                            <form action="{{ route('locations.destroy', $location->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this location?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 text-white px-4 py-2 rounded-md">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
