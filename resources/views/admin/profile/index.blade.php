@extends('admin.layout.master')

@section('sidebar')
@include('admin.layout.sidebar')
@endsection


@section('content')
<div class="container">
    <div class="card" style="width: 18rem; margin: 100px auto;">
        <i class="card-img-top fas fa-user-circle fa-5x" style="padding: 10px 105px;"></i>
        <div class="card-body border-top pt-1">
            <div class="d-flex flex-column">
                <p class="mb-0">Nama:</p>
                <p class="mb-2">{{auth()->user()->nama}}</p>
            </div>
            <div class="d-flex flex-column">
                <p class="mb-0">Tanggal Lahir:</p>
                <p class="mb-2">{{auth()->user()->tanggal_lahir}}</p>
            </div>
            <div class="d-flex flex-column">
                <p class="mb-0">Alamat:</p>
                <p class="text-center">{{auth()->user()->alamat}}</p>
            </div>
            <a href="/logout" class="btn btn-primary d-flex justify-content-center">Logout</a>
        </div>
    </div>
</div>

<!-- javascipt -->
<script>

</script>
@endsection

@section('footer')
@include('admin.layout.footer')
@endsection