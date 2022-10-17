<div class="overflow-x-auto border">
    <table class="table table-zebra w-full">
    <thead>
        <tr>
            <th>Date</th>
            <th>Days</th>
            <th>Company Name</th>
            <th>Invoice No</th>
            <th>Sent</th>
            <th>Paid</th>
            <th>Amount</th>
            <th>APD</th>
            <th>Total hours</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($invoices as $invoice)
            <tr>
                <td>{{ $invoice->from_date->format('d M Y') }} - {{ $invoice->to_date->format('d M Y') }}</td>
                <td>{{ $invoice->total_days() }}</th>
                <td>{{ $invoice->company->name }}</td>
                <td>{{ $invoice->formatted_number() }}</td>
                <td>{{ BooleanHelper::tick_or_cross($invoice->sent) }} Date?</td>
                <td>{{ BooleanHelper::tick_or_cross($invoice->paid) }} Date?</td>
                <td>{{ MoneyHelper::format_amount(MoneyHelper::total_earnt($invoice->billed_shifts)) }}</td>
                <td>{{ MoneyHelper::format_amount($invoice->average_per_day()) }}</td>
                <td>{{ TimeHelper::format_minutes($invoice->total_duration(), "") }}</td>
                <td class="gap-1">
                    <div class="dropdown dropdown-end">
                        <label tabindex="0" class="btn">View</label>
                        <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                          <li> <form action="/shifts" method="GET">
                            <input type="hidden" name="from_date" value="{{ $invoice->from_date }}">
                            <input type="hidden" name="to_date" value="{{ $invoice->to_date }}">
                            <input type="submit" value="View Shifts">
                        </form></li>
                          <li><a href="/invoice/{{ $invoice->id }}">View Invoice</a></li>
                        </ul>
                    </div>
                    <div class="dropdown dropdown-end">
                        <label tabindex="0" class="btn">Update</label>
                        <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                            <li><a href="/invoice/{{ $invoice->id }}/toggle-sent">Toggle Sent</a></li>
                            <li><a href="/invoice/{{ $invoice->id }}/toggle-paid">Toggle Paid</a></li>
                        </ul>
                    </div>
                    <a href="/invoice/download/{{ $invoice->id }}" class="btn btn-warning">Download</a>
                    <a href="/invoice/{{ $invoice->id }}/destroy" class="btn btn-error">Destroy</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
