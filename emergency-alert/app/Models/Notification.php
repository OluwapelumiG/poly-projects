<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'user',
        'emergency',
        'status',
    ];

    public function emergency()
    {
        return $this->belongsTo(Emergency::class, 'emergency');
    }
}
