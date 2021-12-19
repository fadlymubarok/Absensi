<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard Siswa</title>

    <!-- Custom fonts for this template-->
    <link href="../../assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow pl-2">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="/dashboard-siswa" method="get">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." name="search" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->nama }}</span>
                        <i class="fas fa-user-circle fa-2x"></i>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="/profile">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid mt-4">
            <header class="d-flex align-items-center justify-content-between pb-1">
                <h2>Data Absen</h2>
            </header>

            <div class="card shadow mb-4">
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <table class="table border border-top-0">
                        <thead class="table-info">
                            <tr>
                                <th>No</th>
                                <th>Nis</th>
                                <th>Jam Kedatangan</th>
                                <th>Jam Kepulangan</th>
                                <th>Keterangan</th>
                                <th>Tanggal</th>
                                <th>Foto Bukti</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($absen->count())
                            @foreach($absen as $absen)
                            <tr class="mt-0">
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $absen->nis }}</td>
                                <td>
                                    @if($absen->jam_kedatangan)
                                    {{ $absen->jam_kedatangan }}
                                    @else
                                    <span>-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($absen->jam_kepulangan)
                                    {{ $absen->jam_kepulangan }}
                                    @else
                                    <span>-</span>
                                    @endif
                                </td>
                                <td>{{ $absen->keterangan }}</td>
                                <td>{{ $absen->tanggal }}</td>
                                <td>
                                    @if($absen->image)
                                    <img src="{{ asset('storage/' . $absen->image) }}" alt="gambar" width="100px" height="100px">
                                    @else
                                    <span>-</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td>Data tidak ada</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
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
                <span>Copyright &copy; Fadly Mubarok Website 2021</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->


    <!-- Bootstrap core JavaScript-->
    <script src="../../assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../assets/admin/js/sb-admin-2.min.js"></script>
</body>

</html>