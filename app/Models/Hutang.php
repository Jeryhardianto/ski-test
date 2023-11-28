<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hutang extends Model
{
    use HasFactory;
    // Mendefinisikan nama table yang digunakan
    protected $table = 'tbl_hutang';
    //  Fillable digunakan untuk menentukan kolom apa saja yang dapat diisi
    protected $fillable = [
        'notransaksi',
        'kode_supplier',
        'tanggal_beli',
        'total_hutang',
    ];
}
