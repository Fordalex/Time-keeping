@extends('layouts.app')
@php $breadcrumbs = [["link" => "/", "label" => "Home"]] @endphp
@section('title', 'Shifts')
@section('sub_title', "{$shift_range->from_date->format('d M Y')} - {$shift_range->to_date->format('d M Y')}")
@section('content')

    @include('shifts._charts')
    @include('shifts._insights')
    @include('shifts._filters')
    @include('shifts._table')

@endsection
