<?php

namespace App\Exports;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class BarangMasukExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;

    public $tanggal_masuk, $barangaset, $baranghabispakai;

    public function __construct($tanggal_masuk, $barangaset, $baranghabispakai)
    {
        $this->tanggal_masuk = $tanggal_masuk;
        $this->barangaset = $barangaset;
        $this->baranghabispakai = $baranghabispakai;
    }

    public function view(): View
    {
        $barangaset = BarangMasuk::where('kategori_barang', '1')->get();
        $baranghabispakai = BarangMasuk::where('kategori_barang', '2')->get();
        return view('barangmasuk.export', ['barangaset' => $this->barangaset, 'baranghabispakai' => $this->baranghabispakai]);
    }

}
