<?php

namespace App\Http\Controllers;
use App\Models\Invoice;
use App\Models\Shift;
use App\Models\BilledShift;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PDF;

class InvoicesController extends Controller

{
    public function create()
    {
        $from_date = Carbon::parse(request('from_date'))->format('Y-m-d H:i:s');
        $to_date = Carbon::parse(request('to_date'))->format('Y-m-d H:i:s');
        $invoice = Invoice::create([
            'from_date' => $from_date,
            'to_date' => $to_date,
            'due_date' => Carbon::parse(request('due_date'))->format('Y-m-d H:i:s'),
            'company_name' => "Testing name",
            'company_address' => "Testing address",
            'terms' => request('terms'),
            'bank' => request('bank'),
            'account_number' => request('account_number'),
            'sort_code' => request('sort_code'),
            'number' => 2,
        ]);
        $shifts = Shift::all()->where('date', '>', $from_date)->where('date', '<', $to_date)->sortby('date');
        foreach($shifts as $shift)
        {
            $billed_shift = BilledShift::create([
                'date' => $shift->date,
                'description' => $shift->description,
                'duration' => $shift->duration,
                'hourly_rate' => $shift->hourly_rate,
                'invoice_id' => $invoice->id,
                'shift_id' => $shift->id,
            ]);
        }

        return redirect('/invoices')->with('flash_message', ["type" => "success", "message" => "Invoice was created successfully!"]);
    }

    public function index()
    {
        $invoices = Invoice::all();

        return view('invoices.index', [
            'invoices' => $invoices
        ]);
    }

    public function show(Invoice $invoice)
    {
        $billed_shifts = Shift::all();
        return view('invoices.download', [
            'invoice' => $invoice,
            'billed_shifts' => $billed_shifts,
        ]);
    }

    public function new()
    {
        $invoice = new invoice;
        $from_date = $_REQUEST["from_date"];
        $to_date = $_REQUEST["to_date"];

        return view('invoices.new', [
            'invoice' => $invoice,
            'from_date' => $from_date,
            'to_date' => $to_date
        ]);
    }

    public function download(Invoice $invoice)
    {
        $invoice = Invoice::find($invoice->id);
        $billed_shifts = Shift::all();
        $pdf = PDF::loadView('invoices.download', [
            'invoice' => $invoice,
            'billed_shifts' => $billed_shifts,
        ]);
        return $pdf->download('invoice.pdf');
        // return redirect('/invoices')->with('flash_message', ["type" => "success", "message" => "Invoice was downloaded successfully!"]);

    }
}
