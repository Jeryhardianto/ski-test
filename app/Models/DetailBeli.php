<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBeli extends Model
{
    use HasFactory;
    // Mendefinisikan nama table yang digunakan
    protected $table = 'tbl_detail_beli';
    //  Fillable digunakan untuk menentukan kolom apa saja yang dapat diisi
    protected $fillable = [
        'notransaksi',
        'kode_barang',
        'harga_beli',
        'qty',
        'diskon',
        'diskon_rp',
        'total'
    ];
}
