<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;

class StudentList extends Component
{

    public $students;

    public function admitStudent($studentId)
    {
        $student = Student::find($studentId);
        if ($student) {
            $student->admission_status = true;
            $student->save();
            flash()->addSuccess('Student admitted successfully.');
            $this->mount();
        }
    }

    public function mount()
    {
        $this->students = Student::all();
    }

    public function render()
    {
        return view('livewire.student-list');
    }
}
