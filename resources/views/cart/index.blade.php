<h2>Your Cart</h2>

@foreach($cartItems as $item)
    <div>
        <h3>{{ $item->product->name }}</h3>
        <p>Price: {{ $item->product->price }}</p>
        <p>Quantity: {{ $item->quantity }}</p>

        <a href="{{ route('cart.remove', $item->id) }}">Remove</a>
        <a href="{{ route('checkout') }}">Checkout</a>
    </div>
@endforeach