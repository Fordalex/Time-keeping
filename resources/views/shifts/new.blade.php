@extends('layouts.app')
@section('title', 'New Shift')
@section('content')

    <div class="mt-10 sm:mt-0">
        <div class="mt-5 md:mt-0 md:col-span-2">
            @php $action = "/shift"; @endphp
            @php $method = "POST"; @endphp
            @include('shifts._form')
        </div>
    </div>

@endsection
