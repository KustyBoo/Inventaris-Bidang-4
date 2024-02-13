<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table ='barang_masuk';
    protected $guarded = [];

    public function barang(){
        return $this->belongsTo(Barang::class,'id_barang');
    }

    public function barang_keluar(){
        return $this->hasMany(BarangKeluar::class,'id_barang');
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class,'kategori_barang');
    }
}
