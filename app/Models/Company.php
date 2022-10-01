<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'first_line_address',
        'city',
        'country',
        'postcode',
        'initial_invoice_no',
        'user_id'
    ];
}
