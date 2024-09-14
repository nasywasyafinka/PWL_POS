<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\db;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [
                'kategori_id' => 1,
                'kategori_kode' => 'SPORT',
                'kategori_nama' => 'Alat Olahraga',
            ],
            [
                'kategori_id' => 2,
                'kategori_kode' => 'OBT',
                'kategori_nama' => 'Obat-Obatan',
            ],
            [
                'kategori_id' => 3,
                'kategori_kode' => 'FURN',
                'kategori_nama' => 'Furniture',
            ],
            [
                'kategori_id' => 4,
                'kategori_kode' => 'TECH',
                'kategori_nama' => 'Gadget & Pc',
            ],
            [
                'kategori_id' => 5,
                'kategori_kode' => 'BABY',
                'kategori_nama' => 'Kebutuhan Bayi',
            ],
        ];
        DB::table('m_kategori')->insert($data);
    }
}