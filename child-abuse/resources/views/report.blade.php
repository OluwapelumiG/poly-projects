<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child Abuse Report Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto py-12">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="py-4 px-6">
            <h2 class="text-2xl font-semibold text-gray-800 text-center">Child Abuse Report Form</h2>
            <form action="{{ route('reports.store') }}" method="POST" class="mt-6" enctype="multipart/form-data">
                @csrf
                
                <!-- Reporter Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="reporter_name" class="block text-sm font-medium text-gray-700">Reporter Name</label>
                        <input type="text" name="reporter_name" id="reporter_name" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-indigo-300">
                    </div>
                    <div>
                        <label for="reporter_contact" class="block text-sm font-medium text-gray-700">Reporter Contact</label>
                        <input type="text" name="reporter_contact" id="reporter_contact" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-indigo-300">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="reporter_relationship" class="block text-sm font-medium text-gray-700">Relationship to Child</label>
                    <input type="text" name="reporter_relationship" id="reporter_relationship" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-indigo-300">
                </div>

                <!-- Child Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="child_name" class="block text-sm font-medium text-gray-700">Child Name</label>
                        <input type="text" name="child_name" id="child_name" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-indigo-300">
                    </div>
                    <div>
                        <label for="child_dob" class="block text-sm font-medium text-gray-700">Child Date of Birth</label>
                        <input type="date" name="child_dob" id="child_dob" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-indigo-300">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="child_gender" class="block text-sm font-medium text-gray-700">Child Gender</label>
                    <select name="child_gender" id="child_gender" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-indigo-300">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="child_address" class="block text-sm font-medium text-gray-700">Child Address</label>
                    <input type="text" name="child_address" id="child_address" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-indigo-300">
                </div>

                <!-- Abuse Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="abuse_type" class="block text-sm font-medium text-gray-700">Type of Abuse</label>
                        <select name="abuse_type" id="abuse_type" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-indigo-300">
                            <option value="physical">Physical</option>
                            <option value="emotional">Emotional</option>
                            <option value="sexual">Sexual</option>
                            <option value="neglect">Neglect</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label for="abuse_date_time" class="block text-sm font-medium text-gray-700">Date and Time of Incident</label>
                        <input type="datetime-local" name="abuse_date_time" id="abuse_date_time" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-indigo-300">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="abuse_description" class="block text-sm font-medium text-gray-700">Description of Abuse</label>
                    <textarea name="abuse_description" id="abuse_description" rows="4" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-indigo-300"></textarea>
                </div>
                <div class="mb-4">
                    <label for="abuse_location" class="block text-sm font-medium text-gray-700">Location of Incident</label>
                    <input type="text" name="abuse_location" id="abuse_location" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-indigo-300">
                </div>
                <div class="mb-4">
                    <label for="perpetrator_details" class="block text-sm font-medium text-gray-700">Perpetrator Details</label>
                    <textarea name="perpetrator_details" id="perpetrator_details" rows="4" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-indigo-300"></textarea>
                </div>

                <!-- Additional Information -->
                <div class="grid grid-cols-1  mb-4">
                    {{-- <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="status" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-indigo-300">
                            <option value="pending">Pending</option>
                            <option value="investigated">Investigated</option>
                            <option value="resolved">Resolved</option>
                        </select>
                    </div> --}}
                    <div>
                        <label for="supporting_documents" class="block text-sm font-medium text-gray-700">Supporting Documents</label>
                        <input type="file" name="supporting_documents" id="supporting_documents" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-indigo-300">
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded-md shadow-md hover:bg-indigo-700">Submit Report</button>
                    <a href="/" class="bg-gray-100 text-black py-2 px-4 rounded-md shadow-md hover:bg-gray-200">Close</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
