<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'serial_no',
        'program',
        'course',
        'grade',
        'cgpa',
        'date',
        'session',
        'qr',
    ];
}
