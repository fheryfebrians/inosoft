<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    public function testLogin()
    {
        $loginData = [
            'email' => "user@email.com",
            'password' => "password"
        ];

        $this->json('POST', 'api/login', $loginData, ['Accept' => 'Application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                'user' => [
                    'name', 'email'
                ],
                'token'
            ]);
        
            $this->assertAuthenticated();
    }
}
