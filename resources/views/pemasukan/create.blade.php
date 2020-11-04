@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Tambah Data Pemasukan') }}</h1>

<!-- Main Content goes here -->
<form action="{{ route('pemasukans.store') }}" method="POST">
    @csrf
    <form class="user">
        <div class="form-group">
            <input type="text" class="form-control form-control-user col-md-3" id="nama_pemasukan" name="nama_pemasukan"
                required placeholder="Masukan nama pemasukan..">
        </div>
        <div class="form-group">
            <input type="number" class="form-control form-control-user col-md-3" id="jml_pemasukan" name="jml_pemasukan"
                required placeholder="Masukan jumlah pemasukan..">
        </div>
        <div class="form-group">
            <input type="date" class="form-control form-control-user col-md-3" id="tgl_pemasukan" name="tgl_pemasukan"
                required placeholder="Masukan tanggal pemasukan..">
        </div>
        <button type="submit" class="btn btn-primary btn-user col-md-3">
            Tambah Pemasukan </button>
        </a>
    </form>
</form>

<!-- End of Main Content
@endsection

@push('notif')
@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('status'))
    <div class="alert alert-success border-left-success" role="alert">
        {{ session('status') }}
    </div>
@endif
@endpush
