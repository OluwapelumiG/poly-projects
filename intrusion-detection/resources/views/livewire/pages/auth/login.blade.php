<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Models\SecurityQuestion;
use App\Models\UserSecurityAnswer;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    public $securityQuestions;
    public $selectedQuestionId;
    public $answer;
    public $isVerified = false;
    public $loggedIn = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();
        $user = Auth::user();

        $this->loggedIn = true;

        if ($user->id == 1) {
            $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
        } else {
            $this->isVerified = false;
            $this->securityQuestions = SecurityQuestion::all();
        }

        // $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    public function verify()
    {
        $this->validate();

        $user = Auth::user();
        $validAnswer = UserSecurityAnswer::where('user_id', $user->id)
            ->where('security_question_id', $this->selectedQuestionId)
            ->first();

        if ($validAnswer && $validAnswer->answer === $this->answer) {
            $this->isVerified = true;
            $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
        } else {
            Auth::logout();
            $this->redirect(route('login'));
        }
    }
}; ?>

<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    @if (!$this->loggedIn)
        <form wire:submit="login">
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full" type="password"
                    name="password" required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember" class="inline-flex items-center">
                    <input wire:model="form.remember" id="remember" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}" wire:navigate>
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    @else
        <div>
            <form wire:submit.prevent="verify">
                @csrf
                <div>
                    <x-input-label for="security_question" :value="__('Select Security Question')" />
                    <select wire:model="selectedQuestionId" id="security_question" class="block mt-1 w-full">
                        <option value="">Select a question...</option>
                        @foreach ($securityQuestions as $question)
                            <option value="{{ $question->id }}">{{ $question->question }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('selectedQuestionId')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="answer" :value="__('Answer')" />
                    <x-text-input wire:model="answer" id="answer" class="block mt-1 w-full" type="text"
                        name="answer" required />
                    <x-input-error :messages="$errors->get('answer')" class="mt-2" />
                </div>

                <x-primary-button class="mt-4">
                    {{ __('Verify') }}
                </x-primary-button>
            </form>
        </div>
    @endif

</div>
