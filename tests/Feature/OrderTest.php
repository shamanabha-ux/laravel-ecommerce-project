<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_order_is_created()
{
    $user = User::factory()->create();

    $order = Order::create([
        'user_id' => $user->id,
        'total' => 500
    ]);

    $this->assertDatabaseHas('orders', [
        'user_id' => $user->id
    ]);
}
public function test_checkout_requires_fields()
{
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/checkout', []);

    $response->assertSessionHasErrors();
}
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
