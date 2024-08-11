<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\SecurityQuestion;
use App\Models\UserSecurityAnswer;

class Profile extends Component
{
    public $questions;
    public $selectedQuestionId;
    public $answer;
    public $isVerified = false;

    protected $rules = [
        'selectedQuestionId' => 'required|exists:security_questions,id',
        'answer' => 'required|string'
    ];

    public function mount()
    {
        // Retrieve all security questions for selection
        $this->questions = SecurityQuestion::all();
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
        } else {
            $this->addError('answer', 'The answer is incorrect.');
        }
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
