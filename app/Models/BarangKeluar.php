<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table ='barang_keluar';
    protected $guarded = [];

    public function barang(){
        return $this->belongsTo(Barang::class,'id_barang');
    }
    public function barang_masuk(){
        return $this->belongsTo(BarangMasuk::class,'id_barang');
    }
}
