@extends('layouts.app')

@section('content')

<div class="card p-4">
    <h2 class="mb-3">Add Product</h2>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <!-- Price -->
        <div class="mb-3">
            <label class="form-label">Price (₹)</label>
            <input type="number" name="price" class="form-control" value="{{ old('price') }}">
            @error('price')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Image -->
        <div class="mb-3">
            <label class="form-label">Product Image</label>
            <input type="file" name="image" class="form-control">
            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Buttons -->
        <button class="btn btn-success">Add Product</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>

    </form>
</div>

@endsection