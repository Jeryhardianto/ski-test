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
        for ($i=1; $i <= 10; $i++) {
            DB::table('tbl_barang')->insert([
                'kode_barang' => 'B' .date('Ym'. '0'.$i.''),
                'nama_barang' => 'Barang '.$i.'',
                'harga_beli' => '2000',
                'satuan' => 'pcs',
            ]);
        }
    
    }
}
