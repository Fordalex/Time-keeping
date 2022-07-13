@extends('layouts.app')
@section('title', 'Edit Shift')
@section('content')

    <div class="mt-10 sm:mt-0">
        <div class="mt-5 md:mt-0 md:col-span-2">
            @php $action = "/shifts/{$shift->id}" @endphp
            @php $method = "PUT" @endphp
            @include('shifts._form')
        </div>
    </div>

@endsection
