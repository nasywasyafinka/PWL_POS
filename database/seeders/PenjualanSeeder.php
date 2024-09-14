<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $data=[
            [
                'user_id' => $faker->numberBetween(1,3),
                'pembeli' => $faker->name,
                'penjualan_kode' => 'SATU',
                'penjualan_tanggal' => '2024-09-09 00:00:00'
            ],
            [
                'user_id' => 1,
                'pembeli' => $faker->name,
                'penjualan_kode' => 'DUA',
                'penjualan_tanggal' => '2024-09-09 00:00:00'
            ],
            [
                'user_id' => 1,
                'pembeli' => $faker->name,
                'penjualan_kode' => 'TIGA',
                'penjualan_tanggal' => '2024-09-09 00:00:00'
            ],
            [
                'user_id' => 1,
                'pembeli' => $faker->name,
                'penjualan_kode' => 'EMPAT',
                'penjualan_tanggal' => '2024-09-09 00:00:00'
            ],
            [
                'user_id' => 1,
                'pembeli' => $faker->name,
                'penjualan_kode' => 'LIMA',
                'penjualan_tanggal' => '2024-09-09 00:00:00'
            ],
            [
                'user_id' => 2,
                'pembeli' => $faker->name,
                'penjualan_kode' => 'ENAM',
                'penjualan_tanggal' => '2024-09-09 00:00:00'
            ],
            [
                'user_id' => 2,
                'pembeli' => $faker->name,
                'penjualan_kode' => 'TUJUH',
                'penjualan_tanggal' => '2024-09-09 00:00:00'
            ],
            [
                'user_id' => 3,
                'pembeli' => $faker->name,
                'penjualan_kode' => 'DELAPAN',
                'penjualan_tanggal' => '2024-09-09 00:00:00'
            ],
            [
                'user_id' => 3,
                'pembeli' => $faker->name,
                'penjualan_kode' => 'SEMBILAN',
                'penjualan_tanggal' => '2024-09-09 00:00:00'
            ],
            [
                'user_id' => 3,
                'pembeli' => $faker->name,
                'penjualan_kode' => 'SEPULUH',
                'penjualan_tanggal' => '2024-09-09 00:00:00'
            ],
        ];
        DB::table('t_penjualan')->insert($data);
    }
}