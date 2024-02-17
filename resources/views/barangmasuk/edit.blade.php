<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventaris Bidang 4</title>
    <link rel="icon" type="image/x-icon" href="/img/logo diskominfo.png">

    <!-- Custom fonts for this template -->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset('/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img class="img-profile rounded-circle" src="/img/logo diskominfo.png" alt="logo diskominfo"
                        style="max-width:6.229167vh">
                </div>
                <div class="sidebar-brand-text mx-3">Inventaris Bidang 4</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            @if (Auth::user()->hasRole('admin'))
                <!-- Nav Item - Tables -->
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('barangmasuk.index') }}">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Barang Masuk</span></a>
                </li>
            @endif

            <li class="nav-item">
                <a class="nav-link" href="{{ route('barangkeluar.index') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Barang Keluar</span></a>
            </li>

            @if (Auth::user()->hasRole('admin'))
                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('daftaruser.index') }}">
                        <i class="fas fa-fw fa-address-book"></i>
                        <span>Daftar User</span></a>
                </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    {{-- <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> --}}

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                {{-- <img class="img-profile rounded-circle" src="img/undraw_profile.svg"> --}}
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                {{-- <div class="dropdown-divider"></div> --}}
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Data Barang</h1>
                    </div>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form id="editbarang" action="{{ route('barangmasuk.update', $barangmasuk->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                        <div class="mb-3">
                                            <label for="kode_barang" class="form-label"><b>Kode Barang</b></label>
                                            <input type="text" name="kode_barang"
                                                class="form-control @error('kode_barang') is-invalid @enderror"
                                                id="kode_barang" placeholder="Masukkan Kode Barang"
                                                value="{{ $barangmasuk->barang->kode_barang }}">
                                            @error('kode_barang')
                                                <p class="form-text" style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                        <div class="mb-3">
                                            <label for="reg" class="form-label"><b>Reg</b></label>
                                            <input type="text" name="reg"
                                                class="form-control @error('reg') is-invalid @enderror" id="reg"
                                                placeholder="Masukkan Reg" value="{{ $barangmasuk->reg }}">
                                            @error('reg')
                                                <p class="form-text" style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                        <div class="mb-3">
                                            <label for="nama_jenis_barang" class="form-label"><b>Nama/Jenis
                                                    Barang</b></label>
                                            <input type="text" name="nama_jenis_barang"
                                                class="form-control @error('nama_jenis_barang') is-invalid @enderror"
                                                id="nama_jenis_barang" placeholder="Masukkan Nama/Jenis Barang"
                                                value="{{ $barangmasuk->nama_jenis_barang }}">
                                            @error('nama_jenis_barang')
                                                <p class="form-text" style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                        <div class="mb-3">
                                            <label for="merek_tipe_barang" class="form-label"><b>Merek/Tipe
                                                    Barang</b></label>
                                            <input type="text" name="merek_tipe_barang"
                                                class="form-control @error('merek_tipe_barang') is-invalid @enderror"
                                                id="merek_tipe_barang" placeholder="Masukkan Merek/Tipe Barang"
                                                value="{{ $barangmasuk->merek_tipe_barang }}">
                                            @error('merek_tipe_barang')
                                                <p class="form-text" style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                        <div class="mb-3">
                                            <label for="no_pabrik" class="form-label"><b>No. Pabrik</b></label>
                                            <input type="text" name="no_pabrik"
                                                class="form-control @error('no_pabrik') is-invalid @enderror"
                                                id="no_pabrik" placeholder="Masukkan Nomor Pabrik Barang"
                                                value="{{ $barangmasuk->no_pabrik }}">
                                            @error('no_pabrik')
                                                <p class="form-text" style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                        <div class="mb-3">
                                            <label for="bahan" class="form-label"><b>Bahan</b></label>
                                            <select name="bahan" class="form-control" id="">
                                                <option value="" disabled selected>Pilih jenis bahan</option>
                                                <option value="Besi" {{ $barangmasuk->bahan == 'Besi' ? 'selected' : '' }}>
                                                    Besi</option>
                                                <option value="Besi, Plastik, dan Busa"
                                                    {{ $barangmasuk->bahan == 'Besi, Plastik, dan Busa' ? 'selected' : '' }}>
                                                    Besi, Plastik, dan Busa</option>
                                                <option value="Campuran"
                                                    {{ $barangmasuk->bahan == 'Campuran' ? 'selected' : '' }}>Campuran
                                                </option>
                                                <option value="Kayu" {{ $barangmasuk->bahan == 'Kayu' ? 'selected' : '' }}>
                                                    Kayu</option>
                                                <option value="Plastik dan Busa"
                                                    {{ $barangmasuk->bahan == 'Plastik dan Busa' ? 'selected' : '' }}>Plastik
                                                    dan Busa</option>
                                            </select>
                                            @error('bahan')
                                                <p class="form-text" style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                        <div class="mb-3">
                                            <label for="perolehan_barang" class="form-label"><b>Asal/Cara Perolehan
                                                    Barang</b></label>
                                            <select name="perolehan_barang" class="form-control" id="">
                                                <option disabled selected>
                                                    Pilih cara perolehan barang
                                                </option>
                                                <option value="Pembelian"
                                                    {{ $barangmasuk->perolehan_barang == 'Pembelian' ? 'selected' : '' }}>
                                                    Pembelian</option>
                                            </select>
                                            @error('perolehan_barang')
                                                <p class="form-text" style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                        <div class="mb-3">
                                            <label for="tahun_pembelian" class="form-label"><b>Tahun
                                                    Pembelian</b></label>
                                            <input type="number" name="tahun_pembelian"
                                                class="form-control @error('tahun_pembelian') is-invalid @enderror"
                                                id="tahun_pembelian" placeholder="Masukkan Tahun Pembelian Barang"
                                                value="{{ $barangmasuk->tahun_pembelian }}">
                                            @error('tahun_pembelian')
                                                <p class="form-text" style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                        <div class="mb-3">
                                            <label for="ukuran_barang" class="form-label"><b>Ukuran Barang</b></label>
                                            <input type="text" name="ukuran_barang"
                                                class="form-control @error('ukuran_barang') is-invalid @enderror"
                                                id="ukuran_barang" placeholder="Masukkan Ukuran Barang"
                                                value="{{ $barangmasuk->ukuran_barang }}">
                                            @error('ukuran_barang')
                                                <p class="form-text" style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                        <div class="mb-3">
                                            <label for="satuan" class="form-label"><b>Satuan Barang</b></label>
                                            <input type="text" name="satuan"
                                                class="form-control @error('satuan') is-invalid @enderror"
                                                id="satuan" placeholder="Masukkan Satuan Barang"
                                                value="{{ $barangmasuk->satuan }}">
                                            @error('satuan')
                                                <p class="form-text" style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                        <div class="mb-3">
                                            <label for="keadaan_barang" class="form-label"><b>Keadaan
                                                    Barang</b></label>
                                            <select name="keadaan_barang" class="form-control" id="">
                                                <option value="" disabled selected>Pilih keadaan barang</option>
                                                <option value="Baik"
                                                    {{ $barangmasuk->keadaan_barang == 'Baik' ? 'selected' : '' }}>
                                                    Baik</option>
                                                <option value="Kurang Baik"
                                                    {{ $barangmasuk->keadaan_barang == 'Kurang Baik' ? 'selected' : '' }}>
                                                    Kurang Baik</option>
                                                <option value="Rusak Berat"
                                                    {{ $barangmasuk->keadaan_barang == 'Rusak Berat' ? 'selected' : '' }}>
                                                    Rusak Berat
                                                </option>
                                            </select>

                                            @error('keadaan_barang')
                                                <p class="form-text" style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                        <div class="mb-3">
                                            <label for="banyak_barang" class="form-label"><b>Banyak Barang</b></label>
                                            <input type="number" name="banyak_barang"
                                                class="form-control @error('banyak_barang') is-invalid @enderror"
                                                id="banyak_barang" placeholder="Masukkan Banyak Barang"
                                                value="{{ $barangmasuk->barang->banyak_barang }}">
                                            @error('banyak_barang')
                                                <p class="form-text" style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                        <div class="mb-3">
                                            <label for="harga_satuan_barang" class="form-label"><b>Harga Satuan
                                                    Barang</b></label>
                                            <input type="number" name="harga_satuan_barang"
                                                class="form-control @error('harga_satuan_barang') is-invalid @enderror"
                                                id="harga_satuan_barang" placeholder="Masukkan Harga Satuan Barang"
                                                value="{{ $barangmasuk->harga_satuan_barang }}">
                                            @error('harga_satuan_barang')
                                                <p class="form-text" style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                        <div class="mb-3">
                                            <label for="kode_ruangan" class="form-label"><b>Kode Ruangan
                                                    Barang</b></label>
                                            <input type="text" name="kode_ruangan"
                                                class="form-control @error('kode_ruangan') is-invalid @enderror"
                                                id="kode_ruangan" placeholder="Masukkan Kode Ruangan Barang"
                                                value="{{ $barangmasuk->kode_ruangan }}">
                                            @error('kode_ruangan')
                                                <p class="form-text" style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                        <div class="mb-3">
                                            <label for="kategori_barang" class="form-label">Kategori Barang</label>
                                            <select class="form-control" name="kategori_barang" aria-label="Default Select Example" id="kategori_barang">
                                                <option value="" disabled>Pilih Kategori Barang</option>
                                                @foreach ($kategori as $kategoriItem)
                                                    <option value="{{ $kategoriItem->id }}" {{ old('kategori_barang', $barangmasuk->kategori_barang) == $kategoriItem->id ? 'selected' : '' }}>
                                                        {{ $kategoriItem->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                        <div class="mb-3">
                                            <label for="tanggal_masuk" class="form-label"><b>Tanggal Barang
                                                    Masuk</b></label>
                                            <input type="date" name="tanggal_masuk"
                                                class="form-control @error('tanggal_masuk') is-invalid @enderror"
                                                id="tanggal_masuk" placeholder="Masukkan Tanggal masuk Barang"
                                                value="{{ $barangmasuk->tanggal_masuk }}">
                                            @error('tanggal_masuk')
                                                <p class="form-text" style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                        <div class="mb-3">
                                            <label for="foto_barang" class="form-label"><b>Foto Barang</b></label>
                                            <input type="file" name="foto_barang"
                                                class="form-control @error('foto_barang') is-invalid @enderror"
                                                id="foto_barang" placeholder="Masukkan Foto Barang"
                                                value="{{ $barangmasuk->foto_barang }}">
                                            @error('foto_barang')
                                                <p class="form-text" style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <a href="{{ route('barangmasuk.index') }}" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-left"></i>
                                        </span>
                                        <span class="text">Kembali</span>
                                    </a>
                                    <button type="submit" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Simpan</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Dinas Komunikasi dan Informatika Samarinda &copy; 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Tekan tombol logout untuk keluar atau cancel untuk kembali</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

</body>

</html>
