<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;

class StudentTable extends Component
{

    public $students;
    public $viewingStudent = false;
    public $selectedStudent;

    public function mount()
    {
        $this->students = Student::all();
    }

    public function viewStudent($studentId)
    {
        $this->selectedStudent = Student::find($studentId);
        $this->viewingStudent = true;
    }

    public function closeModal()
    {
        $this->viewingStudent = false;
        $this->selectedStudent = null;
    }


    public function render()
    {
        return view('livewire.student-table');
    }
}
