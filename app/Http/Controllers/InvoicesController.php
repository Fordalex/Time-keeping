<?php

namespace App\Http\Controllers;
use App\Models\Invoice;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class InvoicesController extends Controller

{
    public function create()
    {
        Invoice::create([
            'from_date' => Carbon::parse(request('from_date'))->format('Y-m-d H:i:s'),
            'to_date' => Carbon::parse(request('to_date'))->format('Y-m-d H:i:s'),
            'due_date' => Carbon::parse(request('due_date'))->format('Y-m-d H:i:s'),
            'company_name' => "Testing name",
            'company_address' => "Testing address",
            'terms' => request('terms'),
            'bank' => request('bank'),
            'account_number' => request('account_number'),
            'sort_code' => request('sort_code'),
        ]);

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
        return view('invoices.show', [
            'invoice' => $invoice,
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
}
