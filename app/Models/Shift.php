<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    public function billed_shift()
    {
        return $this->hasone(BilledShift::class);
    }

    protected $fillable = [
        'description', 'duration', 'hourly_rate', 'date'
    ];

    protected $casts = [
        'date' => 'date'
      ];
}
