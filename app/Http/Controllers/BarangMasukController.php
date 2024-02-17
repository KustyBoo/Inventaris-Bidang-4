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

        $barangaset = BarangMasuk::where('kategori_barang', '1')->get();
        $baranghabispakai = BarangMasuk::where('kategori_barang', '2')->get();
        // return $barang_masuk;
        return view(
            'barangmasuk.index',
            [
                'barangmasuk' => $barang_masuk,
                'barangstok' => $barang_stok,
                'barangaset' => $barangaset,
                'baranghabispakai' => $baranghabispakai,
            ],
        );
    }

    public function show($id)
    {

    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('barangmasuk.create', ['kategori' => $kategori]);
    }

    public function store(Request $request)
    {
        $cekid = Barang::where('kode_barang', $request->kode_barang)->exists();

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
            'kode_ruangan' => ['required', 'numeric'],
            'tanggal_masuk' => ['required', 'date'],
            'foto_barang' => ['required', 'file', 'mimes:jpeg,png'],
        ]);
        
        if ($request->kategori_barang == "Pilih Kategori Barang") {
            return back()->withErrors(['kategori_barang' => 'Pilih kategori barang']);
        }

        if ($cekid) {
            return back()->withErrors(['kode_barang' => 'Kode barang sudah ada'])->withInput();
        }

        if (($request->banyak_barang) == 0) {
            return back()->withErrors(['banyak_barang' => 'jumlah tidak bisa kosong'])->withInput();
        }

        $jumlah_harga_barang = $request->banyak_barang * $request->harga_satuan_barang;

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
            'jumlah_harga_barang' => $jumlah_harga_barang,
            'kode_ruangan' => $request->kode_ruangan,
            'id_barang' => $barang->id,
            'kategori_barang' => $request->kategori_barang,
            'foto_barang' => $sendPhoto,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        return redirect()->route('barangmasuk.index');
    }

    public function edit($id)
    {
        $barang_masuk = BarangMasuk::find($id);
        $kategori = Kategori::all();
        return view('barangmasuk.edit', ['barangmasuk' => $barang_masuk, 'kategori' => $kategori]);
    }

    public function update(Request $request, $id)
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
            'kode_ruangan' => ['required', 'numeric'],
            'tanggal_masuk' => ['required', 'date'],
        ]);

        if (($request->banyak_barang) == 0) {
            return back()->withErrors(['banyak_barang' => 'jumlah tidak bisa kosong']);
        }

        $jumlah_harga_barang = $request->banyak_barang * $request->harga_satuan_barang;

        $barang_masuk = BarangMasuk::find($id);

        $id_barang = $barang_masuk->id_barang;

        $barang = Barang::find($id_barang);

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
            'jumlah_harga_barang' => $jumlah_harga_barang,
            'kode_ruangan' => $request->kode_ruangan,
            'id_barang' => $barang->id,
            'kategori_barang' => $request->kategori_barang,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        if($request->foto_barang){
            $photo = $request->file('foto_barang');
            $destinationPath = 'img/barang/';
            $sendPhoto = date('YmdHis') . '.' . $photo->getClientOriginalExtension();
            $photo->move($destinationPath, $sendPhoto);
            File::delete('img/barang/' . $barang_masuk->foto_barang);
            $barang_masuk->update(['foto_barang' => $sendPhoto]);
        }
        return redirect()->route('barangmasuk.index');
    }

    public function destroy($id)
    {
        $barang_masuk = BarangMasuk::find($id);
        $idbarang = BarangMasuk::find($id)->id_barang;
        $barangsemua = Barang::find($idbarang);
        $barang_masuk->delete();
        $barangsemua->delete();
        File::delete('img/barang/' . $barang_masuk->foto_barang);
        return redirect()->route('barangmasuk.index')->with('success');
    }

    public function export(Request $request)
    {
        $barangaset = collect();
        $baranghabispakai = collect();
        
        if (isset($request->tanggal_masuk)) {
            $barangaset = BarangMasuk::where('tanggal_masuk', $request->tanggal_masuk)->where('kategori_barang', '1')->get();
            $baranghabispakai = BarangMasuk::where('tanggal_masuk', $request->tanggal_masuk)->where('kategori_barang', '2')->get();
        } 
        if($request->tanggal_masuk == null){
            $barangaset = BarangMasuk::where('kategori_barang', '1')->get();
            $baranghabispakai = BarangMasuk::where('kategori_barang', '2')->get();
        }
        return Excel::download(new BarangMasukExport($barangaset, $baranghabispakai), 'Data-Barang-Masuk.xlsx');
    }
}
