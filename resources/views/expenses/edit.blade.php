@extends('layouts.app')
@php $breadcrumbs = [["link" => "/", "label" => "Home"],["link" => "/expenses", "label" => "Expenses"]] @endphp
@section('title', 'Edit Expense')
@section('content')

    <div class="mt-10 sm:mt-0">
        <div class="mt-5 md:mt-0 md:col-span-2">
            @php $action = "/expenses/{$expense->id}" @endphp
            @php $method = "PUT" @endphp
            @include('expenses._form')
        </div>
    </div>

@endsection
