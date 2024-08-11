<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'industry_id',
        'name',
        'matric_no',
    ];
    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
