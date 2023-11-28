<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beli extends Model
{
    use HasFactory;
    // Mendefinisikan nama table yang digunakan
    protected $table = 'tbl_beli';
    // Fillable digunakan untuk menentukan kolom apa saja yang dapat diisi
    protected $fillable = [
        'notransaksi',
        'kode_suplier',
        'tanggal_beli'
    ];

}
