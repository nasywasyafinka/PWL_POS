<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => 'SPORT1',
                'barang_nama' => 'Onitsuka Tiger',
                'harga_beli' => 2000000,
                'harga_jual' => 2500000
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 1,
                'barang_kode' => 'SPORT2',
                'barang_nama' => 'Kronikel Project',
                'harga_beli' => 500000,
                'harga_jual' => 550000
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 1,
                'barang_kode' => 'SPORT3',
                'barang_nama' => 'New Balance 550',
                'harga_beli' => 1000000,
                'harga_jual' => 1800000
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 2,
                'barang_kode' => 'OBT1',
                'barang_nama' => 'Tempra Anak',
                'harga_beli' => 100000,
                'harga_jual' => 120000
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 2,
                'barang_kode' => 'OBT2',
                'barang_nama' => 'Antasida',
                'harga_beli' => 100000,
                'harga_jual' => 130000
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 2,
                'barang_kode' => 'OBT3',
                'barang_nama' => 'IPI Vit C',
                'harga_beli' => 5000,
                'harga_jual' => 8000
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 3,
                'barang_kode' => 'FURN1',
                'barang_nama' => 'Sapu',
                'harga_beli' => 20000,
                'harga_jual' => 25000
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 3,
                'barang_kode' => 'FURN2',
                'barang_nama' => 'Bolde Pel',
                'harga_beli' => 30000,
                'harga_jual' => 35000
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 3,
                'barang_kode' => 'FURN3',
                'barang_nama' => 'Sulak',
                'harga_beli' => 15000,
                'harga_jual' => 20000
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 4,
                'barang_kode' => 'TECH1',
                'barang_nama' => 'USB Cable',
                'harga_beli' => 20000,
                'harga_jual' => 30000
            ],
            [
                'barang_id' => 11,
                'kategori_id' => 4,
                'barang_kode' => 'TECH2',
                'barang_nama' => 'Logitech Mouse',
                'harga_beli' => 100000,
                'harga_jual' => 110000
            ],
            [
                'barang_id' => 12,
                'kategori_id' => 4,
                'barang_kode' => 'TECH3',
                'barang_nama' => 'Toucpen',
                'harga_beli' => 120000,
                'harga_jual' => 130000
            ],
            [
                'barang_id' => 13,
                'kategori_id' => 5,
                'barang_kode' => 'BABY1',
                'barang_nama' => 'Piyama Anak',
                'harga_beli' => 50000,
                'harga_jual' => 55000
            ],
            [
                'barang_id' => 14,
                'kategori_id' => 5,
                'barang_kode' => 'BABY2',
                'barang_nama' => 'Morinaga Platinum 1kg',
                'harga_beli' => 300000,
                'harga_jual' => 350000
            ],
            [
                'barang_id' => 15,
                'kategori_id' => 5,
                'barang_kode' => 'BABY3',
                'barang_nama' => 'Stroller Bayi',
                'harga_beli' => 1000000,
                'harga_jual' => 1500000
            ]
        ];
        DB::table('m_barang')->insert($data);
    }
}