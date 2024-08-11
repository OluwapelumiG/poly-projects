<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;

class ResultController extends Controller
{
    //
    public function index()
    {
        $results = Result::all();
        return view('dashboard', compact('results'));
    }

    public function create()
    {
        return view('results.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'cgpa' => 'required|numeric|between:0,4.5',
            'session' => 'required|string|max:255',
        ]);

        // Generate serial number (assuming it's a unique 6-digit number)
        $serial_no = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);

        // Determine grade based on CGPA
        $cgpa = $request->input('cgpa');
        if ($cgpa >= 4.0 && $cgpa <= 4.5) {
            $grade = 'Distinction';
        } elseif ($cgpa >= 3.5 && $cgpa < 4.0) {
            $grade = 'Upper Credit';
        } elseif ($cgpa >= 2.5 && $cgpa < 3.5) {
            $grade = 'Lower Credit';
        } elseif ($cgpa >= 0 && $cgpa < 2.5) {
            $grade = 'Pass';
        } else {
            $grade = 'Unknown'; // Handle any unexpected values gracefully
        }

        // Generate QR code based on serial number (you can adjust the method based on your QR generation logic)
        $qr = 'QR-' . $serial_no;

        // Store the result in the database
        $result = Result::create([
            'name' => $request->input('name'),
            'serial_no' => $serial_no,
            'program' => $request->input('program'),
            'course' => $request->input('course'),
            'grade' => $grade,
            'cgpa' => $cgpa,
            'date' => now(), // Adjust as per your requirement
            'session' => $request->input('session'),
            'qr' => $qr,
        ]);

        // Redirect back with success message
        return redirect()->route('dashboard')->with('success', 'Result added successfully.');
    }

    public function print(Result $result)
    {
        // Add your print logic here
        return view('result', compact('result'));
    }
}
