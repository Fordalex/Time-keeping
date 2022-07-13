@extends('layouts.app')

@section('title', 'Shifts')

@section('content')


<div class="overflow-x-auto">
    <table class="table table-zebra w-full">
      <thead>
        <tr>
          <th></th>
          <th>Date</th>
          <th>Hours</th>
          <th>Rate</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
        @foreach($shifts as $index => $shift)
            <tr>
                <th>{{ $index + 1 }}</th>
                <td>{{ $shift->date->format('d M Y') }}</td>
                <td>{{ $shift->hours }}</td>
                <td>{{ $shift->hourly_rate }}</td>
                <td>{{ $shift->description }}</td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection
