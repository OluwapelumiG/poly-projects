<div>
    <button onclick="showModal()" class="bg-blue-500 text-white px-4 py-2 rounded">Add Person</button>

    <!-- Modal -->
    <div id="modal" style="display: none;">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center">
            <div class="bg-white p-8 rounded shadow-lg max-w-4xl w-full">
                <h2 class="text-2xl font-bold mb-6">Add Person</h2>

                <form wire:submit.prevent="addPerson" enctype="multipart/form-data">
                    <div class="grid grid-cols-2 gap-2">
                        <div class="mb-2">
                            <label for="id_number" class="block text-gray-700">NIN</label>
                            <input type="text" id="id_number" wire:model="id_number" class="w-full px-3 py-2 border rounded">
                            @error('id_number') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-2">
                            <label for="first_name" class="block text-gray-700">First Name</label>
                            <input type="text" id="first_name" wire:model="first_name" class="w-full px-3 py-2 border rounded">
                            @error('first_name') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-2">
                            <label for="last_name" class="block text-gray-700">Last Name</label>
                            <input type="text" id="last_name" wire:model="last_name" class="w-full px-3 py-2 border rounded">
                            @error('last_name') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-2">
                            <label for="email" class="block text-gray-700">Email</label>
                            <input type="email" id="email" wire:model="email" class="w-full px-3 py-2 border rounded">
                            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-2">
                            <label for="phone" class="block text-gray-700">Phone</label>
                            <input type="text" id="phone" wire:model="phone" class="w-full px-3 py-2 border rounded">
                            @error('phone') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-2">
                            <label for="emergency_contact_name" class="block text-gray-700">Emergency Contact Name</label>
                            <input type="text" id="emergency_contact_name" wire:model="emergency_contact_name" class="w-full px-3 py-2 border rounded">
                            @error('emergency_contact_name') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-2">
                            <label for="emergency_contact_phone" class="block text-gray-700">Emergency Contact Phone</label>
                            <input type="text" id="emergency_contact_phone" wire:model="emergency_contact_phone" class="w-full px-3 py-2 border rounded">
                            @error('emergency_contact_phone') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-2">
                            <label for="next_of_kin_name" class="block text-gray-700">Next of Kin Name</label>
                            <input type="text" id="next_of_kin_name" wire:model="next_of_kin_name" class="w-full px-3 py-2 border rounded">
                            @error('next_of_kin_name') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-2">
                            <label for="next_of_kin_phone" class="block text-gray-700">Next of Kin Phone</label>
                            <input type="text" id="next_of_kin_phone" wire:model="next_of_kin_phone" class="w-full px-3 py-2 border rounded">
                            @error('next_of_kin_phone') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-2">
                            <label for="origin" class="block text-gray-700">Origin</label>
                            <input type="text" id="origin" wire:model="origin" class="w-full px-3 py-2 border rounded">
                            @error('origin') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-2">
                            <label for="designation" class="block text-gray-700">Designation</label>
                            <input type="text" id="designation" wire:model="designation" class="w-full px-3 py-2 border rounded">
                            @error('designation') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-2">
                            <label for="department" class="block text-gray-700">Department</label>
                            <input type="text" id="department" wire:model="department" class="w-full px-3 py-2 border rounded">
                            @error('department') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-2 col-span-2">
                            <label for="photo" class="block text-gray-700">Photo</label>
                            <input type="file" id="photo" wire:model="photo" class="w-full px-3 py-2 border rounded">
                            @error('photo') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-2 col-span-2">
                            <label for="allergies" class="block text-gray-700">Allergies</label>
                            <textarea id="allergies" wire:model="allergies" class="w-full px-3 py-2 border rounded"></textarea>
                            @error('allergies') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-2">
                            <label for="disability" class="block text-gray-700">Disability</label>
                            <input type="checkbox" id="disability" wire:model="disability" class="mr-2">
                            @error('disability') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-2 col-span-2" style="display: none;" id="disability_details_container">
                            <label for="disability_details" class="block text-gray-700">Disability Details</label>
                            <input type="text" id="disability_details" wire:model="disability_details" class="w-full px-3 py-2 border rounded">
                            @error('disability_details') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" onclick="hideModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- List Persons -->
    <div class="mt-4">
        <h2 class="text-2xl font-bold mb-4">Persons</h2>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID Number</th>
                    <th class="py-2 px-4 border-b">First Name</th>
                    <th class="py-2 px-4 border-b">Last Name</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Phone</th>
                    <th class="py-2 px-4 border-b">Designation</th>
                    <th class="py-2 px-4 border-b">Department</th>
                    <th class="py-2 px-4 border-b">Photo</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($persons as $person)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $person->id_number }}</td>
                    <td class="py-2 px-4 border-b">{{ $person->first_name }}</td>
                    <td class="py-2 px-4 border-b">{{ $person->last_name }}</td>
                    <td class="py-2 px-4 border-b">{{ $person->email }}</td>
                    <td class="py-2 px-4 border-b">{{ $person->phone }}</td>
                    <td class="py-2 px-4 border-b">{{ $person->designation }}</td>
                    <td class="py-2 px-4 border-b">{{ $person->department }}</td>
                    <td class="py-2 px-4 border-b">
                        @if ($person->photo)
                        <img src="{{ Storage::url($person->photo) }}" alt="Photo" class="w-16 h-16 object-cover rounded">
                        @else
                        No Photo
                        @endif
                    </td>
                    <td class="py-2 px-4 border-b">
                        <button onclick="showViewPersonModal({{ json_encode($person) }})" class="bg-green-500 text-white px-4 py-2 rounded">View</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- View Person Modal -->
    <div id="viewPersonModal" style="display: none;">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center">
            <div class="bg-white p-8 rounded shadow-lg max-w-2xl w-full">
                <h2 class="text-2xl font-bold mb-6">View Person</h2>
                <div>
                    <p><strong>ID Number:</strong> <span id="view_id_number"></span></p>
                    <p><strong>First Name:</strong> <span id="view_first_name"></span></p>
                    <p><strong>Last Name:</strong> <span id="view_last_name"></span></p>
                    <p><strong>Email:</strong> <span id="view_email"></span></p>
                    <p><strong>Phone:</strong> <span id="view_phone"></span></p>
                    <p><strong>Emergency Contact Name:</strong> <span id="view_emergency_contact_name"></span></p>
                    <p><strong>Emergency Contact Phone:</strong> <span id="view_emergency_contact_phone"></span></p>
                    <p><strong>Next of Kin Name:</strong> <span id="view_next_of_kin_name"></span></p>
                    <p><strong>Next of Kin Phone:</strong> <span id="view_next_of_kin_phone"></span></p>
                    <p><strong>Origin:</strong> <span id="view_origin"></span></p>
                    <p><strong>Designation:</strong> <span id="view_designation"></span></p>
                    <p><strong>Department:</strong> <span id="view_department"></span></p>
                    <p><strong>Photo:</strong> <img id="view_photo" alt="Photo" class="w-16 h-16 object-cover rounded"></p>
                    <p><strong>Disability:</strong> <span id="view_disability"></span></p>
                    <p><strong>Disability Details:</strong> <span id="view_disability_details"></span></p>
                    <p><strong>Allergies:</strong> <span id="view_allergies"></span></p>
                </div>
                <div class="flex justify-end mt-4">
                    <button type="button" onclick="hideViewPersonModal()" class="bg-gray-500 text-white px-4 py-2 rounded">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showModal() {
            document.getElementById('modal').style.display = 'flex';
        }

        function hideModal() {
            document.getElementById('modal').style.display = 'none';
        }

        document.getElementById('disability').addEventListener('change', function() {
            const detailsContainer = document.getElementById('disability_details_container');
            if (this.checked) {
                detailsContainer.style.display = 'block';
            } else {
                detailsContainer.style.display = 'none';
            }
        });

        function showViewPersonModal(person) {
            document.getElementById('view_id_number').innerText = person.id_number;
            document.getElementById('view_first_name').innerText = person.first_name;
            document.getElementById('view_last_name').innerText = person.last_name;
            document.getElementById('view_email').innerText = person.email;
            document.getElementById('view_phone').innerText = person.phone;
            document.getElementById('view_emergency_contact_name').innerText = person.emergency_contact_name;
            document.getElementById('view_emergency_contact_phone').innerText = person.emergency_contact_phone;
            document.getElementById('view_next_of_kin_name').innerText = person.next_of_kin_name;
            document.getElementById('view_next_of_kin_phone').innerText = person.next_of_kin_phone;
            document.getElementById('view_origin').innerText = person.origin;
            document.getElementById('view_designation').innerText = person.designation;
            document.getElementById('view_department').innerText = person.department;
            if (person.photo) {
                document.getElementById('view_photo').src = person.photo;
            } else {
                document.getElementById('view_photo').src = '';
                document.getElementById('view_photo').alt = 'No Photo';
            }
            document.getElementById('view_disability').innerText = person.disability ? 'Yes' : 'No';
            document.getElementById('view_disability_details').innerText = person.disability_details;
            document.getElementById('view_allergies').innerText = person.allergies;

            document.getElementById('viewPersonModal').style.display = 'flex';
        }

        function hideViewPersonModal() {
            document.getElementById('viewPersonModal').style.display = 'none';
        }
    </script>
</div>
