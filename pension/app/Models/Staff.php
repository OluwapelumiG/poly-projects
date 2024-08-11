<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'salary', 'years_in_service', 'total_pension', 'balance'];

    protected $casts = [
        'salary' => 'decimal:2',
        'total_pension' => 'decimal:2',
        'balance' => 'decimal:2',
    ];

    public function calculateTotalPension()
    {
        // Example calculation: salary * years_in_service * 0.05
        $this->total_pension = $this->salary * $this->years_in_service * 0.05;
        $this->balance = $this->total_pension;
    }
}
