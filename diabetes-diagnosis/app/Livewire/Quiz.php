<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Question;
use App\Models\Result;

class Quiz extends Component
{
    public $questions;
    public $currentQuestion = 0;
    public $answers = [];
    public $prev_result;

    public function mount()
    {
        // Fetch questions from the database
        $this->questions = Question::all();

        $this->prev_result = Result::where('user_id', auth()->id())->first();
    }



    public function render()
    {
        // dd($this);
        return view('livewire.quiz');
    }

    public function nextQuestion($answer)
    {
        // Store the answer for the current question
        $this->answers[] = $answer;
        $this->currentQuestion++;

        // If all questions are answered, submit the quiz
        if ($this->currentQuestion >= count($this->questions)) {
            $this->submitQuiz();
        }
    }

    public function submitQuiz()
    {
        // Calculate score based on answers (true = 1, false = 0)
        // Calculate total questions
        $totalQuestions = count($this->answers);

        // Calculate score based on answers (true = 1, false = 0)
        $score = array_sum($this->answers);

        // Calculate percentage score
        $percentageScore = ($score / $totalQuestions) * 100;

        // Determine if user has diabetes based on score
        $hasDiabetes = $score > 7; // Assuming any true answer means has diabetes

        // Store quiz result in database
        Result::create([
            'user_id' => auth()->id(),
            'score' => $percentageScore, // Store percentage score
            'has_diabetes' => $hasDiabetes,
        ]);

        // Redirect to result page
        return redirect()->route('quiz');
    }

    public function resetQuiz()
    {
        // Reset quiz state
        $this->currentQuestion = 0;
        $this->answers = [];
    }

    public function deleteResult()
    {
        $this->prev_result->delete();
        session()->flash('message', 'Quiz result deleted successfully!');
        return redirect()->route('quiz');
    }
}
