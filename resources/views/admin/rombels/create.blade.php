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
<div class="col-lg-8 card shadow mb-4">
    <div class="card-body pl-1">
        <form action="/rombels" method="post">
            @csrf
            <div class="mb-3">
                <label for="nama_rombel" class="form-label">Nama Rombel</label>
                <input type="text" class="form-control @error('nama_rombel') is-invalid @enderror" name="nama_rombel" value="{{ old('nama_rombel') }}" required autofocus>
                @error('nama_rombel')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <a href="/rombels" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('footer')
@include('admin.layout.footer')
@endsection