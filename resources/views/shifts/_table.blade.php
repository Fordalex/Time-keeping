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
                <td>{{ TimeHelper::format_minutes($shift->duration) }}</td>
                <td>{{ MoneyHelper::format_money($shift->hourly_rate) }}</td>
                <td>{{ MoneyHelper::format_money($shift->hourly_rate * ($shift->duration / 60)) }}</td>
                <td>{{ $shift->description }}</td>
                <td>{{ $shift->company->name }}</td>
                <td>
                    @if($shift->billed_shift)
                        <a class="btn btn-info" href='invoice/{{ $shift->billed_shift->invoice_id }}'>Invoice #{{ $shift->billed_shift->invoice->number }}</a>
                    @endif
                </td>
                <td><a href="/shifts/{{ $shift->id }}/edit" class="btn btn-info">Edit</td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
