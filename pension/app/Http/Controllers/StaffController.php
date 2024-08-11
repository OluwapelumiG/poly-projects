<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    //
    public function index()
    {
        $staff = Staff::all();
        return view('dashboard', compact('staff'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
            'years_in_service' => 'required|integer|min:0',
        ]);

        $staff = new Staff($request->only(['name', 'salary', 'years_in_service']));
        $staff->calculateTotalPension();
        $staff->save();

        return redirect()->route('pension.index')->with('success', 'Staff added successfully');
    }

    public function withdraw(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

        $staff = Staff::findOrFail($id);
        if ($request->amount > $staff->balance) {
            return redirect()->route('pension.index')->with('error', 'Insufficient balance');
        }

        $staff->balance -= $request->amount;
        $staff->save();

        return redirect()->route('pension.index')->with('success', 'Withdrawal successful');
    }
}
