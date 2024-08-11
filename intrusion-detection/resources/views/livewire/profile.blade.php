<div>
    @if (!$isVerified)
        <!-- Security Question Verification Form -->
        <div class="p-4 mb-4 bg-yellow-100 text-yellow-800 border border-yellow-300 rounded">
            <h3 class="text-lg font-medium">Please answer the security question to proceed</h3>
            <form wire:submit.prevent="verify">
                <div class="mb-4">
                    <label for="security-question" class="block text-sm font-medium text-gray-700">Select Security
                        Question</label>
                    <select id="security-question" wire:model.defer="selectedQuestionId"
                        class="form-select mt-1 block w-full">
                        <option value="">Select a question...</option>
                        @foreach ($questions as $question)
                            <option value="{{ $question->id }}">{{ $question->question }}</option>
                        @endforeach
                    </select>
                    @error('selectedQuestionId')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="security-answer" class="block text-sm font-medium text-gray-700">Answer</label>
                    <input type="text" id="security-answer" wire:model.defer="answer"
                        class="form-input mt-1 block w-full" />
                    @error('answer')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition ease-in-out duration-150">
                    Verify
                </button>
            </form>
        </div>
    @else
        <!-- Profile Information -->
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <livewire:profile.update-profile-information-form />
            </div>
        </div>

        <!-- Update Password -->
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <livewire:profile.update-password-form />
            </div>
        </div>

        <!-- Delete User -->
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <livewire:profile.delete-user-form />
            </div>
        </div>
    @endif
</div>
