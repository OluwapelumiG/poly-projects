<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Location;

class DriverLocation extends Component
{
    public $user;
    public $location;

    public function mount($user)
    {
        $this->user = User::find($user);
        $this->location = Location::where('user_id', $user)->first();
    }

    public function render()
    {
        return view('livewire.driver-location');
    }
}
