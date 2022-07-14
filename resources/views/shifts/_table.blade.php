<div class="overflow-x-auto">
    <table class="table table-zebra w-full">
    <thead>
        <tr>
        <th>Date</th>
        <th>Duration</th>
        <th>Rate</th>
        <th>Earnt</th>
        <th>Description</th>
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
                <td><a href="/shifts/{{ $shift->id }}/edit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Edit</td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
