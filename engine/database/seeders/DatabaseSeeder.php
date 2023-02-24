<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::collection('users')->insert([
            'name' => "users",
            'email' => "user@email.com",
            'password' => bcrypt("password")
        ]);

        DB::collection('kendaraans')->insert([
            'tahun_keluaran' => "2000",
            'warna' => "merah",
            'harga' => "2000",
            'stok' => "50",
            'jenis' => "mobil",
            'mesin' => "aman",
            'kapasitas_penumpang' => "4",
            'tipe' => "terbaru",
            'tipe_suspensi' => NULL,
            'tipe_transmisi' => NULL
        ]);

        DB::collection('kendaraans')->insert([
            'tahun_keluaran' => "2001",
            'warna' => "biru",
            'harga' => "5000",
            'stok' => "50",
            'jenis' => "motor",
            'mesin' => "aman",
            'kapasitas_penumpang' => NULL,
            'tipe' => NULL,
            'tipe_suspensi' => "suspensi",
            'tipe_transmisi' => "manual"
        ]);
    }
}
