<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- My style -->
    <link rel="stylesheet" href="../assets/user/css/style.css">

    <title>Absensi</title>
</head>

<body>
    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle shadow w-50 pb-3">
            @if($absen->keterangan == 'Datang')
            <div class="jam">
                <div class="kotak">
                    <p id="jam"></p>
                </div>
                <div class="kotak">
                    <p id="menit"></p>
                </div>
                <div class="kotak">
                    <p id="detik"></p>
                </div>
            </div>
            <form action="/logout" method="get">
                @csrf
                @if(session('success'))
                <div class="alert alert-success" role="alert" id="alert">
                    {{ session('success') }}
                </div>
                @endif
                <div class="row w-75 d-flex flex-wrap">
                    <div class="col-4">
                        <h5>Keterangan</h5>
                        <span>{{ $absen->keterangan }}</span>
                    </div>
                    <div class="col-4">
                        <h5>Datang</h5>
                        <span>{{ $absen->jam_kedatangan }}</span>
                    </div>
                    <div class="col-4">
                        <h5>Pulang</h5>
                        <span>{{ $absen->jam_kepulangan }}</span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary my-2" id="btn">Logout</button>
                @else
                <div class="row">
                    <div class="col-4">
                        <h5>Keterangan</h5>
                        <span>{{ $absen->keterangan }}</span>
                    </div>
                    <div class="col-4">
                        <h5>Bukti</h5>
                        <span><img src="{{ asset('storage/' . $absen->image) }}" alt="gambar" width="80px" height="70px"></span>
                    </div>
                </div>
                <a href="/logout" class="btn btn-primary" id="btn">Logout</a>
                @endif
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="assets/user/js/script.js"></script>
</body>

</html>