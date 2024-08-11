<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto px-4">
                        <h2 class="text-2xl font-bold mb-6">User Enrollment</h2>
                        <form method="POST" action="{{ route('user_enrollment.store') }}" class="space-y-4">
                            @csrf

                            <div class="flex flex-col space-y-2">
                                <label for="name" class="text-sm font-medium text-gray-700">Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-input rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                    required>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email"
                                    class="form-input rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                    required>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="password" class="text-sm font-medium text-gray-700">Password</label>
                                <input type="password" name="password" id="password"
                                    class="form-input rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                    required>
                            </div>

                            <div class="flex flex-col space-y-2">
                                <label for="password_confirmation" class="text-sm font-medium text-gray-700">Confirm
                                    Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-input rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                    required>
                            </div>

                            @foreach ($securityQuestions as $question)
                                <div class="flex flex-col space-y-2">
                                    <label for="security_question_{{ $question->id }}"
                                        class="text-sm font-medium text-gray-700">{{ $question->question }}</label>
                                    <input type="hidden" name="security_questions[]" value="{{ $question->id }}">
                                    <input type="text" name="security_answers[]"
                                        id="security_question_{{ $question->id }}"
                                        class="form-input rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                        required>
                                </div>
                            @endforeach

                            <button type="submit"
                                class="w-full py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition ease-in-out duration-150">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
