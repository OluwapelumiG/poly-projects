<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    //
    public function index()
    {
        $locations = Location::all();
        return view('welcome', compact('locations'));
    }

    public function dashboard()
    {
        $locations = Location::all();
        return view('dashboard', compact('locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'location_name' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        Location::create([
            'name' => $request->input('location_name'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ]);

        return redirect('dashboard')->with(['message' => 'Location added successfully']);
    }

    public function destroy(Location $location)
    {
        $location->delete();
        return redirect('dashboard')->with(['message' => 'Location deleted successfully']);
    }
}
