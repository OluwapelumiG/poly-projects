<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emergency extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'location',
        'author',
        'picture',
        'severity',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author');
    }
}
