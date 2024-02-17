<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $barang = Barang::all();

        $barangmasuk = BarangMasuk::all();
        $barangmasuktotal = $barangmasuk->count();

        $barang_keluar = BarangKeluar::with('barang_masuk')->get();
        $barangkeluartotal = $barang_keluar->count();

        $totalbarangmasukkeluar = $barangmasuktotal + $barangkeluartotal;

        $daftaruser = User::all();

        $start_date = now()->subDays(30);
        $end_date = now();
        $barangmasuk30hari = BarangMasuk::whereBetween('tanggal_masuk', [$start_date, $end_date])->get();
        $barangkeluar30hari = BarangKeluar::whereBetween('tanggal_keluar', [$start_date, $end_date])->get();
        $total30hari = $barangmasuk30hari->count() + $barangkeluar30hari->count();

        $hariini = date('Y-m-d');
        $barangmasukhariini = BarangMasuk::where('tanggal_masuk',$hariini)->get()->count();
        $barangkeluarhariini = BarangKeluar::where('tanggal_keluar',$hariini)->get()->count();

        $barangmasukrecent = BarangMasuk::latest()->first();
        $barangkeluarrecent = BarangKeluar::latest()->first();

        $tahunSekarang = date('Y');

        $barangmasuktiapbulan = BarangMasuk::select(DB::raw('MONTHNAME(tanggal_masuk) as month, COUNT(*) as count'))
            ->whereYear('tanggal_masuk', $tahunSekarang)
            ->groupBy(DB::raw('MONTHNAME(tanggal_masuk)'))
            ->orderByRaw('MONTH(tanggal_masuk)')
            ->get();

        $barangmasuktiapbulancount = [];

        foreach ($barangmasuktiapbulan as $hitungbarang) {
            $barangmasuktiapbulancount[$hitungbarang->month] = $hitungbarang->count;
        }

        $barangaset = BarangMasuk::where('kategori_barang', '1')->get();
        $baranghabispakai = BarangMasuk::where('kategori_barang', '2')->get();

        return view('home', [
            'barangkeluarrecent' => $barangkeluarrecent,
            'barangmasukrecent' => $barangmasukrecent,
            'barangkeluarhariini' => $barangkeluarhariini,
            'barangmasukhariini' => $barangmasukhariini,
            'barangaset' => $barangaset,
            'baranghabispakai' => $baranghabispakai,
            'barangsemua' => $barang,
            'barangmasuktiapbulan' => $barangmasuktiapbulancount,
            'barangmasuk' => $barangmasuk,
            'barangkeluar' => $barang_keluar,
            'daftaruser' => $daftaruser,
            'total30hari' => $total30hari,
            'barangmasuktotal' => $barangmasuktotal,
            'barangkeluartotal' => $barangkeluartotal,
            'totalbarangmasukkeluar' => $totalbarangmasukkeluar
        ]);
    }

}
