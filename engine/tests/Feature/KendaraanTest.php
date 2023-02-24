<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class KendaraanTest extends TestCase
{

    public function testListKendaraan()
    {
        $user = new User([
            'email' => 'user@email.com',
            'password' => 'password'
        ]);

        $this->actingAs($user, 'api');

        $this->json('GET', 'api/kendaraan', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    '*' => [
                        'tahun_keluaran', 'warna', 'harga', 'stok', 'jenis', 'mesin', 'tipe_suspensi', 'tipe_transmisi', 'kapasitas_penumpang', 'tipe'
                    ]
                ]
            ]);
    }

    public function testCreatedKendaraan()
    {
        $user = new User([
            'email' => 'user@email.com',
            'password' => 'password'
        ]);

        $this->actingAs($user, 'api');

        $kendaraanData = [
            'tahun_keluaran' => "2010",
            'warna' => "merah",
            'harga' => "7000",
            'jenis' => "mobil",
            'mesin' => "aman",
            'kapasitas_penumpang' => "4",
            'tipe' => "manual",
            'stok' => "20"
        ];

        $this->json('POST', 'api/kendaraan', $kendaraanData, ['Accept' => 'application/json'])
            ->assertJson([
                'status' => 200,
                'message' => 'Success',
                'data' => $kendaraanData
            ]);
    }

    public function testKendaraanById()
    {
        $user = new User([
            'email' => 'user@email.com',
            'password' => 'password'
        ]);

        $this->actingAs($user, 'api');

        $this->json('GET', 'api/kendaraan', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    [
                        'tahun_keluaran', 'warna', 'harga', 'stok', 'jenis', 'mesin', 'tipe_suspensi', 'tipe_transmisi', 'kapasitas_penumpang', 'tipe'
                    ]
                ]
            ]);
    }
}
