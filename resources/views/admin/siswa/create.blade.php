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
<header class="pb-2">
    <h2>Buat Data Baru</h2>
</header>
<div class="card shadow mb-4">
    <div class="card-body pl-1">
        <form action="/siswa" method="post">
            @csrf
            <div class="d-flex">
                <div class="mb-3 pl-3 w-50">
                    <label for="nis" class="form-label">Nis</label>
                    <input type="text" class="form-control" name="nis" value="{{$nomer}}" readonly>
                    @error('nis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3 ml-3 w-50">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required>
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="d-flex">
                <div class="mb-3 pl-3 w-50">
                    <label for="rombel" class="form-label">Rombel</label>
                    <select class="form-control" name="rombel">
                        @foreach($rombels as $rombel)
                        <option value="{{ $rombel->nama_rombel }}">{{ $rombel->nama_rombel }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 ml-3 w-50">
                    <label for="rayon" class="form-label">Rayon</label>
                    <select class="form-control" name="rayon">
                        @foreach($rayons as $rayon)
                        <option value="{{ $rayon->nama_rayon }}">{{ $rayon->nama_rayon }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="d-flex">
                <div class="mb-3 pl-3 w-50">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required>
                    @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3 ml-3 w-50">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                    @error('tanggal_lahir')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="d-flex">
                <div class="mb-3 pl-3 w-50">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3 ml-3 w-50">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <input type="hidden" name="level" value="siswa">
            <div class="mb-3 pl-3">
                <a href="/siswa" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('footer')
@include('admin.layout.footer')
@endsection