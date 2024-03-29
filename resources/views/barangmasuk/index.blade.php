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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img class="img-profile rounded-circle" src="img/logo diskominfo.png" alt="logo diskominfo"
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
                        <h1 class="h3 mb-0 text-gray-800">Data Barang Masuk</h1>
                        <a href="{{ route('barangmasuk.create') }}" class="btn btn-success btn-icon-split btn-lg">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah Barang</span>
                        </a>
                    </div>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Barang Asset
                            </h6>
                            <form id="barangexport" action="{{ route('barangmasuk.export') }}" method="post">
                                @csrf
                                <input type="hidden" name="exportbarang" value="asset">
                                <button id="exportclick" class="btn btn-info btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-download"></i>
                                    </span>
                                    <span class="text">Download</span>
                                </button>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
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
                                            <th>Edit</th>
                                            <th>Delete</th>
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
                                                <td>{{ 'Rp' . number_format($barang->harga_satuan_barang, 2) }}</td>
                                                <td>{{ 'Rp' . number_format($barang->jumlah_harga_barang, 2) }}</td>
                                                <td>{{ $barang->kode_ruangan }}</td>
                                                <td>{{ $barang->tanggal_masuk }}</td>
                                                <td><img src="{{ asset('img/barang/' . $barang->foto_barang) }}"
                                                        alt="" style="width: 150px"></td>
                                                <form action="{{ route('barangmasuk.destroy', $barang->id) }}"
                                                    method="post" onsubmit="return confirm('Are you sure?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <td><a href="{{ route('barangmasuk.edit', $barang->id) }}"
                                                            class="btn btn-warning">Edit</a>
                                                    </td>
                                                    <td><input type="submit" value="Delete" class="btn btn-danger">
                                                    </td>
                                                </form>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Barang Habis Pakai
                            </h6>
                            <form id="barangexport" action="{{ route('barangmasuk.export') }}" method="post">
                                @csrf
                                <input type="hidden" name="exportbarang" value="habispakai"> <!-- Change name to "exportasset" -->
                                <button type="submit" class="btn btn-info btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-download"></i>
                                    </span>
                                    <span class="text">Download</span>
                                </button>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
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
                                            <th>Edit</th>
                                            <th>Delete</th>
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
                                                <td>{{ 'Rp' . number_format($barang->harga_satuan_barang, 2) }}</td>
                                                <td>{{ 'Rp' . number_format($barang->jumlah_harga_barang, 2) }}</td>
                                                <td>{{ $barang->kode_ruangan }}</td>
                                                <td>{{ $barang->tanggal_masuk }}</td>
                                                <td><img src="{{ asset('img/barang/' . $barang->foto_barang) }}"
                                                        alt="" style="width: 150px"></td>
                                                <form action="{{ route('barangmasuk.destroy', $barang->id) }}"
                                                    method="post" onsubmit="return confirm('Are you sure?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <td><a href="{{ route('barangmasuk.edit', $barang->id) }}"
                                                            class="btn btn-warning">Edit</a>
                                                    </td>
                                                    <td><input type="submit" value="Delete" class="btn btn-danger">
                                                    </td>
                                                </form>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
