<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_products_page_loads()
{
    $response = $this->get('/products');

    $response->assertStatus(200);
}
public function test_product_is_created()
{
    $product = Product::factory()->create();

    $this->assertDatabaseHas('products', [
        'id' => $product->id
    ]);
}
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
