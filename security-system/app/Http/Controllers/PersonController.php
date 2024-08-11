<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    //
    public function search(Request $request)
    {
        $search = $request->query('search', '');
        $persons = Person::query()
            ->where('id_number', 'like', "%{$search}%")
            ->orWhere('first_name', 'like', "%{$search}%")
            ->orWhere('last_name', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->orWhere('phone', 'like', "%{$search}%")
            ->get();

        return view('search', compact('persons', 'search'));
    }
}
