<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_date',
        'to_date',
        'due_date',
        'company_name',
        'company_address',
        'terms',
        'bank',
        'account_number',
        'sort_code'
    ];

    protected $casts = [
        'to_date' => 'date',
        'from_date' => 'date',
        'due_date' => 'date'
      ];
}
