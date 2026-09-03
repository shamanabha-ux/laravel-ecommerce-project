<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_user_can_register()
{
    $response = $this->post('/register', [
        'name' => 'Shama',
        'email' => 'shama@test.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $response->assertStatus(302); // redirect after success

    $this->assertDatabaseHas('users', [
        'email' => 'shama@test.com'
    ]);
} 
public function test_user_can_login()
{
    $user = User::factory()->create([
        'password' => bcrypt('password')
    ]);

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password'
    ]);

    $response->assertRedirect('/dashboard'); // or your home route
}

    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
