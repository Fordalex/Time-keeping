<div class="overflow-x-auto border">
    <table class="table table-zebra w-full">
    <thead>
        <tr>
            <th>Date</th>
            <th>Days</th>
            <th>Company Name</th>
            <th>Invoice number</th>
            <th>Amount</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($invoices as $invoice)
            <tr>
                <td>{{ $invoice->from_date->format('d M Y') }} - {{ $invoice->to_date->format('d M Y') }}</td>
                <td>{{ $invoice->from_date->diffInDays($invoice->to_date) }}</th>
                <td>{{ $invoice->company->name }}</td>
                <td>{{ $invoice->number }}</td>
                <td>{{ MoneyHelper::format_money(MoneyHelper::total_earnt($invoice->billed_shifts)) }}</td>
                <td>
                    <a href="/invoice/{{ $invoice->id }}" class="btn btn-info">View</a>
                    <a href="/invoice/download/{{ $invoice->id }}" class="btn btn-warning">Download</a>
                    <a href="/invoice/{{ $invoice->id }}/destroy" class="btn btn-error">Destroy</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
