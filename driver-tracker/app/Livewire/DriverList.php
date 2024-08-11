<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class DriverList extends Component
{
    public $drivers;

    public function mount()
    {
        $this->drivers = User::where('role', 'driver')->get();
    }

    public function render()
    {
        return view('livewire.driver-list');
    }
}
