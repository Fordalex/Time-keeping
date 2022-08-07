@extends('layouts.app')
@php $breadcrumbs = [["link" => "/", "label" => "Home"]] @endphp
@section('title', 'Shifts')
@section('sub_title', "{$from_date->format('d M Y')} - {$to_date->format('d M Y')}")
@section('content')

    @include('shifts._charts')
    @include('shifts._insights')
    @include('shifts._filters')
    @include('shifts._table')

@endsection
