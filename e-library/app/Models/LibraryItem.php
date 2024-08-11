<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'description',
        'file_path',
    ];
}
