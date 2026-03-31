@extends('layouts.app')

@section('content')

<h2>Products</h2>
<form method="GET" action="{{ route('products.index') }}" class="mb-3 d-flex">

    <input 
        type="text" 
        name="search" 
        class="form-control me-2" 
        placeholder="Search products..."
        value="{{ request('search') }}"
    >

    <button class="btn btn-primary">Search</button>

</form>
<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>

<div class="row">
@foreach($products as $product)
    <div class="col-md-3">
        <div class="card p-2 mb-3">
<a href="{{ route('products.show', $product->id) }}">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" height="150">
            @endif
            </a>
<h5>
    <a href="{{ route('products.show', $product->id) }}">
        {{ $product->name }}
    </a>
</h5>
            <!--<h5>{{ $product->name }}</h5>-->
            <p>₹{{ $product->price }}</p>

            <a href="{{ route('cart.add', $product->id) }}" class="btn btn-success btn-sm">Add to Cart</a>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>

            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm mt-1">Delete</button>
            </form>

        </div>
    </div>
@endforeach
{{ $products->appends(request()->query())->links() }}
</div>

@endsection
