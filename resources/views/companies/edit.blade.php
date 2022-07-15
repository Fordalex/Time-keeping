@extends('layouts.app')
@php $breadcrumbs = [["link" => "/", "label" => "Home"],["link" => "/companies", "label" => "Companies"]] @endphp
@section('title', 'Edit Company')
@section('content')

    <div class="mt-10 sm:mt-0">
        <div class="mt-5 md:mt-0 md:col-span-2">
            @php $action = "/companies/{$company->id}" @endphp
            @php $method = "PUT" @endphp
            @include('companies._form')
        </div>
    </div>

@endsection
