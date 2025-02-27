<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'score', 'has_diabetes'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
