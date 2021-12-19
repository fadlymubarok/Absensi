@extends('admin.layout.master')

@section('sidebar')
@include('admin.layout.sidebar')
@endsection

@section('topbar')
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow pl-2">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="/absen" method="get">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." name="search" value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->nama }}</span>
                <i class="fas fa-user-circle fa-2x"></i>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/profile">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/logout">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
@endsection
@section('content')
<header class="d-flex align-items-center justify-content-between pb-3">
    <h2>Absensi Siswa</h2>
</header>

<div class=" card shadow mb-4">
    <div class="card-body">
        <table class="table border border-top-0">
            <thead class="table-info text-dark">
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>jam kedatangan</th>
                    <th>jam kepulangan</th>
                    <th>Keterangan</th>
                    <th width="200px">Bukti</th>
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
    </div>
</div>
@endsection

@section('footer')
@include('admin.layout.footer')
@endsection