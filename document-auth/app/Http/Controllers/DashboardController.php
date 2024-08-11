<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\RequiredDocument;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // Fetch all documents
        if (Auth::user()->name == "Admin") {
            $documents = Document::all();

            return view('admin-dashboard', compact('documents'));
        } else {
            $user = Auth::user()->id;

            $documents = Document::where('user_id', $user)->get();

            return view('dashboard', compact('documents'));
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'document_title' => 'required|string|max:255',
            'file_type' => 'required|string|in:png,jpg,pdf',
            'max_size' => 'required|string|max:255',
        ]);


        RequiredDocument::create([
            'document' => $request->document_title,
            'file_type' => $request->file_type,
            'max_size' => $request->max_size,
        ]);

        return redirect()->back()->with('success', 'Document added successfully.');
    }

    public function req_docs()
    {
        $req_docs = RequiredDocument::all();
        return view('req_docs', compact('req_docs'));
    }

    public function approveDocument($id)
    {
        $document = Document::findOrFail($id);
        $document->update(['status' => 'Approved']);

        return back()->with('success', 'Document approved successfully.');
    }

    public function disapproveDocument($id)
    {
        $document = Document::findOrFail($id);
        $document->update(['status' => 'Disapproved']);

        return back()->with('success', 'Document approved successfully.');
    }
}
