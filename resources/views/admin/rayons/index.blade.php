@extends('admin.layout.master')

@section('sidebar')
@include('admin.layout.sidebar')
@endsection


@section('content')
<header class="d-flex align-items-center justify-content-between pb-3 border-bottom">
    <h2>Data Rayon</h2>
    <a href="/rayons/create" class="btn btn-primary p-2">Buat data baru</a>
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
            <th>Nama Rayon</th>
            <th>Nama Pembimbing</th>
            <th width="200px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rayons as $rayon)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $rayon->nama_rayon }}</td>
            <td>{{ $rayon->nama_pembimbing }}</td>
            <td>
                <form action="/rayons/{{ $rayon->id }}" method="post">
                    <a href="/rayons/{{ $rayon->id }}/edit" class="btn btn-warning">Ubah</a>
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus {{ $rayon->nama_rayon }}?');">Delete</button>
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