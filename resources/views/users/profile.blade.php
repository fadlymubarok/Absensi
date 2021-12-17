<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Halaman Dashboard Siswa</title>

    <!-- Custom fonts for this template-->
    <link href="../../assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container">
            <div class="card" style="width: 18rem; margin: 100px auto;">
                <i class="card-img-top fas fa-user-circle fa-5x" style="padding: 10px 105px;"></i>
                <div class="card-body border-top pt-1">
                    <div class="d-flex flex-column">
                        <p class="mb-0">Nama:</p>
                        <p class="mb-2">{{auth()->user()->nama}}</p>
                    </div>
                    <div class="d-flex flex-column">
                        <p class="mb-0">Tanggal Lahir:</p>
                        <p class="mb-2">{{auth()->user()->tanggal_lahir}}</p>
                    </div>
                    <div class="d-flex flex-column">
                        <p class="mb-0">Alamat:</p>
                        <p class="mb-3">{{auth()->user()->alamat}}</p>
                    </div>
                    <a href="/dashboard-siswa" class="btn btn-primary d-flex justify-content-center">Dashboard</a>
                </div>
            </div>
        </div>
        <!-- /.container -->

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