<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_number', 'first_name', 'last_name', 'email', 'phone', 'emergency_contact_name',
        'emergency_contact_phone', 'next_of_kin_name', 'next_of_kin_phone', 'origin', 'disability',
        'disability_details', 'health_information', 'allergies',
    ];
}
