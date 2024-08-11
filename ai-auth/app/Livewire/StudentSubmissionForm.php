<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;

class StudentSubmissionForm extends Component
{

    public $name;
    public $email;
    public $phone;
    public $jamb_score;
    public $o_level_subjects = [];
    public $o_level_grades = [];
    public $course_applied;
    public $result;
    public $errorMessages = [];

    public $success;

    public $courses = [
        'Computer Science',
        'Engineering',
        'Medicine',
        'Law',
        'Business Administration',
    ];

    public $course_prerequisites = [
        'Computer Science' => [
            'jamb_score' => 180,
            'subjects' => ['English', 'Mathematics', 'Physics']
        ],
        'Engineering' => [
            'jamb_score' => 200,
            'subjects' => ['English', 'Mathematics', 'Physics', 'Chemistry']
        ],
        'Medicine' => [
            'jamb_score' => 250,
            'subjects' => ['English', 'Mathematics', 'Biology', 'Chemistry', 'Physics']
        ],
        'Law' => [
            'jamb_score' => 200,
            'subjects' => ['English', 'Literature in English']
        ],
        'Business Administration' => [
            'jamb_score' => 180,
            'subjects' => ['English', 'Mathematics', 'Economics']
        ],
    ];

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email',
        'phone' => 'required|string|max:15',
        'jamb_score' => 'required|integer|min:0|max:400',
        'course_applied' => 'required|string|max:255',
    ];

    public function addSubject()
    {
        $this->o_level_subjects[] = '';
        $this->o_level_grades[] = '';
    }

    public function removeSubject($index)
    {
        unset($this->o_level_subjects[$index]);
        unset($this->o_level_grades[$index]);
        $this->o_level_subjects = array_values($this->o_level_subjects);
        $this->o_level_grades = array_values($this->o_level_grades);
    }

    public function submit()
    {
        $this->validate();

        $o_level_result = [];
        foreach ($this->o_level_subjects as $index => $subject) {
            if (!empty($subject) && !empty($this->o_level_grades[$index])) {
                $o_level_result[] = [
                    'subject' => $subject,
                    'grade' => $this->o_level_grades[$index],
                ];
            }
        }

        $o_level_result = json_encode($o_level_result);

        $passesValidation = $this->validateCoursePrerequisites(json_decode($o_level_result, true));

        if ($passesValidation) {
            Student::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'jamb_score' => $this->jamb_score,
                'o_level_result' => $o_level_result,
                'course_applied' => $this->course_applied,
            ]);

            $this->result = 'Your submission has been accepted and approved.';
            $this->success = 1;
        } else {
            $this->result = 'Your submission does not meet the required criteria.';
        }

        sleep(5);
    }

    private function validateCoursePrerequisites($o_level_result)
    {
        $this->errorMessages = [];

        if (!isset($this->course_prerequisites[$this->course_applied])) {
            $this->errorMessages[] = 'The selected course does not have defined prerequisites.';
            return false;
        }

        $prerequisites = $this->course_prerequisites[$this->course_applied];

        if ($this->jamb_score < $prerequisites['jamb_score']) {
            $this->errorMessages[] = 'The JAMB score must be at least <strong>' . $prerequisites['jamb_score'] . '</strong> for the selected course.';
        }

        foreach ($prerequisites['subjects'] as $subject) {
            $subjectFound = false;
            foreach ($o_level_result as $result) {
                if ($result['subject'] == $subject && in_array($result['grade'], ['A1', 'B2', 'B3', 'C4', 'C5', 'C6'])) {
                    $subjectFound = true;
                    break;
                }
            }
            if (!$subjectFound) {
                $this->errorMessages[] = 'A pass in <strong>' . $subject . '</strong> is required for the selected course.';
            }
        }

        return empty($this->errorMessages);
    }


    public function render()
    {
        return view('livewire.student-submission-form');
    }
}
