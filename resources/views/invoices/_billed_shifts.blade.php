<div class="invoice-table">
    <table>
        <thead>
            <tr class="table-header">
                <td class="th">Date</td>
                <td class="th">Duration</td>
                <td class="th">Rate</td>
                <td class="th">Amount</td>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->billed_shifts as $billed_shift)
                <tr>
                    <td>{{ $billed_shift->date->format('d M Y') }}</td>
                    <td>{{ TimeHelper::format_minutes($billed_shift->duration, " ") }}</td>
                    <td>{{ MoneyHelper::format_money($billed_shift->hourly_rate) }}</td>
                    <td>{{ MoneyHelper::format_money($billed_shift->hourly_rate * ($billed_shift->duration / 60)) }}</td>
                </tr>
            @endforeach
            <tr class="invoice-total">
                <td></td>
                <td></td>
                <td><b>Total:</b></td>
                <td>{{ MoneyHelper::format_money(MoneyHelper::total_earnt($billed_shifts)) }}</td>
            </tr>
        </tbody>
    </table>
</div>
