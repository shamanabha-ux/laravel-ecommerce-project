<h2>Edit Product</h2>

<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $product->name }}"><br>
    <textarea name="description">{{ $product->description }}</textarea><br>
    <input type="number" name="price" value="{{ $product->price }}"><br>

    <button>Update</button>
</form>