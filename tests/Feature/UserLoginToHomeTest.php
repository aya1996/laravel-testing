<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserLoginToHomeTest extends TestCase
{
   

    /**
     * A basic feature test for redirecting to home page after login
     * @return void
     * @test
     */

    public function test_auth_user_can_access_home()
    {
        $user = User::factory()->create([
            'name' => 'aya',
            'email' => 'aya@gmail.com',
            'password' => bcrypt('password')
        ]);

        $response = $this->actingAs($user)->get('/home');
        $response->assertStatus(200);
        
        
    }
}
