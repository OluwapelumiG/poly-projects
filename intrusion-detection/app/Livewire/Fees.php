<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\SecurityQuestion;
use App\Models\UserSecurityAnswer;

class Fees extends Component
{
    public $questions;
    public $selectedQuestionId;
    public $answer;
    public $isVerified = false;
    public $showContent = false;

    protected $rules = [
        'selectedQuestionId' => 'required|exists:security_questions,id',
        'answer' => 'required|string'
    ];

    public function mount()
    {
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
            $this->showContent = true;
        } else {
            $this->addError('answer', 'The answer is incorrect.');
        }
    }

    public function render()
    {
        return view('livewire.fees');
    }
}
