<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-row justify-between">
                        <h2 class="text-2xl font-bold mb-4">Required Documents</h2>
                        <div class="flex justify-end p-4">
                            <button id="openModalButton" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                                Add New Required Document
                            </button>
                        </div>
                    </div>

                    @foreach ($req_docs as $document)
                        <div class="flex items-center justify-between py-2">
                            <div class="flex items-center w-3/4 space-x-4">
                                <!-- Document Icon -->
                                @if ($document->file_type == 'pdf')
                                    <svg class="w-20 h-20" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"
                                        fill="#000000">
                                        <g>
                                            <line class="t" x1="28.4318" y1="12.9115" x2="30.5405"
                                                y2="12.9115"></line>
                                            <line class="t" x1="28.4318" y1="15.0202" x2="29.8024"
                                                y2="15.0202"></line>
                                            <line class="t" x1="28.4318" y1="12.9115" x2="28.4318"
                                                y2="17.1289"></line>
                                        </g>
                                        <path class="t"
                                            d="M23.5849,17.129v-4.2174h.6853c1.1598,0,2.1087,.9489,2.1087,2.1087h0c0,1.1598-.9489,2.1087-2.1087,2.1087h-.6853Z">
                                        </path>
                                        <g>
                                            <path class="t"
                                                d="M18.9045,16.8963v-4.2174h1.3707c.7908,0,1.4234,.6326,1.4234,1.4234s-.6326,1.4234-1.4234,1.4234h-1.3707">
                                            </path>
                                        </g>
                                        <path class="t" d="M16.6627,35.6723h7.6508"></path>
                                        <path class="t" d="M16.6921,32.6919h13.7214"></path>
                                        <path class="t" d="M16.6921,29.5563h16.1546"></path>
                                        <rect class="t" x="12.8772" y="9.2878" width="23.3737" height="30.0519"
                                            rx="2.0054" ry="2.0054"></rect>
                                        <path class="t" d="M13.2512,5.4749H7.0302v6.3715"></path>
                                        <path class="t" d="M34.7237,5.4749h6.3214v6.3715"></path>
                                        <path class="t" d="M41.0451,36.2288v6.2963h-6.3214"></path>
                                        <path class="t" d="M13.2512,42.5251H7.0302v-6.2963"></path>
                                        <path class="t" d="M5.5,24.0878H42.5"></path>
                                        <path class="t" d="M16.6627,20.7264h16.1546"></path>
                                        <path class="t" d="M16.6921,25.919h16.1546"></path>
                                    </svg>
                                @elseif ($document->file_type == 'jpg' || $document->file_type == 'jpeg')
                                    <svg class="w-20 h-20" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M6 2C3.79086 2 2 3.79086 2 6V18C2 20.2091 3.79086 22 6 22H18C20.2091 22 22 20.2091 22 18V6C22 3.79086 20.2091 2 18 2H6ZM4 6C4 4.89543 4.89543 4 6 4H18C19.1046 4 20 4.89543 20 6V18C20 18.721 19.6764 19.3573 19.1569 19.7565L14.828 15.2929C13.8474 14.3152 12.2307 14.3152 11.25 15.2929L6.84308 19.7566C6.32361 19.3573 6 18.721 6 18V6ZM15.5355 16.7071L19.2836 19.875C18.8342 20.285 18.2453 20.5 17.6203 20.5H6.37974C5.75466 20.5 5.16584 20.285 4.71643 19.875L8.46447 16.7071C9.24505 15.9249 10.4611 15.9249 11.2417 16.7071L12.75 18.2232L14.2583 16.7071C15.0389 15.9249 16.255 15.9249 17.0355 16.7071ZM9 8.5C9 7.39543 9.89543 6.5 11 6.5C12.1046 6.5 13 7.39543 13 8.5C13 9.60457 12.1046 10.5 11 10.5C9.89543 10.5 9 9.60457 9 8.5Z"
                                            fill="#000000" />
                                    </svg>
                                @elseif ($document->file_type == 'png')
                                    <svg class="w-20 h-20" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M6 2C3.79086 2 2 3.79086 2 6V18C2 20.2091 3.79086 22 6 22H18C20.2091 22 22 20.2091 22 18V6C22 3.79086 20.2091 2 18 2H6ZM4 6C4 4.89543 4.89543 4 6 4H18C19.1046 4 20 4.89543 20 6V18C20 18.721 19.6764 19.3573 19.1569 19.7565L14.828 15.2929C13.8474 14.3152 12.2307 14.3152 11.25 15.2929L6.84308 19.7566C6.32361 19.3573 6 18.721 6 18V6ZM9.5 8.5C9.5 7.39543 10.3954 6.5 11.5 6.5C12.6046 6.5 13.5 7.39543 13.5 8.5C13.5 9.60457 12.6046 10.5 11.5 10.5C10.3954 10.5 9.5 9.60457 9.5 8.5Z"
                                            fill="#000000" />
                                    </svg>
                                @endif


                                <!-- Document Title -->
                                <div>
                                    <div class="text-lg font-semibold">{{ $document->document }}</div>
                                    <div class="text-gray-500">{{ Str::ucfirst($document->max_size) }}MB</div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @if ($req_docs->isEmpty())
                        <p class="text-gray-400">No required documents found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div id="modal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div id="modalBackground" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form id="addDocumentForm" action="{{ route('documents.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Add New Required Document
                                </h3>
                                <div class="mt-2">

                                    <input type="text" name="document_title" placeholder="Document Title"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <select name="file_type"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="png">PNG</option>
                                        <option value="jpg">JPG</option>
                                        <option value="pdf">PDF</option>
                                    </select>
                                    <input type="text" name="max_size" placeholder="Max Size"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button id="saveButton" type="submit"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Save
                        </button>
                        <button id="closeModalButton" type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openModalButton = document.getElementById('openModalButton');
            const closeModalButton = document.getElementById('closeModalButton');
            const modal = document.getElementById('modal');
            const modalBackground = document.getElementById('modalBackground');
            const saveButton = document.getElementById('saveButton');

            openModalButton.addEventListener('click', function() {
                modal.classList.remove('hidden');
            });

            closeModalButton.addEventListener('click', function() {
                modal.classList.add('hidden');
            });

            modalBackground.addEventListener('click', function() {
                modal.classList.add('hidden');
            });

            saveButton.addEventListener('click', function() {
                // Add your save functionality here
                modal.classList.add('hidden');
            });
        });
    </script>
</x-app-layout>
