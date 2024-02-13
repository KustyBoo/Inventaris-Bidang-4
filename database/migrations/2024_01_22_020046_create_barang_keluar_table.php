<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->id();
            // $table->string('kode_barang');
            $table->string('nama_pengambil');
            $table->string('reg');    
            $table->string('nama_jenis_barang');
            $table->string('merek_tipe_barang');
            $table->string('no_pabrik');
            $table->string('bahan');
            $table->string('perolehan_barang');
            $table->integer('tahun_pembelian');
            $table->string('ukuran_barang');
            $table->string('satuan');
            $table->string('keadaan_barang');
            // $table->integer('banyak_barang');
            $table->bigInteger('harga_satuan_barang');
            $table->bigInteger('jumlah_harga_barang');
            $table->integer('kode_ruangan'); 
            $table->date('tanggal_keluar');
            $table->string('foto_barang'); 
            $table->unsignedBigInteger('kategori_barang');
            $table->foreign('kategori_barang')->references('id')->on('kategori')->onDelete('cascade');
            $table->unsignedBigInteger('id_barang_masuk');
            $table->foreign('id_barang_masuk')->references('id')->on('barang_masuk')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_keluar');
    }
};
