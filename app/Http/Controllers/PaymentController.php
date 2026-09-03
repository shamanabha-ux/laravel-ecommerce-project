<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;

class PaymentController extends Controller
{
    public function checkout()
    {
        // ✅ GET CART ITEMS (moved from OrderController)
        $cartItems = Cart::with('product')
            ->where('user_id', auth()->id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Cart is empty');
        }

        // ✅ CALCULATE TOTAL (moved)
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->product->price * $item->quantity;
        }

        // ✅ CREATE ORDER (but keep it pending)
        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $total,
            'status' => 'pending'
        ]);

        // ✅ CREATE ORDER ITEMS (moved)
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price
            ]);
        }

        // ❗ DO NOT CLEAR CART YET

        // ✅ STRIPE PAYMENT INTENT
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $intent = \Stripe\PaymentIntent::create([
            'amount' => $total * 100,
            'currency' => 'inr',
            'metadata' => [
                'order_id' => $order->id
            ]
        ]);

        return view('checkout', [
            'clientSecret' => $intent->client_secret,
            'total' => $total,
            'order_id' => $order->id
        ]);
    }

    public function success(Request $request)
    {
        $order = Order::find($request->order_id);

        if ($order) {
            $order->update([
                'status' => 'paid'
            ]);

            // ✅ NOW CLEAR CART
            Cart::where('user_id', auth()->id())->delete();
        }

        return view('success');
    }
}

