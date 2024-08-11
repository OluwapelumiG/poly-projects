<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'phone' => 'required',
            'address' => 'required',
            'dob' => 'required|date',
            'jamb' => 'required',
            'course' => 'required',
            'olevel' => 'required',
            'payment_status' => 'required|boolean',
            'admission_status' => 'required|boolean',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student admitted successfully.');
    }
}
