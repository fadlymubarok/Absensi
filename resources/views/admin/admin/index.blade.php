@extends('admin.layout.master')

@section('sidebar')
@include('admin.layout.sidebar')
@endsection

@section('content')
<header class="d-flex align-items-center justify-content-between pb-3 border-bottom">
    <h2>Data Admin</h2>
    <a href="/admins/create" class="btn btn-primary p-2">Buat data baru</a>
</header>

@if(session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Admin</th>
            <th>Username</th>
            <th width="200px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($siswa as $siswa)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $siswa->nama }}</td>
            <td>{{ $siswa->username }}</td>
            <td>
                <form action="/admins/{{ $siswa->id }}" method="post">
                    <a href="/admins/{{ $siswa->id }}/edit" class="btn btn-warning">Ubah</a>
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus {{ $siswa->nama }}?');">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('footer')
@include('admin.layout.footer')
@endsection