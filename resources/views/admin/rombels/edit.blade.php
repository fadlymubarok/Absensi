@extends('admin.layout.master')

@section('sidebar')
@include('admin.layout.sidebar')
@endsection

@section('topbar')
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow pl-2">

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
                <a class="dropdown-item" href="/admin/profile">
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
@endsection

@section('content')
<header>
    <h2>Ubah Data {{ $rombel->nama_rombel }}</h2>
</header>
<div class="col-lg-8 card shadow mb-4">
    <div class="card-body pl-1">
        <form action="/rombels/{{ $rombel->id }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="nama_rombel" class="form-label">Nama Rombel</label>
                <input type="text" class="form-control @error('nama_rombel') is-invalid @enderror" name="nama_rombel" value="{{ $rombel->nama_rombel }}" required autofocus>
                @error('nama_rombel')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <a href="/rombels" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Data sudah benar?')">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('footer')
@include('admin.layout.footer')
@endsection