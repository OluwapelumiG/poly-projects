<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SecurityQuestion;
use App\Models\UserSecurityAnswer;

class DashboardController extends Controller
{
    //
    public function create_user()
    {
        $securityQuestions = SecurityQuestion::all();
        return view('user_create', compact('securityQuestions'));
    }

    public function store_user(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'security_answers.*' => 'required|string',
            'security_questions.*' => 'required|exists:security_questions,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        foreach ($request->security_answers as $index => $answer) {
            UserSecurityAnswer::create([
                'user_id' => $user->id,
                'security_question_id' => $request->security_questions[$index],
                'answer' => $answer,
            ]);
        }

        return redirect()->route('dashboard')->with('success', 'User created successfully.');
    }
}
