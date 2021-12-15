@extends('admin.layout.master')

@section('sidebar')
@include('admin.layout.sidebar')
@endsection

@section('content')
<header class="d-flex align-items-center justify-content-between pb-3 border-bottom mb-3">
    <h2>Ubah Nama {{ $admin->username }}</h2>
</header>
@endsection

@section('footer')
@include('admin.layout.footer')
@endsection