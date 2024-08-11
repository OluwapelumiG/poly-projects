<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Person;

class SearchPersons extends Component
{
    public $search = '';
    public $persons = [];
    public $isLoading = false;

    public function search()
    {
        $this->isLoading = true;

        $this->persons = Person::query()
            ->where('id_number', 'like', "%{$this->search}%")
            ->orWhere('first_name', 'like', "%{$this->search}%")
            ->orWhere('last_name', 'like', "%{$this->search}%")
            ->orWhere('email', 'like', "%{$this->search}%")
            ->orWhere('phone', 'like', "%{$this->search}%")
            ->get();

        // $this->isLoading = false;
    }

    public function render()
    {
        return view('livewire.search-persons');
    }
}
