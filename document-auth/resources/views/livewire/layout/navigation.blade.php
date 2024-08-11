<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\RequiredDocument;
use Illuminate\Support\Facades\Log;

new class extends Component {
    use WithFileUploads;

    public $title;
    public $file;
    public $requiredDocumentId;

    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();
        $this->redirect('/', navigate: true);
    }

    public function save(): void
    {
        // Fetch the required document from the database
        $requiredDocument = RequiredDocument::find($this->requiredDocumentId);

        if (!$requiredDocument) {
            flash()->error('Invalid document type selected.');
            return;
        }

        $max_size = $requiredDocument->max_size * 1024;

        $this->validate([
            'title' => 'required|string|max:255',
            'file' => "required|file|mimes:{$requiredDocument->file_type}|max:{$max_size}",
        ]);

        try {
            $path = $this->file->storeAs('documents', $this->file->getClientOriginalName(), 'public');

            $fileType = pathinfo($path)['extension'];

            \App\Models\Document::create([
                'title' => $this->title,
                'user_id' => auth()->id(),
                'type' => $fileType,
                'file' => $path,
                'status' => 'pending',
            ]);

            $this->reset(['title', 'file']);
            flash()->success('Document saved successfully!');
            redirect('/');
        } catch (\Exception $e) {
            Log::error('Document save failed: ' . $e->getMessage());
            flash()->error('Failed to save the document. Please try again.');
        }
    }
};
?>

<nav x-data="{ open: false, showModal: false }" class="border-b border-gray-100"
    style="background: linear-gradient(to left, green, peachpuff);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a class="flex" href="{{ route('dashboard') }}" wire:navigate>
                        <svg class="h-20" viewBox="0 0 1024 1024" class="icon" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M597.3 719.9V533.4h141.9V232.2H405.1v178H238.4l7.4 418.1h493.4V719.9z"
                                    fill="#E1F0FF"></path>
                                <path d="M606.4 543H807v161.2H606.4z" fill="#E1F0FF"></path>
                                <path
                                    d="M219 384.8h26.7v443.5H219zM583.9 520.1h26.7v207h-26.7zM802.9 520.1h26.7v207h-26.7z"
                                    fill="#446EB1"></path>
                                <path
                                    d="M583.9 700.4h245.8v26.7H583.9zM583.9 520.1h245.8v26.7H583.9zM219 802.5h517.8v25.8H219zM373.4 206.4h363.3v25.8H373.4z"
                                    fill="#446EB1"></path>
                                <path
                                    d="M713.4 206.4h25.8v103.9h-25.8zM713.4 776.3h25.8v52h-25.8zM392.4 224.4l-19.2-18.1L219 384l19.2 18.1 154.2-177.7z"
                                    fill="#446EB1"></path>
                                <path d="M379.7 214.9h25.4v177.6h-25.4z" fill="#446EB1"></path>
                                <path
                                    d="M219 384.8h186.1v25.4H219zM759.3 510v-31.6c0-29-23.6-52.5-52.5-52.6-29 0-52.5 23.6-52.6 52.6V510h-26.3v-31.6c0-43.5 35.4-78.8 78.8-78.8 43.5 0 78.8 35.4 78.8 78.8V510h-26.2z"
                                    fill="#446EB1"></path>
                                <path d="M692.7 599.4h43v43h-43z" fill="#6D9EE8"></path>
                            </g>
                        </svg>
                        <h2 class="my-auto text-xl text-white">Document Verification System</h2>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                @if (Auth::user()->name == 'Admin')
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('req_docs')" :active="request()->routeIs('req_docs')" wire:navigate>
                            {{ __('Required Documents') }}
                        </x-nav-link>
                    </div>
                @endif
            </div>

            <!-- Add Document Button -->
            <div class="flex justify-end p-4">
                <button @click="showModal = true" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                    Add Document
                </button>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                                x-on:profile-updated.window="name = $event.detail.name"></div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile')" wire:navigate>
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('req_docs')" :active="request()->routeIs('req_docs')" wire:navigate>
                {{ __('Required Documents') }}
            </x-responsive-nav-link>
        </div>
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                    x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>

    <!-- Modal for adding a document -->
    <div x-show="showModal" x-cloak class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Add Document</h2>
                <button @click="showModal = false" class="text-gray-600 hover:text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <!-- Document form -->
            <form wire:submit.prevent="save" class="space-y-4">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input wire:model.defer="title" type="text" id="title"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('title')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="requiredDocumentId" class="block text-sm font-medium text-gray-700">Document
                        Type</label>
                    <select wire:model="requiredDocumentId" id="requiredDocumentId"
                        class="mt-3 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Select Document Type</option>
                        @foreach (\App\Models\RequiredDocument::all() as $requiredDocument)
                            <option class="text-black" value="{{ $requiredDocument->id }}">
                                {{ $requiredDocument->document }} ({{ $requiredDocument->file_type }} |
                                {{ $requiredDocument->max_size }}MB)
                            </option>
                        @endforeach
                    </select>
                    @error('requiredDocumentId')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="file" class="block text-sm font-medium text-gray-700">Document</label>
                    <input wire:model.defer="file" type="file" id="file"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('file')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="button" @click="showModal = false"
                        class="mr-4 bg-gray-500 text-white px-4 py-2 rounded-md">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Save</button>
                </div>
            </form>
        </div>
    </div>
</nav>
