<h2>Your Orders</h2>

@foreach($orders as $order)
    <div>
        <h3>Order ID: {{ $order->id }}</h3>
        <p>Total: {{ $order->total_price }}</p>
        <p>Status: {{ $order->status }}</p>

        @foreach($order->items as $item)
            <p>{{ $item->product->name }} - Qty: {{ $item->quantity }}</p>
        @endforeach
    </div>
@endforeach