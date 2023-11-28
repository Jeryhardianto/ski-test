<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    // Mendefinisikan nama table yang digunakan
    protected $table = 'tbl_barang';
    // Fillable digunakan untuk menentukan kolom apa saja yang dapat diisi
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'harga_beli',
        'satuan',
    ];
}
