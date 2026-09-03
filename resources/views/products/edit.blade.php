@extends('layouts.app')

@section('content')

<div class="card p-4">
    <h2 class="mb-3">Edit Product</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
        </div>

        <!-- Price -->
        <div class="mb-3">
            <label class="form-label">Price (₹)</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}">
            @error('price')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Current Image -->
        @if($product->image)
            <div class="mb-3">
                <label class="form-label">Current Image</label><br>
                <img src="{{ asset('storage/' . $product->image) }}" width="120">
            </div>
        @endif

        <!-- New Image -->
        <div class="mb-3">
            <label class="form-label">Change Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <!-- Buttons -->
        <button class="btn btn-primary">Update Product</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>

    </form>
</div>

@endsection