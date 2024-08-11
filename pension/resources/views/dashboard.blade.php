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
                    <header class="bg-yellow-500 text-white py-4">
                        <div class="container mx-auto px-6">
                            <h1 class="text-2xl font-bold">Pension Management Dashboard</h1>
                        </div>
                    </header>
                    
                    <!-- Main Content -->
                    <div class="container mx-auto px-6 py-6">
                        <!-- Success and Error Messages -->
                        @if(session('success'))
                            <div class="bg-green-500 text-white p-4 rounded mb-4">
                                {{ session('success') }}
                            </div>
                        @elseif(session('error'))
                            <div class="bg-red-500 text-white p-4 rounded mb-4">
                                {{ session('error') }}
                            </div>
                        @endif
                    
                        <!-- Add Staff Button -->
                        <button id="addStaffBtn" class="bg-yellow-500 text-white py-2 px-4 rounded mb-4">Add Staff</button>
                    
                        <!-- Staff Table -->
                        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b">ID</th>
                                    <th class="py-2 px-4 border-b">Name</th>
                                    <th class="py-2 px-4 border-b">Salary</th>
                                    <th class="py-2 px-4 border-b">Years in Service</th>
                                    <th class="py-2 px-4 border-b">Total Pension</th>
                                    <th class="py-2 px-4 border-b">Balance Remaining</th>
                                    <th class="py-2 px-4 border-b">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($staff as $member)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $member->id }}</td>
                                    <td class="py-2 px-4 border-b">{{ $member->name }}</td>
                                    <td class="py-2 px-4 border-b">${{ number_format($member->salary, 2) }}</td>
                                    <td class="py-2 px-4 border-b">{{ $member->years_in_service }}</td>
                                    <td class="py-2 px-4 border-b">${{ number_format($member->total_pension, 2) }}</td>
                                    <td class="py-2 px-4 border-b">${{ number_format($member->balance, 2) }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <button onclick="openWithdrawalModal({{ $member->id }})" class="bg-yellow-500 text-white py-1 px-3 rounded">Withdraw</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Add Staff Modal -->
                    <div id="addStaffModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
                        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                            <h2 class="text-xl font-bold mb-4">Add New Staff</h2>
                            <form action="{{ route('pension.store') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="name" class="block text-gray-700">Name</label>
                                    <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded" required>
                                </div>
                                <div class="mb-4">
                                    <label for="salary" class="block text-gray-700">Salary</label>
                                    <input type="number" id="salary" name="salary" step="0.01" class="w-full p-2 border border-gray-300 rounded" required>
                                </div>
                                <div class="mb-4">
                                    <label for="years_in_service" class="block text-gray-700">Years in Service</label>
                                    <input type="number" id="years_in_service" name="years_in_service" class="w-full p-2 border border-gray-300 rounded" required>
                                </div>
                                <div class="flex justify-end">
                                    <button type="button" onclick="closeAddStaffModal()" class="bg-gray-500 text-white py-2 px-4 rounded mr-2">Cancel</button>
                                    <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded">Add Staff</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Withdrawal Modal -->
                    <div id="withdrawalModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
                        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                            <h2 class="text-xl font-bold mb-4">Withdraw from Pension</h2>
                            <form id="withdrawalForm" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="amount" class="block text-gray-700">Amount</label>
                                    <input type="number" id="amount" name="amount" step="0.01" class="w-full p-2 border border-gray-300 rounded" required>
                                </div>
                                <div class="flex justify-end">
                                    <button type="button" onclick="closeWithdrawalModal()" class="bg-gray-500 text-white py-2 px-4 rounded mr-2">Cancel</button>
                                    <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded">Withdraw</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <script>
                        function openAddStaffModal() {
                            document.getElementById('addStaffModal').classList.remove('hidden');
                        }
                    
                        function closeAddStaffModal() {
                            document.getElementById('addStaffModal').classList.add('hidden');
                        }
                    
                        function openWithdrawalModal(userId) {
                            const form = document.getElementById('withdrawalForm');
                            form.action = `/withdraw/${userId}`;
                            document.getElementById('withdrawalModal').classList.remove('hidden');
                        }
                    
                        function closeWithdrawalModal() {
                            document.getElementById('withdrawalModal').classList.add('hidden');
                        }
                    
                        document.getElementById('addStaffBtn').addEventListener('click', openAddStaffModal);
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
