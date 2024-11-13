@extends('layouts.app')

@section('title', 'Merchant Dashboard')

@section('content')
<div class="container">
    <h2>Welcome, {{ auth()->user()->name }} (Merchant)</h2>
    <a href="{{ route('merchant.menus.index') }}" class="btn btn-info">Manage Menus</a>
    <a href="{{ route('merchant.orders.index') }}" class="btn btn-warning">View Orders</a>
</div>
@endsection
