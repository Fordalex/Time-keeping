
    <style>
        .m-0 {
            margin: 0;
        }
        .table-header {
            background-color: #f1f1f1;
        }
        .w-full {
            width: 100%;
        }
        .invoiceSection-container {
            padding: 1rem;
        }

        .h1, h2, h3, h4, h5, h6 {
            margin-bottom: 0;
            margin-top: 1rem;
        }

        p {
            margin-bottom: 1rem;
            margin-top: 0.2rem;
        }

        .border-bottom {
            border-bottom: solid #cacaca 1px;
        }

        .logo {
            width: 50px;
        }

        .invoice-table {
            width: 100%;
        }

        .invoice-table table {
            border-spacing: 0;
            width: 100%;
        }
        .invoiceDetails-table td,
        .invoice-table td {
            border-bottom: solid #cacaca 1px;
            padding: 0.5rem;
        }

        .invoice-table th {
            padding: 0.5rem;
        }
        table .th {
            font-weight: 700;
        }
        .invoice-total {
            padding: 0.5rem;
            width: 200px;
            border-top:0;
            padding-left: auto;
            background-color: #f1f1f1;
        }
        .invoice-total p {
            margin: 0;
        }

    </style>

    <table class="w-full">
        <tr>
            <td>
                <h1>Invoice</h1>
            </td>
            <td>
                <h1>#{{ $invoice->formatted_number() }}</h1>
            </td>
        </tr>
    </table>

    <table class="w-full">
        <tr>
            <td>
                <h3>Company Details</h3>
                {{-- Add association with invoice and company --}}
                <p>The Learning People, The Agora, Ellen Street, HOVE, BN3 3LN, United Kingdom</p>
            </td>
            <td>
                <h3>Terms</h3>
                <p>{{ $invoice->terms }}</p>
            </td>
        </tr>
        <tr>
            <td>
                <h3>Date Range</h3>
                <p>{{ $invoice->from_date->format('d M Y') }} - {{ $invoice->to_date->format('d M Y') }}</p>
            </td>
            <td>
                <h3>Date</h3>
                <p>{{ $invoice->created_at->format('d M Y') }}</p>
            </td>
        </tr>
    </table>

        <section>
            @include('invoices._billed_shifts')
        </section>

        <p>Due date: {{ $invoice->due_date->format('d M Y') }}</p>
        <p>Payment terms: {{ $invoice->terms }}</p>
        <p>Amount due: {{ MoneyHelper::format_amount(MoneyHelper::total_earnt($invoice->billed_shifts)) }}</p>

                <table class="w-full ">
                    <tr>
                        <td>
                            <h2 class="text-2xl">Supplier Details</h2>
                            <table class="invoiceDetails-table">
                                <tbody>
                                    <tr>
                                        <td class="th">Address</td>
                                        <td>76 Probert Avenue, Goldthorpe, Rotherham S63 9AQ</td>
                                    </tr>
                                    <tr>
                                        <td class="th">Phone No.</td>
                                        <td>07502572863</td>
                                    </tr>
                                    <tr>
                                        <td class="th">Email</td>
                                        <td>fordsdevelopment@gmail.com</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>

                        <td>
                            <h2 class="text-2xl">Payment</h2>
                            <table class="invoiceDetails-table">
                                <tbody>
                                    <tr>
                                        <td class="th">Bank</td>
                                        <td>{{ $invoice->bank }}</td>
                                    </tr>
                                    <tr>
                                        <td class="th">Account Number</td>
                                        <td>{{ $invoice->account_number }}</td>
                                    </tr>
                                    <tr>
                                        <td class="th">Sort Code</td>
                                        <td>{{ $invoice->sort_code }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    <tr>
                </table>
            </div>
        </footer>
    </div>
