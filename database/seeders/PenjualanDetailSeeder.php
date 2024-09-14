<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $data=[
            [
                'penjualan_id' => 1,
                'barang_id' => 1,
                'harga' => 25000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 1,
                'barang_id' => 2,
                'harga' => 5500000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 1,
                'barang_id' => 3,
                'harga' => 8000000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 2,
                'barang_id' => 2,
                'harga' => 5500000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 2,
                'barang_id' => 4,
                'harga' => 120000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 2,
                'barang_id' => 6,
                'harga' => 8000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 3,
                'barang_id' => 2,
                'harga' => 5500000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 3,
                'barang_id' => 9,
                'harga' => 20000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 3,
                'barang_id' => 12,
                'harga' => 130000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 4,
                'barang_id' => 2,
                'harga' => 5500000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 4,
                'barang_id' => 10,
                'harga' => 30000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 4,
                'barang_id' => 14,
                'harga' => 250000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 5,
                'barang_id' => 2,
                'harga' => 5500000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 5,
                'barang_id' => 2,
                'harga' => 5500000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 5,
                'barang_id' => 10,
                'harga' => 30000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 6,
                'barang_id' => 11,
                'harga' => 110000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 6,
                'barang_id' => 15,
                'harga' => 25000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 6,
                'barang_id' => 13,
                'harga' => 55000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 7,
                'barang_id' => 14,
                'harga' => 250000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 7,
                'barang_id' => 2,
                'harga' => 5500000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 7,
                'barang_id' => 9,
                'harga' => 20000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 8,
                'barang_id' => 8,
                'harga' => 25000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 8,
                'barang_id' => 12,
                'harga' => 130000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 8,
                'barang_id' => 6,
                'harga' => 8000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 9,
                'barang_id' => 10,
                'harga' => 30000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 9,
                'barang_id' => 11,
                'harga' => 110000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 9,
                'barang_id' => 15,
                'harga' => 25000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 10,
                'barang_id' => 12,
                'harga' => 130000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 10,
                'barang_id' => 15,
                'harga' => 25000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
            [
                'penjualan_id' => 10,
                'barang_id' => 2,
                'harga' => 5500000,
                'jumlah' => $faker -> numberBetween(1, 9)
            ],
        ];
        DB::table('t_penjualan_detail')->insert($data); 
    }
}