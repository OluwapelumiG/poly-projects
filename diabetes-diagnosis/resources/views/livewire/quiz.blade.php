<div class="relative mx-auto block min-h-full w-full shrink-0 grow basis-auto px-10 mb-24 transition duration-200 content-width" style="max-width: 1024px;">
    <div style="font-family: var(--font-family-nunito-sans);">
        
        @if (!$prev_result)
            
        
            <div class="">
                <div class="flex flex-col">
                    <div class="">
                        {{-- <h1 class="mb-2 mt-14 text-left text-gray-L800 dark:text-gray-D200 heading-one tracking-tight" id="page-title">Diabetes Diagnosis</h1> --}}
                    </div>
                    <div class="flex flex-col justify-between sm:flex-row">
                        <div class="flex flex-col" style="max-width: 730px;">
                            <div class="flex-1 whitespace-pre-line" data-testid="summary-description">
                                <p class="body-medium mt-0">Answer the following questions to determine your risk of having diabetes.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="block">
                <div id="viewer-component-LXoLeizasTjy8B9eKQMuX" class="">
                    <div class="clear-both relative">
                        <div>
                            <div>
                                <div>
                                    <div tabindex="0" style="outline: none;">
                                        <div>
                                            <div>
                                                <div id="widget-parent-LXoLeizasTjy8B9eKQMuX" class="">
                                                    <div class="my-4">
                                                        <div class="quiz-view-mode">
                                                            <div>
                                                                <div class="flex flex-col">
                                                                    <div class="mt-4 flex items-center px-5 py-2.5 sm:items-stretch">
                                                                        <div class="flex flex-col">
                                                                            <div class="mb-1 mr-2.5 flex h-10 cursor-pointer items-center justify-center self-center rounded font-semibold sm:mb-0 sm:mr-4 sm:mt-1 sm:self-auto bg-black dark:bg-gray-D1200 relative w-10 text-sm uppercase tracking-widest text-white shadow-md">
                                                                                {{ $currentQuestion + 1 }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2.5 flex w-full max-w-full items-center justify-between overflow-x-auto">
                                                                            <div class="h-auto w-full whitespace-normal after:clear-both after:table after:content-none markdown-container-div">
                                                                                <span class="text-base">
                                                                                    <span class="markdownViewerQuiz markdown-table quiz-viewer markdown-viewer markdown-default" role="none">
                                                                                        <p>{{ $questions[$currentQuestion]->question }}</p>
                                                                                    </span>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex flex-wrap">
                                                                        <div wire:click="nextQuestion(true)" class="hover:bg-green-500 question-option-view relative flex w-full cursor-pointer flex-row items-center border-2 border-solid py-2.5 duration-200 question-option-view-hover">
                                                                            <div class="flex items-start justify-center" style="min-width: 4.375rem;">
                                                                                <div class="mt-2 duration-200">
                                                                                    <svg fill="transparent" height="24" viewBox="0 0 24 24" width="24">
                                                                                        <circle class="stroke-none" cx="12" cy="12" r="10"></circle>
                                                                                        <circle class="fill-none" cx="12" cy="12" r="6" stroke-width="0"></circle>
                                                                                    </svg>
                                                                                </div>
                                                                            </div>
                                                                            <span class="heading-six m-0">A)</span>
                                                                            <div class="w-full overflow-x-auto px-2.5 text-base leading-8" style="max-width: 80%;">
                                                                                <div class="h-auto w-full whitespace-normal after:clear-both after:table after:content-none markdown-container-div">
                                                                                    <span class="text-base">
                                                                                        <span class="markdownViewerQuiz markdown-table quiz-viewer markdown-viewer markdown-default" role="none">
                                                                                            <p>True</p>
                                                                                        </span>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div wire:click="nextQuestion(false)" class="hover:bg-green-500 question-option-view relative flex w-full cursor-pointer flex-row items-center border-2 border-solid py-2.5 duration-200 question-option-view-hover">
                                                                            <div class="flex items-start justify-center" style="min-width: 4.375rem;">
                                                                                <div class="mt-2 duration-200">
                                                                                    <svg fill="transparent" height="24" viewBox="0 0 24 24" width="24">
                                                                                        <circle class="stroke-none" cx="12" cy="12" r="10"></circle>
                                                                                        <circle class="fill-none" cx="12" cy="12" r="6" stroke-width="0"></circle>
                                                                                    </svg>
                                                                                </div>
                                                                            </div>
                                                                            <span class="heading-six m-0">B)</span>
                                                                            <div class="w-full overflow-x-auto px-2.5 text-base leading-8" style="max-width: 80%;">
                                                                                <div class="h-auto w-full whitespace-normal after:clear-both after:table after:content-none markdown-container-div">
                                                                                    <span class="text-base">
                                                                                        <span class="markdownViewerQuiz markdown-table quiz-viewer markdown-viewer markdown-default" role="none">
                                                                                            <p>False</p>
                                                                                        </span>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sm:flex-no-wrap flex flex-wrap items-center px-4 border-0 border-t border-solid border-gray-L300 dark:border-gray-D1200 bg-gray-L50 dark:bg-gray-D1400 lg:justify-between justify-between flex-row" style="min-height: 4rem;">
                    <div class="flex">
                        <button wire:click="resetQuiz" class="flex outlined-default m-2 !bg-white py-2 dark:!bg-transparent dark:hover:!bg-gray-D1000">
                            
                            <svg class="m-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-right h-4 w-4">
                                <polyline points="23 4 23 10 17 10"></polyline>
                                <path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"></path>
                            </svg>
                            <span class="m-1">Reset Quiz</span>
                        </button>
                    </div>
                    <div class="flex items-center">
                        {{-- <button class="Button_button__K1kqF Button_circle-button__Blq4X -order-1 sm:order-none Button_disabled__u3xQC Button_quiz-widget-controls__XNh6R" disabled>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 flex-shrink-0">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg>
                        </button> --}}
                        <span class="mx-4 whitespace-nowrap">Question {{ $currentQuestion + 1 }} of {{ count($questions) }}</span>
                    </div>
                        <button wire:click="submitQuiz" class="contained-primary m-2 p-2" @if ($currentQuestion >= count($questions)) disabled @endif>
                            <span>Submit Answer</span>
                        </button>
                    {{-- </div> --}}
                </div>
            </div>
        @else
        <div class="relative mx-auto block min-h-full w-full shrink-0 grow basis-auto px-10 mb-24 transition duration-200 content-width" style="max-width: 1024px;">
            <div style="font-family: var(--font-family-nunito-sans);">
                <div class="mb-5">
                    <div class="flex flex-col">
                        <div class="">
                            <h1 class="mb-2 mt-14 text-left text-gray-L800 dark:text-gray-D200 heading-one tracking-tight" id="page-title">Result</h1>
                        </div>
                    </div>
                </div>
        
                <div class="block">
                    <div id="quiz-result" class="mt-5">
                        <div class="clear-both relative">
                            <div>
                                <div>
                                    <div>
                                        <div tabindex="0" style="outline: none;">
                                            <div>
                                                <div>
                                                    <div id="quiz-result-content" class="">
                                                        <div class="my-7">
                                                            <div class="quiz-result-mode">
                                                                <div>
                                                                    <div class="flex flex-col">
                                                                        <div class="mt-4 flex items-center px-5 py-2.5 sm:items-stretch">
                                                                            <div class="flex flex-col bg-black text-white px-2 py-1 rounded-md shadow-lg">
                                                                                Score
                                                                            </div>
                                                                            <div class="mb-2.5 py-1 mx-2 flex w-full max-w-full items-center justify-between overflow-x-auto">
                                                                                <div class="h-auto w-full whitespace-normal after:clear-both after:table after:content-none markdown-container-div">
                                                                                    <span class="text-base">
                                                                                        <span class="markdownViewerQuiz markdown-table quiz-viewer markdown-viewer markdown-default" role="none">
                                                                                            <p>{{ $prev_result->score }}%</p>
                                                                                        </span>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mt-4 flex items-center px-5 py-2.5 sm:items-stretch">
                                                                            <div class="flex flex-col bg-black text-white px-2 py-1 rounded-md shadow-lg">
                                                                                Diabetes Possibility
                                                                            </div>
                                                                            <div class="mb-2.5 py-1 mx-2 flex w-full max-w-full items-center justify-between overflow-x-auto">
                                                                                <div class="h-auto w-full whitespace-normal after:clear-both after:table after:content-none markdown-container-div">
                                                                                    <span class="text-base">
                                                                                        <span class="markdownViewerQuiz markdown-table quiz-viewer markdown-viewer markdown-default" role="none">
                                                                                            <p>{{ $prev_result->has_diabetes ? 'High' : 'Low' }}</p>
                                                                                        </span>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @if ($prev_result->has_diabetes)
                                                                            <div class="mt-4 flex items-center px-5 py-2.5 sm:items-stretch">
                                                                                <div class="flex flex-col bg-black text-white px-2 py-1 rounded-md shadow-lg">
                                                                                    Advice
                                                                                </div>
                                                                                <div class="mb-2.5 py-1 mx-2 flex w-full max-w-full items-center justify-between overflow-x-auto">
                                                                                    <div class="h-auto w-full whitespace-normal after:clear-both after:table after:content-none markdown-container-div">
                                                                                        <span class="text-base">
                                                                                            <span class="markdownViewerQuiz markdown-table quiz-viewer markdown-viewer markdown-default" role="none">
                                                                                                <p>Visit the nearest hospital for further evaluation and treatment.</p>
                                                                                            </span>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @else
                                                                            <div class="mt-4 flex items-center px-5 py-2.5 sm:items-stretch">
                                                                                <div class="flex flex-col bg-black text-white px-2 py-1 rounded-md shadow-lg">
                                                                                    Advice
                                                                                </div>
                                                                                <div class="mb-2.5 py-1 mx-2 flex w-full max-w-full items-center justify-between overflow-x-auto">
                                                                                    <div class="h-auto w-full whitespace-normal after:clear-both after:table after:content-none markdown-container-div">
                                                                                        <span class="text-base">
                                                                                            <span class="markdownViewerQuiz markdown-table quiz-viewer markdown-viewer markdown-default" role="none">
                                                                                                <p>Follow these tips to prevent diabetes:
                                                                                                    <ul class="list-disc pl-5">
                                                                                                        <li>Eat a balanced diet rich in fruits, vegetables, and whole grains.</li>
                                                                                                        <li>Exercise regularly (at least 30 minutes most days).</li>
                                                                                                        <li>Maintain a healthy weight.</li>
                                                                                                        <li>Avoid smoking and limit alcohol consumption.</li>
                                                                                                        <li>Monitor your blood sugar levels regularly if you are at risk.</li>
                                                                                                    </ul>
                                                                                                </p>
                                                                                            </span>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endif

                                                                        <div class="mt-4 flex items-center px-5 py-2.5 sm:items-stretch">
                                                                            <button wire:click="deleteResult" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                                                                                Delete Result and Retake Quiz
                                                                            </button>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        @endif
    </div>
</div>
