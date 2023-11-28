<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <= 5; $i++) {
            DB::table('tbl_suplier')->insert([
                'kode_suplier' => 'S' .date('Ym'. '00'.$i.''),
                'nama_suplier' => 'Suplier '.$i.'',
            ]);
        }
    }
}
