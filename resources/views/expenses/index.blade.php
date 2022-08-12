@extends('layouts.app')
@php $breadcrumbs = [["link" => "/", "label" => "Home"]] @endphp
@section('title', 'Expenses')
@section('sub_title', "All")
@section('content')

    @include('expenses._insights')
    @include('expenses._table')

@endsection
