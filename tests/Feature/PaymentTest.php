<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class PaymentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
     use RefreshDatabase;

    public function test_payment_success()
    {
        Http::fake([
            '*' => Http::response(['status' => 'success'], 200)
        ]);

        $response = $this->post('/payment');

        $response->assertStatus(200);
    }
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
