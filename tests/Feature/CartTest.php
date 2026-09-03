<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product;

class CartTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase; 
     public function test_user_can_add_to_cart()
    {
         $user = User::factory()->create();
    $product = Product::factory()->create();

   /* $response = $this->actingAs($user)->post('/cart/add', [
        'product_id' => $product->id,
        'quantity' => 2
    ]);*/
    //$response = $this->actingAs($user)->get('/cart/add/' . $product->id);
//$response->assertStatus(302); // redirect
 $response = $this->actingAs($user, 'web') // ✅ ensure auth guard
        ->get(route('cart.add', $product->id));

    $response->assertStatus(302);

    $this->assertDatabaseHas('carts', [
        'user_id' => $user->id,
        'product_id' => $product->id
    ]);
        // your test logic here
    }
    public function test_guest_cannot_add_to_cart()
{
    $product = Product::factory()->create();

     $response = $this->get(route('cart.add', $product->id));

    $response->assertRedirect('/login'); // redirected by auth middleware

   // $response->assertRedirect('/login');
}

    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
