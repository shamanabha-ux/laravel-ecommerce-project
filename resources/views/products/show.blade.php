@extends('layouts.app')

@section('content')

<div class="card p-4">
    <div class="row">

        <!-- Image -->
        <div class="col-md-5">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded">
            @endif
        </div>

        <!-- Details -->
        <div class="col-md-7">
            <h2>{{ $product->name }}</h2>

            <h4 class="text-success">₹{{ $product->price }}</h4>

            <p class="mt-3">
                {{ $product->description ?? 'No description available' }}
            </p>

           <!-- <a href="{{ route('cart.add', $product->id) }}" class="btn btn-success">
                Add to Cart
            </a>

            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                Back
            </a>-->
            <div class="mt-3">
    <a href="{{ route('cart.add', $product->id) }}" class="btn btn-success me-2">
        🛒 Add to Cart
    </a>

    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
        ← Back to Products
    </a>
</div>
        </div>

    </div>
</div>

@endsection