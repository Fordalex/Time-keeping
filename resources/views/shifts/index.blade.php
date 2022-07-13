@extends('layouts.app')
@section('title', 'Shifts')
@section('sub_title', 'Jan 1st - Feb 1st')
@section('content')

    <div class="py-4 flex justify-center">
        <div class="stats stats-horizontal lg:stats-horizontal shadow">
            <div class="stat">
                <div class="stat-title">Shifts</div>
                <div class="stat-value">{{ count($shifts) }}</div>
                <div class="stat-desc"></div>
            </div>

            <div class="stat">
                <div class="stat-title">Duration</div>
                <div class="stat-value">{{ $total_duration }}</div>
                <div class="stat-desc"></div>
            </div>

            <div class="stat">
                <div class="stat-title">Earnt</div>
                <div class="stat-value">{{ MoneyHelper::format_money($total_earnt) }}</div>
                <div class="stat-desc"></div>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="table table-zebra w-full">
        <thead>
            <tr>
            <th>#</th>
            <th>Date</th>
            <th>Duration</th>
            <th>Rate</th>
            <th>Earnt</th>
            <th>Description</th>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shifts as $index => $shift)
                <tr>
                    <th>{{ $index + 1 }}</th>
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

@endsection
