<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LibraryItem;

class LibraryItemController extends Controller
{
    //
    public function index()
    {
        $items = LibraryItem::all();
        return view('dashboard', compact('items'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        // $filePath = $request->file('file') ? $request->file('file')->store('library_files') : null;

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('file', 'public');
        }

        LibraryItem::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'file_path' => $filePath,
        ]);

        return redirect()->route('dashboard')->with('success', 'Library item added successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $items = LibraryItem::where('title', 'LIKE', "%{$query}%")
            ->orWhere('author', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        return view('search', compact('items'));
    }
}
