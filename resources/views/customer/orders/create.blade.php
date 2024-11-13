@extends('layouts.app')

@section('title', 'Order Menu')

@section('content')
<div class="container">
    <h2>Order Menu: {{ $menu->name }}</h2>

    <form action="{{ route('customer.orders.store', $menu->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="jumlah">Quantity</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tanggal_pengiriman">Delivery Date</label>
            <input type="date" name="tanggal_pengiriman" id="tanggal_pengiriman" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Place Order</button>
    </form>
</div>
@endsection
