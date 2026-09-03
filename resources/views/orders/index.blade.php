@extends('layouts.app')

@section('content')

<h2>Your Orders</h2>

@foreach($orders as $order)
<div class="card mb-3 p-3">
    <h5>Order #{{ $order->id }}</h5>
    <p>Total: ₹{{ $order->total_price }}</p>
    <p>Status: <span class="badge bg-success">{{ $order->status }}</span></p>

    <ul>
    @foreach($order->items as $item)
        <li>{{ $item->product->name }} (x{{ $item->quantity }})</li>
    @endforeach
    </ul>
</div>
@endforeach

@endsection