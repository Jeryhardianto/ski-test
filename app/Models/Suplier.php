<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    use HasFactory;
    // Mendefinisikan nama table yang digunakan
    protected $table = 'tbl_suplier';
    // Fillable digunakan untuk menentukan kolom apa saja yang dapat diisi
    protected $fillable = [
        'kode_suplier',
        'nama_suplier'
    ];
}
