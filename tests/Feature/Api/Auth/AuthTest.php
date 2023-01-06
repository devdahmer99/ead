<?php

namespace Tests\Feature\Api\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Api\UtilsTrait;

class AuthTest extends TestCase
{
    use UtilsTrait;

    public function test_fail_auth()
    {
        $response = $this->postJson('/auth', []);

        $response->assertStatus(422);
    }

    public function test_auth()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/auth', [
            'email' => $user->email,
            'password' => 'password',
            'device_name' => 'teste'
        ]);

        $response->dump();

        $response->assertStatus(200);
    }

    public function test_erro_logout()
    {
        $response = $this->postJson('/logout');

        $response->assertStatus(401);
    }

    public function test_logout()
    {
        $token = $this->createTokenUser();

        $response = $this->postJson('/logout', [], $this->defaultHeaders());

        $response->assertStatus(200);
    }

    public function test_get_me()
    {
        $token = $this->createTokenUser();

        $response = $this->getJson('/me', $this->defaultHeaders());

        $response->assertStatus(200);
    }
}
