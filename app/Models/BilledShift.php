<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BilledShift extends Model
{
    use HasFactory;

    public function invoice()
    {
        $this->belongsto(Invoice::class);
    }

    protected $fillable = [
        'date', 'description', 'duration', 'hourly_rate', 'invoice_id'
    ];

    protected $casts = [
        'date' => 'date'
      ];
}
