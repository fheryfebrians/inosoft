<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class PenjualanTest extends TestCase
{
    public function testListPenjualan()
    {
        $user = new User([
            'email' => 'user@email.com',
            'password' => 'password'
        ]);

        $this->actingAs($user, 'api');

        $this->json('GET', 'api/penjualan', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    '*' => [
                        'kendaraan_id', 'jumlah'
                    ]
                ]
            ]);
    }

    public function testCreatedPenjualan()
    {
        $user = new User([
            'email' => 'user@email.com',
            'password' => 'password'
        ]);

        $this->actingAs($user, 'api');

        $penjualanData = [
            'kendaraan_id' => "5",
            'jumlah' => "20"
        ];

        $this->json('POST', 'api/penjualan', $penjualanData, ['Accept' => 'application/json'])
            ->assertJson([
                'status' => 200,
                'message' => 'Success',
                'data' => $penjualanData
            ]);
    }

    public function testPenjualanById()
    {
        $user = new User([
            'email' => 'user@email.com',
            'password' => 'password'
        ]);

        $this->actingAs($user, 'api');

        $this->json('GET', 'api/penjualan', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    [
                        'kendaraan_id', 'jumlah'
                    ]
                ]
            ]);
    }
}
