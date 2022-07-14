@extends('layouts.app')
@php $breadcrumbs = [["link" => "/", "label" => "Home"],["link" => "/invoices", "label" => "Invoices"]] @endphp
@section('title', 'New Invoice')
@section('content')

    <div class="mt-10 sm:mt-0">
        <div class="mt-5 md:mt-0 md:col-span-2">
            @php $action = "/invoice"; @endphp
            @php $method = "POST"; @endphp
            @include('invoices._form')
        </div>
    </div>

@endsection
