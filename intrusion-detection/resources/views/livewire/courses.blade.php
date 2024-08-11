<div>
    @if (!$isVerified)
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
                        class="form-input mt-1 block w-full">
                    @error('answer')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Verify</button>
            </form>
        </div>
    @endif

    @if ($isVerified)
        <p class="text-green-600">Verified to access Courses</p>
        <!-- Place the content for the Courses page here -->
    @endif
</div>
