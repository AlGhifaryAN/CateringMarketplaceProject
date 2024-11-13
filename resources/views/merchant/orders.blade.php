<!-- resources/views/merchant/orders.blade.php -->
@extends('layouts.app')

@section('title', 'Orders')

@section('content')
    <h2>Orders</h2>
    <ul>
        @foreach ($orders as $order)
            <li>Order #{{ $order->id }} - {{ $order->menu->name }} - {{ $order->quantity }} portions</li>
            <a href="{{ route('invoices.show', $order->invoice_id) }}">View Invoice</a>
        @endforeach
    </ul>
@endsection
