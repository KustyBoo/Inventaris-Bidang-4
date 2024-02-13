<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Kode Barang</th>
            <th>Reg</th>
            <th>Nama/Jenis Barang</th>
            <th>Merek/Tipe</th>
            <th>No. Pabrik</th>
            <th>Bahan</th>
            <th>Perolehan Barang</th>
            <th>Tahun Pembelian</th>
            <th>Ukuran Barang</th>
            <th>Satuan</th>
            <th>Keadaan Barang</th>
            <th>Banyak Barang</th>
            <th>Harga Satuan</th>
            <th>Jumlah Harga</th>
            <th>Kode Ruangan</th>
            <th>Tanggal Masuk</th>
            <th>Foto Barang</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
        </tr>
    </tfoot>
    <tbody>
        @foreach ($barangaset as $key => $barang)
            <tr>
                <td>{{ $barang->barang->kode_barang }}</td>
                <td>{{ $barang->reg }}</td>
                <td>{{ $barang->nama_jenis_barang }}</td>
                <td>{{ $barang->merek_tipe_barang }}</td>
                <td>{{ $barang->no_pabrik }}</td>
                <td>{{ $barang->bahan }}</td>
                <td>{{ $barang->perolehan_barang }}</td>
                <td>{{ $barang->tahun_pembelian }}</td>
                <td>{{ $barang->ukuran_barang }}</td>
                <td>{{ $barang->satuan }}</td>
                <td>{{ $barang->keadaan_barang }}</td>
                <td>{{ $barang->barang->banyak_barang }}</td>
                <td>{{ $barang->harga_satuan_barang }}</td>
                <td>{{ $barang->jumlah_harga_barang }}</td>
                <td>{{ $barang->kode_ruangan }}</td>
                <td>{{ $barang->tanggal_masuk }}</td>
                <td><img src="{{ asset('img/barang/' . $barang->foto_barang) }}" alt="" style="width: 150px">
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Kode Barang</th>
            <th>Reg</th>
            <th>Nama/Jenis Barang</th>
            <th>Merek/Tipe</th>
            <th>No. Pabrik</th>
            <th>Bahan</th>
            <th>Perolehan Barang</th>
            <th>Tahun Pembelian</th>
            <th>Ukuran Barang</th>
            <th>Satuan</th>
            <th>Keadaan Barang</th>
            <th>Banyak Barang</th>
            <th>Harga Satuan</th>
            <th>Jumlah Harga</th>
            <th>Kode Ruangan</th>
            <th>Tanggal Masuk</th>
            <th>Foto Barang</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
        </tr>
    </tfoot>
    <tbody>
        @foreach ($baranghabispakai as $key => $barang)
            <tr>
                <td>{{ $barang->barang->kode_barang }}</td>
                <td>{{ $barang->reg }}</td>
                <td>{{ $barang->nama_jenis_barang }}</td>
                <td>{{ $barang->merek_tipe_barang }}</td>
                <td>{{ $barang->no_pabrik }}</td>
                <td>{{ $barang->bahan }}</td>
                <td>{{ $barang->perolehan_barang }}</td>
                <td>{{ $barang->tahun_pembelian }}</td>
                <td>{{ $barang->ukuran_barang }}</td>
                <td>{{ $barang->satuan }}</td>
                <td>{{ $barang->keadaan_barang }}</td>
                <td>{{ $barang->barang->banyak_barang }}</td>
                <td>{{ $barang->harga_satuan_barang }}</td>
                <td>{{ $barang->jumlah_harga_barang }}</td>
                <td>{{ $barang->kode_ruangan }}</td>
                <td>{{ $barang->tanggal_masuk }}</td>
                <td><img src="{{ asset('img/barang/' . $barang->foto_barang) }}" alt="" style="width: 150px"></td>
            </tr>
        @endforeach
    </tbody>
</table>
