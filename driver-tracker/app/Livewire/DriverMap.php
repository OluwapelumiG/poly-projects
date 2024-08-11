<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;

class DriverMap extends Component
{

    public $latitude;
    public $longitude;

    public function mount()
    {
        // Initial fetch of the driver's location if available
        $location = Location::where('id', Auth::id())->first();
        if ($location) {
            $this->latitude = $location->latitude;
            $this->longitude = $location->longitude;
        }
    }


    public function render()
    {
        return view('livewire.driver-map');
    }


    public function updateLocation($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;

        // Update or create the location record in the database
        Location::updateOrCreate(
            ['id' => Auth::id()],
            ['latitude' => $latitude, 'longitude' => $longitude]
        );

        // Broadcast the location update if needed
        // broadcast(new \App\Events\DriverLocationUpdated(Auth::id(), $latitude, $longitude));
    }
}
