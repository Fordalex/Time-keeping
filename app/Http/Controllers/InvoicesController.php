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

        return redirect('/invoices')->with('flash_message', [
            "type" => "success",
            "message" => "Invoice was created successfully!"
        ]);
    }

    protected function index()
    {
        $invoices = Invoice::all()->where('user_id', Auth::id());

        return view('invoices.index', compact('invoices'));
    }

    protected function show(Invoice $invoice)
    {
        $billed_shifts = Shift::all();
        return view('invoices.download', compact('invoice', 'billed_shifts'));
    }

    protected function new()
    {
        $companies = Company::all();
        $invoice = new invoice;
        $from_date = $_REQUEST["from_date"];
        $to_date = $_REQUEST["to_date"];

        return view('invoices.new', compact('companies', 'invoice', 'from_date', 'to_date'));
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

    protected function toggle_sent(Invoice $invoice)
    {
        $invoice->sent = !$invoice->sent;
        $invoice->save();

        return redirect('/invoices')->with('flash_message', [
            "type" => "success",
            "message" => "Invoice was updated"
        ]);
    }

    protected function toggle_paid(Invoice $invoice)
    {
        $invoice->paid = !$invoice->paid;
        $invoice->save();

        return redirect('/invoices')->with('flash_message', [
            "type" => "success",
            "message" => "Invoice was updated"
        ]);
    }

    protected function download(Invoice $invoice)
    {
        $invoice = Invoice::find($invoice->id);
        $billed_shifts = Shift::all();
        $pdf = PDF::loadView('invoices.download', compact('invoice', 'billed_shifts'));
        return $pdf->download(InvoiceHelper::format_pdf_name($invoice));
        // return redirect('/invoices')->with('flash_message', ["type" => "success", "message" => "Invoice was downloaded successfully!"]);
    }
}
