<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'review_note',
        'remark'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
