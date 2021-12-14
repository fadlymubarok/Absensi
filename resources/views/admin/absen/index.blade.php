@extends('admin.layout.master')

@section('sidebar')
@include('admin.layout.sidebar')
@endsection

@section('content')
<header class="d-flex align-items-center justify-content-between pb-3 border-bottom">
    <h2>Absensi Siswa</h2>
</header>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>jam kedatangan</th>
            <th>jam kepulangan</th>
            <th>Keterangan</th>
            <th>Bukti</th>
        </tr>
    </thead>
    <tbody>
        @foreach($absen as $absen)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $absen->nis }}</td>
            <td>
                @if($absen->jam_kedatangan)
                {{ $absen->jam_kedatangan }}
                @else
                <span>-</span>
                @endif
            </td>
            <td>
                @if($absen->jam_kepulangan)
                {{ $absen->jam_kepulangan }}
                @else
                <span>-</span>
                @endif
            </td>
            <td>{{ $absen->keterangan }}</td>
            <td>
                @if($absen->image)
                <img src="{{ asset('storage/' . $absen->image) }}" alt="gambar" width="100px" height="100px">
                @else
                <span>-</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('footer')
@include('admin.layout.footer')
@endsection