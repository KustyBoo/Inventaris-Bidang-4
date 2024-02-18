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

    public $barangaset, $baranghabispakai, $exportbarang;

    public function __construct($barangaset, $baranghabispakai, $exportbarang)
    {
        $this->barangaset = $barangaset;
        $this->baranghabispakai = $baranghabispakai;
        $this->exportbarang = $exportbarang;
    }

    public function view(): View
    {
        $barangaset = BarangMasuk::where('kategori_barang', '1')->get();
        $baranghabispakai = BarangMasuk::where('kategori_barang', '2')->get();
        return view('barangmasuk.export', ['barangaset' => $this->barangaset, 'baranghabispakai' => $this->baranghabispakai, 'exportbarang' => $this->exportbarang,]);
    }

}
