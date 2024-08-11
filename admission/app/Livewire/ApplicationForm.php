<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;

class ApplicationForm extends Component
{

    public $currentStep = 1;

    public $name;
    public $email;
    public $phone;
    public $address;
    public $dob;
    public $level;
    public $card_number;
    public $expiry_date;
    public $cvv;
    public $payment_status = 0;
    public $admission_status = 0;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:255',
        'dob' => 'required|date',
        'level' => 'required|string|max:255',
    ];

    public function nextStep()
    {
        $this->validate();

        $this->currentStep++;
    }

    public function previousStep()
    {
        $this->currentStep--;
    }

    public function submit()
    {
        $this->validate();

        // Save the application to the database
        Student::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'dob' => $this->dob,
            'level' => $this->level,
            'payment_status' => true,
            'admission_status' => false,
        ]);

        flash()->addSuccess('Application submitted successfully.');

        // Reset the form
        // $this->reset();
        $this->currentStep = 3;
    }

    public function render()
    {
        return view('livewire.application-form');
    }
}
