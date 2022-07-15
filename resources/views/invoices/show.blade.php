@extends('layouts.app')
@php $breadcrumbs = [["link" => "/", "label" => "Home"],["link" => "/invoices", "label" => "Invoices"]] @endphp
@section('title', 'Invoice')
@section('content')


    <div class="invoice-container">
        <header class="flex justify-between">
            <div>
                <h2 class="text-3xl">Fordsdevelopment</h2>
                <h5 class="text-2xl">Alex Ford</h5>
            </div>
            <div>
                <img src="">
            </div>
        </header>

        <section>
            <h3 class="flex justify-between text-4xl"><span>Invoice</span><span>#001</span></h3>
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-6">
                    <h3 class="text-2xl">Company Name</h3>
                    <p>{{ $invoice->company_name }}</p>
                </div>

                <div class="col-span-6">
                    <h3 class="text-2xl">Terms</h3>
                    <p>{{ $invoice->terms }}</p>
                </div>

                <div class="col-span-6">
                    <h3 class="text-2xl">Date Range</h3>
                    <p>From: {{ $invoice->from_date }} To: {{ $invoice->to_date }}</p>
                </div>

                <div class="col-span-6">
                    <h3 class="text-2xl">Due Date</h3>
                    <p>{{ $invoice->due_date }}</p>
                </div>
            </div>
        </section>

        <section>
            @php $billed_shifts = [] @endphp
            @include('invoices._billed_shifts')
        </section>


            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-6">
                    <h2 class="text-2xl">Supplier Details</h2>
                    <table class="table table-zebra w-full">
                        <tbody>
                            <tr>
                                <th>Address</th>
                                <td>{{ $invoice->due_date }}</td>
                            </tr>
                            <tr>
                                <th>Phone No.</th>
                                <td>{{ $invoice->due_date }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $invoice->due_date }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-span-6">
                    <h2 class="text-2xl">Payment</h2>
                    <table class="table table-zebra w-full">
                        <tbody>
                            <tr>
                                <th>Bank</th>
                                <td>{{ $invoice->bank }}</td>
                            </tr>
                            <tr>
                                <th>Account Number</th>
                                <td>{{ $invoice->account_number }}</td>
                            </tr>
                            <tr>
                                <th>Sort Code</th>
                                <td>{{ $invoice->sort_code }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </footer>
    </div>



@endsection
