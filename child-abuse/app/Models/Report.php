<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'reporter_name',
        'reporter_contact',
        'reporter_relationship',
        'child_name',
        'child_dob',
        'child_gender',
        'child_address',
        'abuse_type',
        'abuse_description',
        'abuse_date_time',
        'abuse_location',
        'perpetrator_details',
        'status',
        'supporting_documents',
    ];
}
