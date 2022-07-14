@extends('layouts.app')
@section('title', 'Invoices')
@section('sub_title', "All")
@section('content')

    @include('invoices._table')

@endsection
