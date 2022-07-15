@extends('layouts.app')
@php $breadcrumbs = [["link" => "/", "label" => "Home"],["link" => "/companies", "label" => "Companies"]] @endphp
@section('title', 'New Company')
@section('content')

    <div class="mt-10 sm:mt-0">
        <div class="mt-5 md:mt-0 md:col-span-2">
            @php $action = "/company"; @endphp
            @php $method = "POST"; @endphp
            @include('companies._form')
        </div>
    </div>

@endsection
