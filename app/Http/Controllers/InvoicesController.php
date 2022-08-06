<?php

namespace App\Http\Controllers;
use App\Models\Invoice;
use App\Models\Shift;
use App\Models\BilledShift;
use App\Models\Company;
use InvoiceHelper;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PDF;

class InvoicesController extends Controller

{
    public function create()
    {
        $attributes = [
            'from_date' => request('from_date'),
            'to_date' => request('to_date'),
            'company_id' => request('company_id'),
            'due_date' => request('due_date'),
            'terms' => request('terms'),
            'bank' => request('bank'),
            'account_number' => request('account_number'),
            'sort_code' => request('sort_code')
        ];
        InvoiceHelper::create_invoice($attributes);

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
        $companies = Company::all();
        $invoice = new invoice;
        $from_date = $_REQUEST["from_date"];
        $to_date = $_REQUEST["to_date"];

        return view('invoices.new', [
            'invoice' => $invoice,
            'from_date' => $from_date,
            'to_date' => $to_date,
            'companies' => $companies,
        ]);
    }

    public function destroy(Invoice $invoice)
    {
        foreach($invoice->billed_shifts as $billed_shifts)
        {
            $billed_shifts->delete();
        }
        $invoice->delete();

        return redirect('/invoices')->with('flash_message', [
            "type" => "warning",
            "message" => "Invoice was destroy!"
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
        return $pdf->download("{$invoice->company->name} {$invoice->number}.pdf");
        // return redirect('/invoices')->with('flash_message', ["type" => "success", "message" => "Invoice was downloaded successfully!"]);

    }
}
