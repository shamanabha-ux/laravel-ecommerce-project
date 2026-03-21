<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    //
    public function add($id)
{
    $product = Product::findOrFail($id);

    $cart = Cart::where('user_id', auth()->id())
                ->where('product_id', $id)
                ->first();

    if ($cart) {
        $cart->increment('quantity');
    } else {
        Cart::create([
            'user_id' => auth()->id(),
            'product_id' => $id,
            'quantity' => 1
        ]);
    }

    return redirect()->back()->with('success', 'Added to cart');
}

public function index()
{
    $cartItems = Cart::with('product')
        ->where('user_id', auth()->id())
        ->get();

    return view('cart.index', compact('cartItems'));
}

public function remove($id)
{
    Cart::where('id', $id)->delete();
    return redirect()->back()->with('success', 'Item removed');
}
}
