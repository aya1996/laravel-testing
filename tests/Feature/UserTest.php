<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{

    use RefreshDatabase;
    public function test_login_redirect_to_home_successfully()
    {
        $user = User::factory()->create([
            'email' => 'test@test.com',
            'password' => bcrypt('password')
        ]);

        // $response = $this->post('/login', [
        //     'email' => 'test@test.com',
        //     'password' => 'password'
        // ]);

        // $response->assertStatus(302);
        // $response->assertRedirect('/home');

        $response = $this->actingAs($user)->get('/home');

        // $response->assertRedirect('/home');

        $response->assertStatus(200);
        // dd($response);
    }

    public function test_auth_user_can_access_home()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/home');
        $response->assertStatus(200);
    }

    public function test_unath_user_cannot_access_dasboard()
    {
        $response = $this->get('/home');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_user_has_name_attribute()
    {
        $user = User::factory()->create([
            'name' => 'aya',
            'email' => 'test@test.com',
            'password' => bcrypt('password')
        ]);

        $this->assertEquals('aya', $user->name);
    }
}
