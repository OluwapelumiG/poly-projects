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
                    
                    <div class="container mx-auto py-12">
                        <div class="bg-white shadow-lg rounded-lg p-6">
                            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Child Abuse Reports</h2>
                            
                            <!-- Reports Table -->
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600">#</th>
                                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600">Reporter</th>
                                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600">Child Name</th>
                                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600">Abuse Type</th>
                                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600">Status</th>
                                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-center text-sm font-semibold text-gray-600">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reports as $report)
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $loop->iteration }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $report->reporter_name }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $report->child_name }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ ucfirst($report->abuse_type) }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ ucfirst($report->status) }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200 text-center">
                                            <button onclick="openModal({{ $report }})" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-700">View Details</button>
                                            <form action="{{ route('reports.markTreated', $report->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-green-700">Mark as Treated</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <!-- Modal -->
                    <div id="report-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden w-full max-w-2xl">
                            <div class="p-6">
                                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Report Details</h2>
                                <div id="modal-content">
                                    <!-- Report details will be dynamically inserted here -->
                                </div>
                                <button onclick="closeModal()" class="mt-4 bg-red-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-700">Close</button>
                            </div>
                        </div>
                    </div>
                    
                    <script>
                        function openModal(report) {
                            const modal = document.getElementById('report-modal');
                            const modalContent = document.getElementById('modal-content');

                            const reportDetails = `
                                <p><strong>Reporter Name:</strong> ${report.reporter_name}</p>
                                <p><strong>Reporter Contact:</strong> ${report.reporter_contact}</p>
                                <p><strong>Relationship to Child:</strong> ${report.reporter_relationship}</p>
                                <p><strong>Child Name:</strong> ${report.child_name}</p>
                                <p><strong>Child DOB:</strong> ${report.child_dob}</p>
                                <p><strong>Child Gender:</strong> ${report.child_gender}</p>
                                <p><strong>Child Address:</strong> ${report.child_address}</p>
                                <p><strong>Type of Abuse:</strong> ${report.abuse_type}</p>
                                <p><strong>Description of Abuse:</strong> ${report.abuse_description}</p>
                                <p><strong>Date and Time of Incident:</strong> ${report.abuse_date_time}</p>
                                <p><strong>Location of Incident:</strong> ${report.abuse_location}</p>
                                <p><strong>Perpetrator Details:</strong> ${report.perpetrator_details}</p>
                                <p><strong>Status:</strong> ${report.status}</p>
                                <form action="/reports/${report.id}/markInvestigated" method="POST" class="mt-4">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-yellow-700">Mark as Investigated</button>
                                </form>
                            `;

                            modalContent.innerHTML = reportDetails;
                            modal.classList.remove('hidden');
                        }

                        function closeModal() {
                            const modal = document.getElementById('report-modal');
                            modal.classList.add('hidden');
                        }
                    </script>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
