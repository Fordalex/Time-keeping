<div class="overflow-x-auto border">
    <table class="table table-zebra w-full">
        <thead>
            <tr>
            <th>Date</th>
            <th>Duration</th>
            <th>Rate</th>
            <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->billed_shifts as $billed_shift)
                <tr>
                    <td>{{ $billed_shift->date->format('d M Y') }}</td>
                    <td>{{ TimeHelper::format_minutes($billed_shift->duration) }}</td>
                    <td>{{ MoneyHelper::format_money($billed_shift->hourly_rate) }}</td>
                    <td>{{ MoneyHelper::format_money($billed_shift->hourly_rate * ($billed_shift->duration / 60)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="invoice-total">
    <b colspan="2">Total:</b>
    <p colspan="2">£0.00</p>
</div>

