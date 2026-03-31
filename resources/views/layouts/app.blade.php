<!DOCTYPE html>
<html>
<head>
    <title>Ecommerce App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">E-Shop</a>

        <div>
            <a href="/products" class="btn btn-light">Products</a>
            <a href="/cart" class="btn btn-light">Cart</a>
            <a href="/orders" class="btn btn-light">Orders</a>

            @auth
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button class="btn btn-danger">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</nav>

<!-- CONTENT -->
<div class="container mt-4">

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @yield('content')
</div>

</body>
</html>