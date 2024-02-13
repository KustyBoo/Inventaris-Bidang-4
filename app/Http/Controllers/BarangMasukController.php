<?php

namespace App\Http\Controllers;

use App\Exports\BarangMasukExport;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\BarangMasuk;
use Maatwebsite\Excel\Facades\Excel;


class BarangMasukController extends Controller
{
    public function index() 
    {
        $barang_stok = Barang::all();
        $barang_masuk = BarangMasuk::all();

        // return $barang_masuk;
        return view('barangmasuk.index', ['barangmasuk' => $barang_masuk, 'barangstok' => $barang_stok]);
    }

    public function show($id)
    {

    }

    public function create ()
    {
        $kategori = Kategori::all();
        return view('barangmasuk.create', ['kategori' => $kategori]);
    }

    public function store (Request $request)
    {   
        $request->validate([
            'kode_barang' => ['required'],
            'reg' => ['required'],
            'nama_jenis_barang' => ['required'],
            'merek_tipe_barang' => ['required'],
            'perolehan_barang' => ['required'],
            'tahun_pembelian' => ['required', 'numeric'],
            'keadaan_barang' => ['required'],
            'banyak_barang' => ['required'],
            'harga_satuan_barang' => ['required', 'numeric'],
            'jumlah_harga_barang' => ['required', 'numeric'],
            'kode_ruangan' => ['required', 'numeric'],
            'tanggal_masuk' => ['required', 'date'],
            'kategori_barang' => ['required', 'numeric'],
            'foto_barang' => ['required', 'file','mimes:jpeg,png'],
        ]);

        if(($request->banyak_barang) == 0){
            return back()->withErrors(['banyak_barang' => 'jumlah tidak bisa kosong']);
        }

        $photo = $request->file('foto_barang');
        $destinationPath = 'img/barang';
        $sendPhoto = date('YmdHis') . '.' . $photo->getClientOriginalExtension();
        $photo->move($destinationPath, $sendPhoto);

        $barang = Barang::create([
            'kode_barang' => $request->kode_barang,
            'banyak_barang' => $request->banyak_barang,
        ]);

        $barang_masuk = BarangMasuk::create([
            'reg' => $request->reg,
            'nama_jenis_barang' => $request->nama_jenis_barang,
            'merek_tipe_barang' => $request->merek_tipe_barang,
            'no_pabrik' => $request->no_pabrik,
            'bahan' => $request->bahan,
            'perolehan_barang' => $request->perolehan_barang,
            'tahun_pembelian' => $request->tahun_pembelian,
            'ukuran_barang' => $request->ukuran_barang,
            'satuan' => $request->satuan,
            'keadaan_barang' => $request->keadaan_barang,
            'harga_satuan_barang' => $request->harga_satuan_barang,
            'jumlah_harga_barang' => $request->jumlah_harga_barang,
            'kode_ruangan' => $request->kode_ruangan,
            'id_barang' => $barang->id,
            'kategori_barang' =>$request->kategori_barang,
            'foto_barang' => $sendPhoto,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        return redirect()->route('barangmasuk.index');
    }

    public function edit($id){
        $barang_masuk = BarangMasuk::find($id);
        $kategori = Kategori::all();
        return view('barangmasuk.edit', ['barangmasuk'=> $barang_masuk, 'kategori'=>$kategori]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'kode_barang' => ['required'],
            'reg' => ['required'],
            'nama_jenis_barang' => ['required'],
            'merek_tipe_barang' => ['required'],
            'perolehan_barang' => ['required'],
            'tahun_pembelian' => ['required', 'numeric'],
            'keadaan_barang' => ['required'],
            'banyak_barang' => ['required'],
            'harga_satuan_barang' => ['required', 'numeric'],
            'jumlah_harga_barang' => ['required', 'numeric'],
            'kode_ruangan' => ['required', 'numeric'],
            'tanggal_masuk' => ['required', 'date'],
            'kategori_barang' => ['required', 'numeric'],
        ]);

        if(($request->banyak_barang) == 0){
            return back()->withErrors(['banyak_barang' => 'jumlah tidak bisa kosong']);
        }

        $barang_masuk = BarangMasuk::find($id);

        $id_barang = $barang_masuk->id_barang;

        $barang = Barang::find($id_barang);

        if($request->file('foto_barang')){
            $photo = $request->file('photo');
            $destinationPath = 'img/barang/';
            $sendPhoto = date('YmdHis') . '.' . $photo->getClientOriginalExtension();
            $photo->move($destinationPath, $sendPhoto);
            File::delete('img/barang/' . $barang_masuk->foto_barang);
            $barang_masuk->update(['photo'=>$sendPhoto]);
        }

        $barang->update([
            'kode_barang' => $request->kode_barang,
            'banyak_barang' => $request->banyak_barang,
        ]);

        $barang_masuk->update([
            'reg' => $request->reg,
            'nama_jenis_barang' => $request->nama_jenis_barang,
            'merek_tipe_barang' => $request->merek_tipe_barang,
            'no_pabrik' => $request->no_pabrik,
            'bahan' => $request->bahan,
            'perolehan_barang' => $request->perolehan_barang,
            'tahun_pembelian' => $request->tahun_pembelian,
            'ukuran_barang' => $request->ukuran_barang,
            'satuan' => $request->satuan,
            'keadaan_barang' => $request->keadaan_barang,
            'harga_satuan_barang' => $request->harga_satuan_barang,
            'jumlah_harga_barang' => $request->jumlah_harga_barang,
            'kode_ruangan' => $request->kode_ruangan,
            'id_barang' => $barang->id,
            'kategori_barang' =>$request->kategori_barang,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);
        return redirect()->route('barangmasuk.index');
    }

    public function destroy ($id)
    {
        $barang_masuk = BarangMasuk::find($id);
        $barang_masuk->delete();
        return redirect()->route('barangmasuk.index')->with('success');
    }

    public function export(Request $request)
    {
        $tanggal_masuk = $request->tanggal_masuk;
        if(isset($tanggal_masuk)){
            $barang_export = BarangMasuk::where('tanggal_masuk', $tanggal_masuk)->get();
            return Excel::download(new BarangMasukExport($tanggal_masuk, $barang_export),'Data-Barang-Masuk.xlsx');
        } else{
            $barang_export = BarangMasuk::all();
            return Excel::download(new BarangMasukExport($tanggal_masuk, $barang_export),'Data-Barang-Masuk.xlsx');
        }
    }
}
