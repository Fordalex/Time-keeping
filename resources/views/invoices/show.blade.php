@extends('layouts.app')
@php $breadcrumbs = [["link" => "/", "label" => "Home"],["link" => "/invoices", "label" => "Invoices"]] @endphp
@section('title', 'Invoice')
@section('content')

    @include('invoices._pdf')

@endsection
