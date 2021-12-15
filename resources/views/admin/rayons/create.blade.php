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
<div class="col-lg-6 card shadow mb-4">
    <div class="card-body pl-0 ">
        <form action="/rayons" method="post">
            @csrf
            <div class="mb-3">
                <label for="nama_rayon" class="form-label">Nama Rayon</label>
                <input type="text" class="form-control @error('nama_rayon') is-invalid @enderror" name="nama_rayon" value="{{ old('nama_rayon') }}" required autofocus>
                @error('nama_rayon')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama_pembimbing" class="form-label">Nama Pembimbing Rayon</label>
                <input type="text" class="form-control @error('nama_pembimbing') is-invalid @enderror" name="nama_pembimbing" value="{{ old('nama_pembimbing') }}" required>
                @error('nama_pembimbing')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <a href="/rayons" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('footer')
@include('admin.layout.footer')
@endsection