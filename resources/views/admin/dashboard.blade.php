@if(auth()->user()->level == 'siswa')
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- My style -->
    <link rel="stylesheet" href="assets/user/css/style.css">

    <title>Absensi</title>
</head>

<body>
    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle shadow w-50">
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
            <form action="/absensi-siswa" method="post">
                @csrf
                <div class="alert alert-light" role="alert">
                    <div class="d-grid gap-2 col-6 mx-auto py-2">
                        <input type="hidden" class="form-control" name="nis" value="{{ auth()->user()->nis }}">
                        <button class="btn btn-primary" type="submit" value="Datang" name="keterangan">Datang</button>
                        <a href="/absensi-tidak-hadir" class="btn btn-danger">Tidak Hadir</a>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="assets/user/js/script.js"></script>

</body>

</html>

@elseif(auth()->user()->level == 'admin')
@extends('admin.layout.master')

@section('sidebar')
@include('admin.layout.sidebar')
@endsection

@section('topbar')
@include('admin.layout.topbar')
@endsection

@section('content')
<div class="container-sm ">
    <div class="alert alert-warning text-center" role="alert">
        <h4>Kamu berhasil Login</h4>
        <p>Semoga harimu menyenangkan:)</p>
    </div>
</div>
@endsection

@section('footer')
@include('admin.layout.footer')
@endsection

@endif