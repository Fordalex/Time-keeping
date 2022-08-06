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
        'from_date',
        'to_date',
        'due_date',
        'company_id',
        'company_name',
        'company_address',
        'terms',
        'bank',
        'account_number',
        'sort_code',
        'number'
    ];

    protected $casts = [
        'to_date' => 'date',
        'from_date' => 'date',
        'due_date' => 'date'
      ];
}
