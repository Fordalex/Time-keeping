<div class="overflow-x-auto">
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
                <td><a href="/shifts/{{ $invoice->id }}/destory" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Edit</td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
