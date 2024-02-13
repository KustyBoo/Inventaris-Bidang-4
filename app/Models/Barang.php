<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table ='barang';
    protected $guarded = [];
    public function barang_masuk(){
        return $this->hasMany(BarangMasuk::class,'id_barang');
    }
    public function barang_keluar(){
        return $this->hasMany(BarangKeluar::class,'id_barang');
    }
    
}
