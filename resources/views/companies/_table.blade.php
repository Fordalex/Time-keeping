<div class="overflow-x-auto border">
    <table class="table table-zebra w-full">
    <thead>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($companies as $company)
            <tr>
                <td>{{ $company->name }}</td>
                <td>
                    <a href="/client/{{ $company->id }}" class="btn btn-info">View</a>
                    <a href="/client/{{ $company->id }}/edit" class="btn btn-warning">Edit</a>
                    <a href="/client/{{ $company->id }}/destroy" class="btn btn-error">Destroy</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
