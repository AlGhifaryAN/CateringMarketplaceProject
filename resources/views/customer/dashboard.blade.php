@extends('layouts.app')

@section('title', 'Customer Dashboard')

@section('content')
<div class="container">
    <h2>Welcome, {{ auth()->user()->name }} (Customer)</h2>
    <a href="{{ route('customer.search') }}" class="btn btn-info">Search Catering</a>
    <a href="{{ route('customer.orders.index') }}" class="btn btn-warning">View Your Orders</a>
</div>
@endsection
