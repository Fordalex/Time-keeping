@extends('layouts.app')
@php $breadcrumbs = [["link" => "/", "label" => "Home"]] @endphp
@section('title', 'Invoices')
@section('sub_title', "All")
@section('content')

    @include('invoices._table')

@endsection
