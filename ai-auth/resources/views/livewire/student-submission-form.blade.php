<div class="max-w-3xl bg-white mx-auto p-6 rounded-md">
    <div class="mr-auto place-self-center lg:col-span-7">
        <h1
            class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">
            Enter your details below
        </h1>
    </div>
    @if($result)
        <div class="mt-4 p-4 bg-gray-100 rounded-md">
            <h2 class="text-lg font-medium text-gray-900">Result</h2>
            <p class="mt-2 text-sm text-gray-700">{{ $result }}</p>
            @if($errorMessages)
                <ul class="mt-2 list-disc list-inside text-sm text-red-600">
                    @foreach($errorMessages as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endif
    <form wire:submit.prevent="submit" class="space-y-4 {{ ($success == 1) ? 'hidden' : '' }}">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" wire:model="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" wire:model="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
            <input type="text" id="phone" wire:model="phone" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <div>
            <label for="jamb_score" class="block text-sm font-medium text-gray-700">JAMB Score</label>
            <input type="number" id="jamb_score" wire:model="jamb_score" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <div>
            <label for="course_applied" class="block text-sm font-medium text-gray-700">Course Applied</label>
            <select id="course_applied" wire:model="course_applied" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">Select Course</option>
                @foreach($courses as $course)
                    <option value="{{ $course }}">{{ $course }}</option>
                @endforeach
            </select>
        </div>

        @foreach($o_level_subjects as $index => $subject)
            <div class="flex items-center space-x-4">
                <div class="flex-1">
                    <label for="o_level_subject_{{ $index }}" class="block text-sm font-medium text-gray-700">O-Level Subject {{ $index + 1 }}</label>
                    <select id="o_level_subject_{{ $index }}" wire:model="o_level_subjects.{{ $index }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Select Subject</option>
                        <option value="English">English</option>
                        <option value="Mathematics">Mathematics</option>
                        <option value="Biology">Biology</option>
                        <option value="Chemistry">Chemistry</option>
                        <option value="Physics">Physics</option>
                        <option value="Geography">Geography</option>
                        <option value="Economics">Economics</option>
                        <option value="Government">Government</option>
                        <!-- Add more subjects as needed -->
                    </select>
                </div>

                <div class="flex-1">
                    <label for="o_level_grade_{{ $index }}" class="block text-sm font-medium text-gray-700">Grade</label>
                    <select id="o_level_grade_{{ $index }}" wire:model="o_level_grades.{{ $index }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Select Grade</option>
                        <option value="A1">A1</option>
                        <option value="B2">B2</option>
                        <option value="B3">B3</option>
                        <option value="C4">C4</option>
                        <option value="C5">C5</option>
                        <option value="C6">C6</option>
                        <option value="D7">D7</option>
                        <option value="E8">E8</option>
                        <option value="F9">F9</option>
                    </select>
                </div>

                <button type="button" wire:click="removeSubject({{ $index }})" class="mt-5 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                    Remove
                </button>
            </div>
        @endforeach
        <div>
            <button type="button" wire:click="addSubject" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                Add Subject
            </button>
        </div>

        

        <div>
            <div wire:loading>
                <p class="text-sm text-gray-600">Loading...</p>
            </div>
        </div>

        <div>
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:border-green-700 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                Submit
            </button>
        </div>
    </form>

    {{-- @if($result)
        <div class="mt-4 p-4 bg-gray-100 border border-gray-200 rounded-md">
            <h2 class="text-lg font-medium text-gray-800">Result</h2>
            <p class="text-gray-600">{{ $result }}</p>
        </div>
    @endif --}}
</div>
