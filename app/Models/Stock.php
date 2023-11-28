<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    // Mendefinisikan nama table yang digunakan
    protected $table = 'tbl_stock';
    // Fillable digunakan untuk menentukan kolom apa saja yang dapat diisi
    protected $guard = ['id'];
    // relasi ke table barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kode_barang', 'kode_barang');
    }
    
}
