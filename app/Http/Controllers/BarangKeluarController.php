<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\BarangKeluar;
use Illuminate\Support\Facades\Auth;

class BarangKeluarController extends Controller
{
    public function index()
    {   
        $currentuser = Auth::user()->name;
        $historybarangkeluar = BarangKeluar::where('nama_pengambil',$currentuser)->get();
        $barang_masuk = BarangMasuk::all();
        $barang_keluar = BarangKeluar::with('barang_masuk')->get();
        return view('barangkeluar.index', ['barangkeluar' => $barang_keluar, 'barangmasuk' => $barang_masuk, 'historybarangkeluar' => $historybarangkeluar,]);
    }

    public function create()
    {
        $barang_masuk = BarangMasuk::all();
        return view('barangkeluar.create', ['barangmasuk' => $barang_masuk]);
    }

    public function store(Request $request)
    {
        $username = Auth::user()->name;

        if (($request->jumlah_ambil) == 0) {
            return back()->withErrors(['jumlah_ambil' => 'Jumlah ambil tidak bisa kosong']);
        }

        $request->validate([
            'barang_id' => ['required'],
            'jumlah_ambil' => ['required', 'numeric'],
            'tanggal_keluar' => ['required', 'date'],
            'foto_barang' => ['required', 'file', 'mimes:jpeg,png'],
        ]);

        $photo = $request->file('foto_barang');
        $destinationPath = 'img/barangkeluar';
        $sendPhoto = date('YmdHis') . '.' . $photo->getClientOriginalExtension();
        $photo->move($destinationPath, $sendPhoto);

        $id_barang_masuk = BarangMasuk::find($request->barang_id);

        if ($id_barang_masuk) {
            $id_barang = $id_barang_masuk->id_barang;
            $stok_barang = Barang::find($id_barang)->banyak_barang;

            if ($stok_barang >= $request->jumlah_ambil) {
                $stok_updated = $stok_barang - $request->jumlah_ambil;
                $barang_update = Barang::find($id_barang);
                $barang_update->update([
                    'banyak_barang' => $stok_updated,
                ]);
                
                $barang_keluar = BarangKeluar::create([
                    'nama_pengambil' => $request->nama_pengambil,
                    'reg' => $id_barang_masuk->reg,
                    'nama_jenis_barang' => $id_barang_masuk->nama_jenis_barang,
                    'merek_tipe_barang' => $id_barang_masuk->merek_tipe_barang,
                    'no_pabrik' => $id_barang_masuk->no_pabrik,
                    'bahan' => $id_barang_masuk->bahan,
                    'perolehan_barang' => $id_barang_masuk->perolehan_barang,
                    'tahun_pembelian' => $id_barang_masuk->tahun_pembelian,
                    'banyak_barang' => $request->jumlah_ambil,
                    'ukuran_barang' => $id_barang_masuk->ukuran_barang,
                    'satuan' => $id_barang_masuk->satuan,
                    'keadaan_barang' => $id_barang_masuk->keadaan_barang,
                    'harga_satuan_barang' => $id_barang_masuk->harga_satuan_barang,
                    'jumlah_harga_barang' => $id_barang_masuk->jumlah_harga_barang,
                    'kode_ruangan' => $id_barang_masuk->kode_ruangan,
                    'tanggal_keluar' => $request->tanggal_keluar,
                    'foto_barang' => $sendPhoto,
                    'kategori_barang' => $id_barang_masuk->kategori_barang,
                    'id_barang_masuk' => $id_barang_masuk->id,
                ]);

                return redirect()->route('barangkeluar.index');
            } else {
                return back()->withErrors(['jumlah_ambil' => 'Stok tidak valid']);
            }
        } else {
            return back()->withErrors(['barang_id' => 'Invalid barang_id.']);
        }
    }
}
