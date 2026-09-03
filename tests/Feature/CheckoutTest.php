<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CheckoutTest extends TestCase
{
    /**
     * A basic feature test example.
     */
 use RefreshDatabase;
    public function test_checkout_fails_if_cart_empty()
{
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/checkout');

    $response->assertSessionHas('error');
}
public function test_user_can_checkout_with_items()
{
    $user = User::factory()->create();
    $product = Product::factory()->create();

    Cart::create([
        'user_id' => $user->id,
        'product_id' => $product->id,
        'quantity' => 1
    ]);

    $response = $this->actingAs($user)->post('/checkout');

    $response->assertStatus(200);
}
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
