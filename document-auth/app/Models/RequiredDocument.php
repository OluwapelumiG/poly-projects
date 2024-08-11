<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequiredDocument extends Model
{
    use HasFactory;
    protected $fillable = [
        'document',
        'file_type',
        'max_size',
    ];
}
