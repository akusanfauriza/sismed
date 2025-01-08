<!DOCTYPE html>
<html lang="en">
<head> 

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Daftar Antrian</title>

    <!-- Custom fonts for this template -->
    <link href="{{asset('tamplate/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('tamplate/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset('tamplate/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>
<body id="page-top"> 

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-hospital"></i>
                </div>
                <div class="sidebar-brand-text mx-3">KLINIK SISMED</div>
            </a>

                <!-- Divider -->
                    <hr class="sidebar-divider my-0">

                        <!-- Nav Item - Dashboard -->
                        <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - pengguna -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('pengguna.index')}}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Pengguna</span></a>
            </li>

            <!-- nav pasien -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('pasien.index')}}">
                    <i class="fas fa-fw fa-user-injured"></i>
                    <span>Pasien</span></a>
            </li>

            <!-- nav antrian -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('antrian.index')}}">
                    <i class="fas fa-fw fa-clock"></i>
                    <span>Antrian</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">Home</a>
                        <a class="collapse-item" href="blank.html">About</a>
                    </div>
                </div>
            </li>

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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
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
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
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
                        <span>Copyright &copy; Your Website 2020</span>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('tamplate/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('tamplate/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('tamplate/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('tamplate/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('tamplate/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('tamplate/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('tamplate/js/demo/datatables-demo.js')}}"></script>

</body>
</html>



<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Antrian</title>
    <style>
        /* Reset default styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: rgb(215, 215, 233);
    color: #333;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.container {
    flex-grow: 1; /* Memungkinkan container untuk memenuhi ruang yang tersisa */
    width: 100%;
    background:#fff;
    padding: 75px;
    box-sizing: border-box; /* Pastikan padding tidak melebihi lebar kontainer */
}


h1 {
    text-align: center;
    margin-bottom: 20px;
    color:rgb(0, 0, 0);
}

a {
    text-decoration: none;
    color: #4CAF50;
    font-weight: bold;
    transition: color 0.3s ease;
}

a:hover {
    color: #388E3C;
}

/* Table styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    font-size: 16px;
}

thead th {
    background-color: #fff;
    color: black;
    text-align: left;
    padding: 10px;
    transition: background-color 0.3s ease;
}

tbody td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #eafaf1;
    transition: background-color 0.3s ease;
}

/* Button styles */
button {
    background-color: #f44336;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

button:hover {
    background-color: #d32f2f;
    transform: scale(1.05);
}

/* Link button styles */
a[href*="create"] {
    display: inline-block;
    background-color: #4CAF50;
    color: white;
    padding: 8px 12px;
    border-radius: 4px;
    margin-right: 5px;
    transition: background-color 0.3s ease;
}

a[href*="edit"] {
    display: inline-block;
    background-color: #2196F3;
    color: white;
    padding: 8px 12px;
    border-radius: 4px;
    margin-right: 5px;
    transition: background-color 0.3s ease;
}

a[href*="create"]:hover {
    background-color: #388E3C;
}

a[href*="edit"]:hover {
    background-color: #1976D2;
}

header {
    background-color: #48c9b0;
    color: black;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0px 40px;
}

header nav {
    display: flex;
    gap: 50px;
}

header nav a {
    color: black;
    font-weight: bold;
    text-decoration: none;
    font-size: 16px;
}

header nav a:hover {
    text-decoration: underline;
}

footer {
    background-color: #48c9b0;
    color: black;
    text-align: center;
    font-weight: bold;
    padding: 16px 40px;
    margin-top: auto;
}

.success-message {
    color: green;
    font-weight: bold;
    margin-bottom: 20px;
    text-align: center;
}

.add-button {
    display: inline-block;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
    margin-bottom: 20px;
    text-align: center;
    transition: background-color 0.3s ease;
}

.add-button:hover {
    background-color: #45a049;
}

th, td {
    padding: 12px;
    text-align: left;
    border: 1px solid #ddd;
}

th {
    background-color: #f4f4f9;
    color: #333;
}

.action-buttons {
    display: flex;
    gap: 10px;
}

.action-buttons a, .action-buttons button {
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    color: white;
}

.action-buttons a {
    background-color: #2196F3;
}

.action-buttons a:hover {
    background-color: #1976D2;
}

.action-buttons button {
    background-color: #f44336;
}

.action-buttons button:hover {
    background-color: #d32f2f;
}

/* Responsiveness */
@media (max-width: 768px) {
    table, th, td {
        font-size: 14px;
    }

    .add-button {
        width: 100%;
        text-align: center;
    }

    .actions {
        flex-direction: column;
    }

    .actions a, .actions button {
        width: 100%;
        margin: 5px 0;
    }

    thead {
        display: none;
    }

    tbody, tr, td {
        display: block;
        width: 100%;
    }

    tbody td {
        text-align: right;
        padding-left: 50%;
        position: relative;
    }

    tbody td::before {
        content: attr(data-label);
        position: absolute;
        left: 10px;
        text-align: left;
        font-weight: bold;
    }
}

    </style>
</head>
<body>
<header>
        <div class="logo">
            <h2>Sistem Informasi Antrian</h2>
        </div>
        <nav>
            <a href="#">Home</a>
            <a href="#">Daftar Obat</a>
            <a href="#">Tentang</a>
            <a href="#">Kontak</a>
        </nav>
    </header>
    <div class="container">
    <h1>Daftar Antrian</h1> -->
     <!-- Notifikasi Flash Message -->
      <!-- @if(session('success'))
     <p class="success-message"> {{ session('success') }}</p>
    @endif

    <a href="{{ route('antrian.create') }}">Tambah Antrian</a>
    <table>
        <thead>
            <tr>
                <th>ID Pasien</th>
                <th>Nama Pasien</th>
                <th>Dokter</th>
                <th>Status</th>
                <th>Nomor Antrian</th>
                <th>Waktu Antrian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($antrian as $item)
            <tr>
                <td>{{ $item->id_pasien }}</td>
                <td>{{ $item->pasien->nama ?? 'Tidak Diketahui' }}</td>
                <td>{{ $item->dokter->nama_lengkap }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->nomor_antrian }}</td>
                <td>{{ $item->waktu_antrian }}</td>
                <td>
                    <a href="{{ route('antrian.edit', $item) }}">Edit</a>
                    <form action="{{ route('antrian.destroy', $item) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div> 
    <footer>
        <p>&copy; 2024 Sistem Informasi Apotek Sismed</p>
    </footer>
</body>
</html> -->
