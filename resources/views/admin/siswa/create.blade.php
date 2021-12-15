@extends('admin.layout.master')

@section('sidebar')
@include('admin.layout.sidebar')
@endsection

@section('topbar')
@include('admin.layout.topbar')
@endsection

@section('content')
<header class="pb-1">
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