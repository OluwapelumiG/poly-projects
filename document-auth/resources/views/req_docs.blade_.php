<x-app-layout x-data="{ open: false, showModal: false }">
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
    </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-row justify-between">
                        <h2 class="text-2xl font-bold mb-4">Required Documents</h2>
                        <div class="flex justify-end p-4">
                            <button @click="showModalx = true" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                                Add Document
                            </button>
                        </div>
                    </div>


                    @foreach($req_docs as $document)
                    <div class="flex items-center justify-between py-2">
                        <div class="flex items-center w-3/4 space-x-4">
                            <!-- Document Icon (optional based on file type) -->

                            @if($document->file_type == 'pdf')
                            <svg class="w-20 h-20" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                <g>
                                    <line class="t" x1="28.4318" y1="12.9115" x2="30.5405" y2="12.9115"></line>
                                    <line class="t" x1="28.4318" y1="15.0202" x2="29.8024" y2="15.0202"></line>
                                    <line class="t" x1="28.4318" y1="12.9115" x2="28.4318" y2="17.1289"></line>
                                </g>
                                <path class="t" d="M23.5849,17.129v-4.2174h.6853c1.1598,0,2.1087,.9489,2.1087,2.1087h0c0,1.1598-.9489,2.1087-2.1087,2.1087h-.6853Z"></path>
                                <g>
                                    <path class="t" d="M18.9045,16.8963v-4.2174h1.3707c.7908,0,1.4234,.6326,1.4234,1.4234s-.6326,1.4234-1.4234,1.4234h-1.3707"></path>
                                </g>
                                <path class="t" d="M16.6627,35.6723h7.6508"></path>
                                <path class="t" d="M16.6921,32.6919h13.7214"></path>
                                <path class="t" d="M16.6921,29.5563h16.1546"></path>
                                <rect class="t" x="12.8772" y="9.2878" width="23.3737" height="30.0519" rx="2.0054" ry="2.0054"></rect>
                                <path class="t" d="M13.2512,5.4749H7.0302v6.3715"></path>
                                <path class="t" d="M34.7237,5.4749h6.3214v6.3715"></path>
                                <path class="t" d="M41.0451,36.2288v6.2963h-6.3214"></path>
                                <path class="t" d="M13.2512,42.5251H7.0302v-6.2963"></path>
                                <path class="t" d="M5.5,24.0878H42.5"></path>
                                <path class="t" d="M16.6627,20.7264h16.1546"></path>
                                <path class="t" d="M16.6921,25.919h16.1546"></path>
                            </svg>
                            @elseif($document->file_type == 'doc' || $document->file_type == 'docx')
                            <svg class="w-20 h-20" fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 548.291 548.291" xml:space="preserve">
                                <g>
                                    <path d="M486.201,196.121h-13.166v-63.525c0-0.399-0.062-0.795-0.115-1.2c-0.021-2.522-0.825-5-2.552-6.96L364.657,3.675c-0.033-0.031-0.064-0.042-0.085-0.073c-0.63-0.704-1.364-1.292-2.143-1.796c-0.229-0.157-0.461-0.286-0.702-0.419c-0.672-0.365-1.387-0.672-2.121-0.893c-0.2-0.052-0.379-0.134-0.577-0.188C358.23,0.118,357.401,0,356.562,0H96.757C84.894,0,75.256,9.649,75.256,21.502v174.613H62.092c-16.971,0-30.732,13.756-30.732,30.73v159.81c0,16.966,13.761,30.736,30.732,30.736h13.164V526.79c0,11.854,9.638,21.501,21.501,21.501h354.776c11.853,0,21.501-9.647,21.501-21.501V417.392h13.166c16.966,0,30.729-13.764,30.729-30.731v-159.81C516.93,209.877,503.167,196.121,486.201,196.121z M96.757,21.507h249.054v110.006c0,5.94,4.817,10.751,10.751,10.751h94.972v53.861H96.757V21.507z M367.547,335.847c7.843,0,16.547-1.701,21.666-3.759l3.916,20.301c-4.768,2.376-15.509,4.949-29.493,4.949c-39.748,0-60.204-24.73-60.204-57.472c0-39.226,27.969-61.055,62.762-61.055c13.465,0,23.705,2.737,28.31,5.119l-5.285,20.64c-5.287-2.226-12.615-4.263-21.832-4.263c-20.641,0-36.663,12.444-36.663,38.027C330.718,321.337,344.362,335.847,367.547,335.847z M291.647,296.97c0,37.685-22.854,60.537-56.444,60.537c-34.113,0-54.066-25.759-54.066-58.495c0-34.447,21.995-60.206,55.94-60.206C272.39,238.806,291.647,265.248,291.647,296.97z M67.72,355.124V242.221c9.552-1.532,21.999-2.375,35.13-2.375c21.83,0,35.981,3.916,47.055,12.276c11.945,8.863,19.455,23.021,19.455,43.311c0,21.994-8.017,37.181-19.105,46.556c-12.111,10.058-30.528,14.841-53.045,14.841C83.749,356.825,74.198,355.968,67.72,355.124z M451.534,520.968H96.757V417.392h354.776V520.968z M471.245,355.627l-10.409-20.804c-4.263-8.012-6.992-13.99-10.231-20.636h-0.342c-2.388,6.656-5.28,12.624-8.861,20.636l-9.552,20.804h-29.675l33.254-58.158l-32.054-56.786h29.849l10.058,20.984c3.413,6.979,5.963,12.614,8.694,19.092h0.335c2.729-7.332,4.955-12.446,7.843-19.092l9.721-20.984h29.683l-32.406,56.103l34.105,58.841H471.245z"></path>
                                    <path d="M141.729,293.372c0,18.614-10.23,28.669-23.782,28.669c-6.335,0-10.351-0.558-12.439-1.113v-54.503c2.388-0.558,5.967-0.838,10.645-0.838C131.661,265.588,141.729,275.105,141.729,293.372z"></path>
                                    <path d="M252.013,296.053c0,14.497-6.375,31.63-22.787,31.63c-12.44,0-19.094-12.793-19.094-29.587c0-30.885,14.309-33.513,21.14-33.513C247.899,264.583,252.013,283.38,252.013,296.053z"></path>
                                </g>
                            </svg>
                            @elseif($document->file_type == 'txt')
                            <svg class="w-20 h-20" width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2 6C2 3.79086 3.79086 2 6 2H14.586C15.116 2 15.624 2.21071 16 2.58579L20.4142 7C20.7893 7.375 21 7.88379 21 8.41421V18C21 20.2091 19.2091 22 17 22H6C3.79086 22 2 20.2091 2 18V6ZM9.99334 10.1097L8.45666 12.586L9.99334 15.0623C10.3312 15.6488 10.124 16.3902 9.53752 16.728C8.951 17.0659 8.20958 16.8587 7.87172 16.2722L6.62172 14.2115C6.36312 13.7614 6.36312 13.1892 6.62172 12.7391L7.87172 10.6784C8.20958 10.0919 8.951 9.88466 9.53752 10.2225C10.124 10.5604 10.3312 11.3018 9.99334 11.8883ZM12.7785 10.1097L11.2418 12.586L12.7785 15.0623C13.1164 15.6488 12.9092 16.3902 12.3227 16.728C11.7362 17.0659 10.9947 16.8587 10.6569 16.2722L9.40686 14.2115C9.14826 13.7614 9.14826 13.1892 9.40686 12.7391L10.6569 10.6784C10.9947 10.0919 11.7362 9.88466 12.3227 10.2225C12.9092 10.5604 13.1164 11.3018 12.7785 11.8883ZM15.5637 10.1097L14.027 12.586L15.5637 15.0623C15.9016 15.6488 15.6944 16.3902 15.1079 16.728C14.5214 17.0659 13.7799 16.8587 13.442 16.2722L12.192 14.2115C11.9334 13.7614 11.9334 13.1892 12.192 12.7391L13.442 10.6784C13.7799 10.0919 14.5214 9.88466 15.1079 10.2225C15.6944 10.5604 15.9016 11.3018 15.5637 11.8883Z" fill="#000000"></path>
                                </g>
                            </svg>
                            @elseif($document->file_type == 'jpg' || $document->type == 'jpeg' || $document->type == 'png' || $document->type == 'gif')
                            <svg class="w-20 h-20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6 2C3.79086 2 2 3.79086 2 6V18C2 20.2091 3.79086 22 6 22H18C20.2091 22 22 20.2091 22 18V6C22 3.79086 20.2091 2 18 2H6ZM4 6C4 4.89543 4.89543 4 6 4H18C19.1046 4 20 4.89543 20 6V18C20 18.721 19.6764 19.3573 19.1569 19.7565L14.828 15.2929C13.8474 14.3152 12.2307 14.3152 11.25 15.2929L6.84308 19.7566C6.32361 19.3573 6 18.721 6 18V6ZM15.5355 16.7071L19.2836 19.875C18.8342 20.285 18.2453 20.5 17.6203 20.5H6.37974C5.75466 20.5 5.16584 20.285 4.71643 19.875L8.46447 16.7071C9.24505 15.9249 10.4611 15.9249 11.2417 16.7071L12.75 18.2232L14.2583 16.7071C15.0389 15.9249 16.255 15.9249 17.0355 16.7071ZM9 8.5C9 7.39543 9.89543 6.5 11 6.5C12.1046 6.5 13 7.39543 13 8.5C13 9.60457 12.1046 10.5 11 10.5C9.89543 10.5 9 9.60457 9 8.5Z" fill="#000000"></path>
                                </g>
                            </svg>
                            @endif

                            <!-- Document Title -->
                            <div>
                                <div class="text-lg font-semibold">{{ $document->document }}</div>
                                <div class="text-gray-500">{{ Str::ucfirst($document->max_size ) }}</div>
                            </div>
                        </div>



                    </div>
                    @endforeach

                    @if($req_docs->isEmpty())
                    <p class="text-gray-400">No required documents found.</p>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <div x-show="showModalx" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="showModalx" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>

            <div x-show="showModalx" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Add New Document
                            </h3>
                            <div class="mt-2">
                                <input type="text" wire:model="title" placeholder="Document Title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <input type="file" wire:model="file" class="mt-3 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button @click="$wire.save(); showModalx = false" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Save
                    </button>
                    <button @click="showModalx = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('closeModalx', event => {
            showModalx = false;
        });
    </script>


</x-app-layout>