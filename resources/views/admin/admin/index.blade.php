@extends('admin.layout.master')

@section('sidebar')
@include('admin.layout.sidebar')
@endsection

@section('topbar')
@include('admin.layout.topbar')
@endsection

@section('content')
<header class="d-flex align-items-center justify-content-between pb-3">
    <h2>Data Admin</h2>
    <a href="/admins/create" class="btn btn-primary p-2">Buat data baru</a>
</header>

<div class=" card shadow mb-4">
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <table class="table border border-top-0">
            <thead class="table-info text-dark">
                <tr>
                    <th>No</th>
                    <th width="200px">Nama</th>
                    <th width="150px">Username</th>
                    <th width="300px">Alamat</th>
                    <th width="200px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admin as $admin)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $admin->nama }}</td>
                    <td>{{ $admin->username }}</td>
                    <td>{{ $admin->alamat }}</td>
                    <td>
                        <form action="/admins/{{ $admin->id }}" method="post">
                            <a href="/admins/{{ $admin->id }}/edit" class="btn btn-warning">Ubah</a>
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus {{ $admin->nama_admin }}?');">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('footer')
@include('admin.layout.footer')
@endsection