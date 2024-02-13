<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\BarangKeluar;
use Illuminate\Support\Facades\Auth;

class BarangKeluarController extends Controller
{
    public function index()
    {   
        $barang_masuk = BarangMasuk::all(); 
        $barang_keluar = BarangKeluar::with('barang_masuk')->get();
        return view('barangkeluar.index', ['barangkeluar' => $barang_keluar, 'barangmasuk' => $barang_masuk]);
    }

    public function create()
    {
        $barang_masuk = BarangMasuk::all(); 
        return view('barangkeluar.create', ['barangmasuk' => $barang_masuk]);
    }

    public function store(Request $request)
    {
        $username = Auth::user()->name;

        if(($request->jumlah_ambil) == 0){
            return back()->withErrors(['jumlah_ambil' => 'Jumlah ambil tidak bisa kosong']);
        }

        $request->validate([
            'barang_id' => ['required'],
            'jumlah_ambil' => ['required', 'numeric'],
            'tanggal_keluar' => ['required', 'date'],
            'foto_barang' => ['required', 'file','mimes:jpeg,png'],
        ]);

        $photo = $request->file('foto_barang');
        $destinationPath = 'img/barang';
        $sendPhoto = date('YmdHis') . '.' . $photo->getClientOriginalExtension();
        $photo->move($destinationPath, $sendPhoto);

        $id_barang_masuk = BarangMasuk::find($request->barang_id);

        if ($id_barang_masuk) {
            $stok_barang = $id_barang_masuk->stok;

            if ($stok_barang >= $request->jumlah_ambil) {
                $stok_updated = $stok_barang - $request->jumlah_ambil;

                $id_barang_masuk->update([
                    'stok' => $stok_updated,
                ]);

                $barang_keluar = BarangKeluar::create([
                    'nama_pengambil' => $username,
                    'barang_id' => $request->barang_id,
                    'jumlah_ambil' => $request->jumlah_ambil,
                    'tanggal_keluar' => $request->tanggal_keluar,
                    'foto_barang' => $sendPhoto,
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
