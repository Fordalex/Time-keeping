<?php

namespace App\Http\Controllers;
use App\Models\Invoice;
use App\Models\Shift;
use App\Models\BilledShift;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;
use InvoiceHelper;
use PDF;

class InvoicesController extends Controller

{
    protected function create()
    {
        $attributes = [
            'from_date' => request('from_date'),
            'to_date' => request('to_date'),
            'company_id' => request('company_id'),
            'due_date' => request('due_date'),
            'terms' => request('terms'),
            'bank' => request('bank'),
            'account_number' => request('account_number'),
            'sort_code' => request('sort_code'),
            'paid' => request('paid'),
            'sent' => request('sent'),
            'user_id' => Auth::id(),
        ];
        InvoiceHelper::create_invoice($attributes);

        return redirect('/invoices')->with('flash_message', ["type" => "success", "message" => "Invoice was created successfully!"]);
    }

    protected function index()
    {
        $invoices = Invoice::all()->where('user_id', Auth::id());

        return view('invoices.index', [
            'invoices' => $invoices
        ]);
    }

    protected function show(Invoice $invoice)
    {
        $billed_shifts = Shift::all();
        return view('invoices.download', [
            'invoice' => $invoice,
            'billed_shifts' => $billed_shifts,
        ]);
    }

    protected function new()
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

    protected function destroy(Invoice $invoice)
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

    protected function download(Invoice $invoice)
    {
        $invoice = Invoice::find($invoice->id);
        $billed_shifts = Shift::all();
        $pdf = PDF::loadView('invoices.download', [
            'invoice' => $invoice,
            'billed_shifts' => $billed_shifts,
        ]);
        return $pdf->download(InvoiceHelper::format_pdf_name($invoice));
        // return redirect('/invoices')->with('flash_message', ["type" => "success", "message" => "Invoice was downloaded successfully!"]);
    }
}
