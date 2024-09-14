<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
     
    public function run(): void
    {
        
        $data=[
            [
                'supplier_id' => 1,
                'supplier_kode' => 'S1',
                'supplier_nama' => 'Sports Station',
                'supplier_alamat' => 'Surabaya'
            ],
            [
                'supplier_id' => 2,
                'supplier_kode' => 'S2',
                'supplier_nama' => 'IKEA',
                'supplier_alamat' => 'Malang'
            ],
            [
                'supplier_id' => 3,
                'supplier_kode' => 'S3',
                'supplier_nama' => 'KIDSZONE',
                'supplier_alamat' => 'Gresik'
            ]
        ];
        DB::table('m_supplier')->insert($data);
    }
}