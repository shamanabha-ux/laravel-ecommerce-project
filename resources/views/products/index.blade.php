<h2>Products</h2>

<a href="{{ route('products.create') }}">Add Product</a>

@foreach($products as $product)
    <div>
        <h3>{{ $product->name }}</h3>
        <p>{{ $product->price }}</p>

        @if($product->image)
         
            <img src="{{ asset('storage/' . $product->image) }}" width="100">
        @endif

        <a href="{{ route('products.edit', $product->id) }}">Edit</a>

        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Delete</button>
            <a href="{{ route('cart.add', $product->id) }}">Add to Cart</a>
        </form>
    </div>
@endforeach