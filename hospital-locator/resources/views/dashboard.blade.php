<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="text-xl text-center py-4">All Hospitals</h1>
                <table class="min-w-full bg-white">
                    <thead class="bg-blue-800 text-white">
                        <tr>
                            <th class="w-1/3 py-2">Name</th>
                            <th class="w-1/3 py-2">Address</th>
                            <th class="w-1/3 py-2">State</th>
                            <th class="w-1/3 py-2">LGA</th>
                            <th class="w-1/3 py-2">Latitude</th>
                            <th class="w-1/3 py-2">Longitude</th>
                            <th class="w-1/3 py-2">Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hospitals as $hospital)
                            <tr class="text-gray-700">
                                <td class="border px-4 py-2">{{ $hospital->name }}</td>
                                <td class="border px-4 py-2">{{ $hospital->address }}</td>
                                <td class="border px-4 py-2">{{ \App\Models\State::where('id', $hospital->state_id)->first()->name }}</td>
                                <td class="border px-4 py-2">{{ \App\Models\Lga::where('id', $hospital->lga_id)->first()->name }}</td>
                                <td class="border px-4 py-2">{{ $hospital->latitude }}</td>
                                <td class="border px-4 py-2">{{ $hospital->longitude }}</td>
                                <td class="border px-4 py-2">{{ $hospital->phone }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('state').addEventListener('change', function () {
            const stateId = this.value;
            const lgaSelect = document.getElementById('lga');
            lgaSelect.innerHTML = '<option value="" selected disabled>Select LGA</option>'; // Reset LGA options

            fetch(`/lgas/${stateId}`)
                .then(response => response.json())
                .then(data => {
                    data.lgas.forEach(lga => {
                        const option = document.createElement('option');
                        option.value = lga.id;
                        option.textContent = lga.name;
                        lgaSelect.appendChild(option);
                    });
                });
        });
    </script>
</x-app-layout>
