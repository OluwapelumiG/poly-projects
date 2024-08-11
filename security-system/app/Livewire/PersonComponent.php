<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Person;

class PersonComponent extends Component
{
    use WithFileUploads;

    public $id_number, $first_name, $last_name, $email, $phone, $emergency_contact_name, $emergency_contact_phone;
    public $next_of_kin_name, $next_of_kin_phone, $origin, $disability = false, $disability_details;
    public $health_information, $allergies, $photo, $designation, $department;
    public $showModal = false;

    protected $rules = [
        'id_number' => 'required|unique:people,id_number',
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:people,email',
        'phone' => 'required',
        'emergency_contact_name' => 'required',
        'emergency_contact_phone' => 'required',
        'next_of_kin_name' => 'required',
        'next_of_kin_phone' => 'required',
        'origin' => 'required',
        'photo' => 'image|max:1024', // max 1MB
        'designation' => 'required',
        'department' => 'required',
    ];

    public function render()
    {
        $persons = Person::all();
        return view('livewire.person-component', compact('persons'));
    }

    public function showModal()
    {
        $this->reset();
        $this->showModal = true;
    }

    public function addPerson()
    {
        $this->validate();

        if ($this->photo) {
            $photoPath = $this->photo->store('photos', 'public');
        }

        Person::create([
            'id_number' => $this->id_number,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'emergency_contact_name' => $this->emergency_contact_name,
            'emergency_contact_phone' => $this->emergency_contact_phone,
            'next_of_kin_name' => $this->next_of_kin_name,
            'next_of_kin_phone' => $this->next_of_kin_phone,
            'origin' => $this->origin,
            'disability' => $this->disability,
            'disability_details' => $this->disability_details,
            'health_information' => $this->health_information,
            'allergies' => $this->allergies,
            'photo' => $photoPath ?? null,
            'designation' => $this->designation,
            'department' => $this->department,
        ]);

        $this->reset();
        $this->showModal = false;
    }
}
