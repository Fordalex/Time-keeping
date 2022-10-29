<?php

use Illuminate\Support\Carbon;
use App\Models\Invoice;
use App\Models\Shift;
use App\Models\Company;
use App\Models\BilledShift;

class InvoiceHelper
{
    public static function create_invoice($attributes)
    {
        $from_date = Carbon::parse($attributes['from_date'])->format('Y-m-d H:i:s');
        $to_date = Carbon::parse($attributes['to_date'])->format('Y-m-d H:i:s');
        $company = Company::find($attributes['company_id']);
        $invoice_number = Invoice::all()->where('company_id', $company->id)->count() + 1 + $company->initial_invoice_no;

        $invoice = Invoice::create([
            'from_date' => $from_date,
            'to_date' => $to_date,
            'due_date' => Carbon::parse($attributes['due_date'])->format('Y-m-d H:i:s'),
            'company_id' => $company->id,
            'company_name' => $company->name,
            'company_address' => $company->first_line_address,
            'terms' => $attributes['terms'],
            'bank' => $attributes['bank'],
            'account_number' => $attributes['account_number'],
            'sort_code' => $attributes['sort_code'],
            'number' => $invoice_number,
            'paid' => false,
            'sent' => false,
            'user_id' => $attributes['user_id'],
        ]);
        // this needs to be moved into a scope or model method
        // should only be getting shifts that haven't been billed
        $shifts = Shift::all()
            ->where('company_id', $company->id)
            ->where('date', '>=', $from_date)
            ->where('date', '<=', $to_date)
            ->sortby('date');
        foreach($shifts as $shift)
        {
            $billed_shift = BilledShift::create([
                'date' => $shift->date,
                'description' => $shift->description,
                'duration' => $shift->duration,
                'hourly_rate' => $shift->hourly_rate,
                'invoice_id' => $invoice->id,
                'shift_id' => $shift->id,
                'user_id' => $shift->user_id,
            ]);
        }
    }

    public static function format_pdf_name($invoice)
    {
        $company_name = join("_", explode(" ", $invoice->company->name));
        return strtolower("{$company_name}_{$invoice->formatted_number()}.pdf");
    }
}

