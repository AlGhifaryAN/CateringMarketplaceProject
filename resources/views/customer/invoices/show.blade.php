@extends('layouts.app')

@section('title', 'Invoice')

@section('content')
<div class="container">
    <h2>Invoice #{{ $invoice->id }}</h2>

    <p><strong>Total Amount:</strong> ${{ $invoice->total }}</p>
    <p><strong>Status:</strong> {{ $invoice->status }}</p>
    <p><strong>Date:</strong> {{ $invoice->created_at->format('d-m-Y') }}</p>

    <h4>Order Details</h4>
    <ul>
        @foreach ($invoice->orders as $order)
            <li>{{ $order->menu->name }} - Quantity: {{ $order->jumlah }} - Delivery Date: {{ $order->tanggal_pengiriman }}</li>
        @endforeach
    </ul>
</div>
@endsection
