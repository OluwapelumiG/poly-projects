<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\State;
use App\Models\Lga;

class HospitalController extends Controller
{
    //
    public function index()
    {
        $hospitals = Hospital::with('state', 'lga')->get();
        $states = State::all();

        return view('dashboard', compact('hospitals', 'states'));
    }

    public function welcome(Request $request)
    {
        $searchTerm = $request->input('query');

        $results = [];

        if ($searchTerm) {
            $results = Hospital::where('name', 'LIKE', "%$searchTerm%")
                ->orWhere('address', 'LIKE', "%$searchTerm%")
                ->orWhereHas('state', function ($stateQuery) use ($searchTerm) {
                    $stateQuery->where('name', 'LIKE', "%$searchTerm%");
                })
                ->orWhereHas('lga', function ($lgaQuery) use ($searchTerm) {
                    $lgaQuery->where('name', 'LIKE', "%$searchTerm%");
                })
                ->get();
        }

        return view('welcome', compact('results'));
    }


    public function show($id)
    {
        $hospital = Hospital::findOrFail($id);
        // return view('hospitals.show', compact('hospital'));
    }

    public function create()
    {
        $states = State::all();
        return view('create_hospital', compact('states'));
    }

    public function getLgasByState($stateId)
    {
        $lgas = Lga::where('state_id', $stateId)->get(['id', 'name']);
        return response()->json(['lgas' => $lgas]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'lga_id' => 'required',
            'state_id' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'phone' => 'required'
        ]);

        Hospital::create($request->all());

        return redirect('/dashboard')->with('success', 'Hospital created successfully.');
    }
}
