<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Location;
use App\Models\User;

class LocationController extends Controller
{
    //
    public function updateLocation(Request $request)
    {
        $user = Auth::user();

        // Validate the request
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Update the user's location
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        // $user->save();

        Location::updateOrCreate(
            ['user_id' => Auth::id()],
            ['latitude' => $latitude, 'longitude' => $longitude]
        );

        return response()->json(['status' => 'success']);
    }

    public function viewLocation($user)
    {
        return view('driver-location', compact('user'));
    }

    public function fetchLocation(User $user)
    {
        return response()->json([
            'latitude' => $user->latitude,
            'longitude' => $user->longitude,
        ]);
    }
}
