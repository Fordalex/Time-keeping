<div class="overflow-x-auto border">
    <table class="table table-zebra w-full">
    <thead>
        <tr>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($invoices as $invoice)
            <tr>
                <td>{{ $invoice->from_date }} - {{ $invoice->to_date }}</td>
                <td>
                    <a href="/invoice/{{ $invoice->id }}" class="btn btn-info">View</a>
                    <a href="/invoice/{{ $invoice->id }}/destory" class="btn btn-warning">Download</a>
                    <a href="/invoice/{{ $invoice->id }}/destory" class="btn btn-error">Destory</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
