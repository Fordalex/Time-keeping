<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BilledShift extends Model
{
    use HasFactory;

    public function invoice()
    {
        return $this->belongsto(Invoice::class);
    }

    public function shift()
    {
        return $this->belongsto(Shift::class);
    }

    protected $fillable = [
        'date', 'description', 'duration', 'hourly_rate', 'invoice_id', 'shift_id'
    ];

    protected $casts = [
        'date' => 'date'
      ];
}
