<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table ='barang_keluar';
    protected $guarded = [];

    public function barangmasuk(){
        return $this->belongsTo(BarangMasuk::class,'barang_id');
    }
}
