@extends('admin.layout.master')

@section('sidebar')
@include('admin.layout.sidebar')
@endsection

@section('content')
<header class="d-flex align-items-center justify-content-between pb-3 border-bottom">
    <h2>Data Rombel</h2>
    <a href="/rombels/create" class="btn btn-primary p-2">Buat data baru</a>
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
            <th>Nama Rombel</th>
            <th width="200px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rombels as $rombel)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $rombel->nama_rombel }}</td>
            <td>
                <form action="/rombels/{{ $rombel->id }}" method="post">
                    <a href="/rombels/{{ $rombel->id }}/edit" class="btn btn-warning">Ubah</a>
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus {{ $rombel->nama_rombel }}?');">Delete</button>
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