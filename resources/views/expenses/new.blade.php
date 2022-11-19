@extends('layouts.app')
@php $breadcrumbs = [["link" => "/", "label" => "Home"],["link" => "/expenses", "label" => "Expenses"]] @endphp
@section('title', 'New Expense')
@section('content')

    <div class="mt-10 sm:mt-0">
        <div class="mt-5 md:mt-0 md:col-span-2">
            @php $action = "/expense"; @endphp
            @php $method = "POST"; @endphp
            @include('expenses._form')
        </div>
    </div>

@endsection
