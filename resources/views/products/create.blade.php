<h2>Add Product</h2>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="name" placeholder="Name"><br>
    <textarea name="description"></textarea><br>
    <input type="number" name="price" placeholder="Price"><br>
    <input type="file" name="image"><br>

    <button>Add</button>
</form>