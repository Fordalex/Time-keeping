<div class="overflow-x-auto border">
    <table class="table table-zebra w-full">
    <thead>
        <tr>
        <th>Date</th>
        <th>Duration</th>
        <th>Rate</th>
        <th>Earnt</th>
        <th>Description</th>
        <th>Company Name</th>
        <th>Invoiced</th>
        <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($shifts as $shift)
            <tr>
                <td>{{ $shift->date->format('d M Y') }}</td>
                <td>{{ TimeHelper::format_minutes($shift->duration, " ") }}</td>
                <td>{{ MoneyHelper::format_amount($shift->hourly_rate) }}</td>
                <td>{{ MoneyHelper::format_amount($shift->total_earnt()) }}</td>
                <td>{{ $shift->description }}</td>
                <td>{{ $shift->company->name }}</td>
                <td>
                    @if($shift->billed_shift)
                        <a class="btn btn-info" href='invoice/{{ $shift->billed_shift->invoice_id }}'>Invoice #{{ $shift->billed_shift->invoice->formatted_number() }}</a>
                    @endif
                </td>
                <td>
                    <a href="/shifts/{{ $shift->id }}/edit" class="btn btn-warning">Edit</a>
                    <a href="/shifts/{{ $shift->id }}/edit" class="btn btn-error">Destroy</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
