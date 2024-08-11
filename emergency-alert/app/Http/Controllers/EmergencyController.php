<?php

namespace App\Http\Controllers;

use App\Models\Emergency;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    //
    public function create()
    {
        return view('create_emergency');
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'required|string',
    //     ]);

    //     $emergency = Emergency::create([
    //         'title' => $validatedData['title'],
    //         'description' => $validatedData['description'],
    //         'location' => 'N/A',
    //         'author' => auth()->user()->name,
    //         'severity' => 'high',
    //     ]);

    //     // Insert record into notifications table for each user
    //     $users = User::all();
    //     foreach ($users as $user) {
    //         $user->notifications()->create([
    //             'status' => 'new'
    //         ]);
    //     }

    //     return redirect()->route('emergencies.create')->with('success', 'Emergency alert sent successfully.');
    // }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'severity' => 'required|string',
        ]);

        $emergency = Emergency::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'location' => $validatedData['location'],
            'author' => Auth::user()->id,
            'severity' => $validatedData['severity'],
        ]);

        // Create a notification for all users
        $users = User::where('id', '!=', Auth::user()->id)->get();
        foreach ($users as $user) {
            Notification::create([
                'user' => $user->id,
                'emergency' => $emergency->id,
                'status' => 'new',
            ]);
        }

        return redirect()->route('emergencies.create')->with('success', 'Emergency alert sent successfully.');
    }
}
