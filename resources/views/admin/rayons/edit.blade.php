@extends('admin.layout.master')

@section('sidebar')
@include('admin.layout.sidebar')
@endsection

@section('content')
<header class="d-flex align-items-center justify-content-between pb-3 border-bottom mb-3">
    <h2>Ubah Rayon {{ $rayon->nama_rayon }}</h2>
</header>
<div class="col-lg-8">
    <form action="/rayons/{{ $rayon->id }}" method="post">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nama_rayon" class="form-label">Nama Rayon</label>
            <input type="text" class="form-control" name="nama_rayon" value="{{ $rayon->nama_rayon }}" required>
        </div>
        <div class="mb-3">
            <label for="nama_pembimbing" class="form-label">Nama Pembimbing Rayon</label>
            <input type="text" class="form-control" name="nama_pembimbing" value="{{ $rayon->nama_pembimbing }}" required>
        </div>
        <div class="mb-3">
            <a href="/rayons" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection

@section('footer')
@include('admin.layout.footer')
@endsection