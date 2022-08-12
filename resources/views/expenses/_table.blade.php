<div class="overflow-x-auto border">
    <table class="table table-zebra w-full">
    <thead>
        <tr>
            <th>Date</th>
            <th>Description</th>
            <th>Amount</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($expenses as $expense)
            <tr>
                <td>{{ $expense->date->format('d M Y') }}</th>
                <td>{{ $expense->description }}</td>
                <td>{{ MoneyHelper::format_amount($expense->amount) }}</td>
                <td class="flex gap-1">
                    <a class="btn btn-warning">Edit</a>
                    <a href="/expense/{{ $expense->id }}/destroy" class="btn btn-error">Destroy</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
