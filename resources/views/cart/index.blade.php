@extends('layouts.app')

@section('content')

<h2>Your Cart</h2>

<table class="table">
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Action</th>
    </tr>

@foreach($cartItems as $item)
    <tr>
        <td>{{ $item->product->name }}</td>
        <td>₹{{ $item->product->price }}</td>
        <td>{{ $item->quantity }}</td>
        <td>
            <a href="{{ route('cart.remove', $item->id) }}" class="btn btn-danger btn-sm">Remove</a>
        </td>
    </tr>
@endforeach
</table>

<!--<a href="{{ route('checkout') }}" class="btn btn-primary">Checkout</a>-->
<form action="{{ route('checkout') }}" method="POST">
    @csrf
    <button type="submit">Proceed to Payment</button>
</form>
@endsection