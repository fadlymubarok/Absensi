@extends('admin.layout.master')

@section('sidebar')
@include('admin.layout.sidebar')
@endsection

@section('content')
<header class="d-flex align-items-center justify-content-between pb-3 border-bottom mb-3">
    <h2>Ubah Data {{ $user->nis }}</h2>
</header>
<div class="col-lg-8">
    <form action="/siswa/{{ $user->id }}" method="post">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nis" class="form-label">Nis</label>
            <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ $user->nis }}" required autofocus>
            @error('nis')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $user->nama }}" required>
            @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="rombel" class="form-label">Rombel</label>
            <select class="form-control" name="rombel">
                @foreach($rombels as $rombel)
                <option value="{{ $rombel->nama_rombel }}" @if($user->rombel == $rombel->nama_rombel) selected @endif)}}>{{ $rombel->nama_rombel }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="rayon" class="form-label">Rayon</label>
            <select class="form-control" name="rayon">
                @foreach($rayons as $rayon)
                <option value="{{ $rayon->nama_rayon }}" @if($user->rayon == $rayon->nama_rayon ) selected @endif>{{ $rayon->nama_rayon }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" required>
            @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-5">
            <a href="/registrasi" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection

@section('footer')
@include('admin.layout.footer')
@endsection