<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public function billed_shifts()
    {
        return $this->hasmany(BilledShift::class);
    }

    public function company()
    {
        return $this->belongsto(Company::class);
    }

    public function formatted_number()
    {
        $number_length = strlen(strval($this->number));
        $formatted_number = "";
        for ($n = 0; $n <= (2 - $number_length); $n++)
        {
            $formatted_number .= "0";
        }
        return $formatted_number .= $this->number;
    }

    protected $fillable = [
        'account_number',
        'due_date',
        'company_id',
        'company_name',
        'company_address',
        'bank',
        'from_date',
        'number',
        'paid',
        'sent',
        'sort_code',
        'to_date',
        'terms',
    ];

    protected $casts = [
        'to_date' => 'date',
        'from_date' => 'date',
        'due_date' => 'date'
      ];
}
