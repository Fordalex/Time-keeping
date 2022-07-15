
    <style>
        .invoiceSection-container {
            display: flex;
            justify-content: space-between;
        }
    </style>

    <div class="invoice-container">
        <header class="flex justify-between">
            <div>
                <h2 class="text-3xl">Fordsdevelopment</h2>
                <h4 class="text-2xl">Alex Ford</h4>
            </div>
            <div>
                <img src="">
            </div>
        </header>

        <section>
            <div class="invoiceSection-container">
                <h3>Invoice</h3>
                <h3>#001</h3>
            </div>
            <div class="invoiceSection-container">
                <div>
                    <h3>Company Name</h3>
                    <p>{{ $invoice->company_name }}</p>
                </div>

                <div>
                    <h3>Terms</h3>
                    <p>{{ $invoice->terms }}</p>
                </div>
            </div>

            <div class="invoiceSection-container">
                <div>
                    <h3>Date Range</h3>
                    <p>From: {{ $invoice->from_date }} To: {{ $invoice->to_date }}</p>
                </div>

                <div>
                    <h3>Due Date</h3>
                    <p>{{ $invoice->due_date }}</p>
                </div>
            </div>
        </section>

        <section>
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
