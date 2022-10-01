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

    public function company()
    {
        return $this->belongsto(Company::class);
    }

    public function total_earnt()
    {
        return $this->hourly_rate * ($this->duration / 60);
    }

    protected $fillable = [
        'description',
        'duration',
        'hourly_rate',
        'date',
        'company_id',
        'user_id'
    ];

    protected $casts = [
        'date' => 'date'
      ];
}
