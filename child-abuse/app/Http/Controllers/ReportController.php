<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Flasher\Prime\FlasherInterface;


class ReportController extends Controller
{
    //
    public function index()
    {
        $reports = Report::all();
        return view('dashboard', compact('reports'));
    }

    public function create()
    {
        return view('report');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'reporter_name' => 'required|string|max:255',
            'reporter_contact' => 'required|string|max:255',
            'reporter_relationship' => 'required|string|max:255',
            'child_name' => 'required|string|max:255',
            'child_dob' => 'required|date',
            'child_gender' => 'required|string',
            'child_address' => 'required|string|max:255',
            'abuse_type' => 'required|string',
            'abuse_description' => 'required|string',
            'abuse_date_time' => 'required|date_format:Y-m-d\TH:i',
            'abuse_location' => 'required|string|max:255',
            'perpetrator_details' => 'required|string',
            'status' => 'required|string',
            'supporting_documents' => 'nullable|file|mimes:pdf,jpg,png,doc,docx|max:2048',
        ]);

        if ($request->hasFile('supporting_documents')) {
            $path = $request->file('supporting_documents')->store('documents');
            $validatedData['supporting_documents'] = $path;
        }

        Report::create($validatedData);

        flash()->success('Report submitted successfully!');

        return redirect()->route('welcome');
    }

    public function markTreated(Report $report)
    {
        $report->update(['status' => 'treated']);
        flash()->success('Report marked as treated.');
        return redirect()->route('dashboard');
    }

    public function markInvestigated(Report $report)
    {
        $report->update(['status' => 'investigated']);
        flash()->success('Report marked as investigated.');
        return redirect()->route('dashboard');
    }
}
