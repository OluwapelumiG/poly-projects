<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Industry extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
