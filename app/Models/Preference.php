<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use HasFactory;

    public function company()
    {
        return $this->belongsto(User::class);
    }

    protected $fillable = [
        'user_id',
        'company_filter',
        'shift_filter',
        'to_date',
        'from_date',
    ];

    protected $casts = [
        'to_date' => 'date',
        'from_date' => 'date'
    ];
}
