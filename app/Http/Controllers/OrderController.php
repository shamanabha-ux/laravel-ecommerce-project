<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
class OrderController extends Controller
{
public function checkoutnn()
{
    $cartItems = Cart::with('product')
        ->where('user_id', auth()->id())
        ->get();

    if ($cartItems->isEmpty()) {
        return redirect()->back()->with('error', 'Cart is empty');
    }

    $total = 0;

    foreach ($cartItems as $item) {
        $total += $item->product->price * $item->quantity;
    }

    $order = Order::create([
        'user_id' => auth()->id(),
        'total_price' => $total,
        'status' => 'pending'
    ]);

    foreach ($cartItems as $item) {
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $item->product_id,
            'quantity' => $item->quantity,
            'price' => $item->product->price
        ]);
    }

    // Clear cart
    Cart::where('user_id', auth()->id())->delete();

    return redirect()->route('orders.index')->with('success', 'Order placed');
}
public function index()
{
    $orders = Order::with('items.product')
        ->where('user_id', auth()->id())
        ->get();

    return view('orders.index', compact('orders'));
}
}