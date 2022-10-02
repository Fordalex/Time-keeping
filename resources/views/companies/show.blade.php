@extends('layouts.app')
@php $breadcrumbs = [["link" => "/", "label" => "Home"]] @endphp
@section('title', 'Client')
@section('sub_title', $company->name)
@section('content')

    <div class="overflow-x-auto border">
        <table class="table table-zebra w-full">
            <tr>
                <th>Name</th>
                <td>{{ $company->name }}</td>
            </tr>
            <tr>
                <th>First line address</th>
                <td>{{ $company->first_line_address }}</td>
            </tr>
            <tr>
                <th>City</th>
                <td>{{ $company->city }}</td>
            </tr>
            <tr>
                <th>Country</th>
                <td>{{ $company->country }}</td>
            </tr>
            <tr>
                <th>Postcode</th>
                <td>{{ $company->postcode }}</td>
            </tr>
            <tr>
                <th>Initial invoice number</th>
                <td>{{ $company->initial_invoice_no }}</td>
            </tr>
        </table>
    </div>

    <a href="/client/{{ $company->id }}/edit" class="btn btn-warning">Edit</a>

@endsection
