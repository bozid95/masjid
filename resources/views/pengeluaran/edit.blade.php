@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Edit pengeluaran') }}</h1>

<!-- Main Content goes here -->
<form action="{{ route('pengeluarans.update',['pengeluaran' => $pengeluaran->id]) }}" method="POST">
    @method('PATCH')
    @csrf
    <form class="user">
        <div class="form-group">
            <input type="text" class="form-control form-control-user col-md-3" id="nama_pengeluaran"
                name="nama_pengeluaran" value="{{ old('nama_pengeluaran') ?? $pengeluaran->nama_pengeluaran }}" required
                placeholder="Masukan nama pengeluaran..">
        </div>
        <div class="form-group">
            <input type="number" class="form-control form-control-user col-md-3" id="jml_pengeluaran"
                name="jml_pengeluaran" value="{{ old('jml_pengeluaran') ?? $pengeluaran->jml_pengeluaran }}" required
                placeholder="Masukan jumlah pengeluaran..">
        </div>
        <div class="form-group">
            <input type="date" class="form-control form-control-user col-md-3" id="tgl_pengeluaran"
                name="tgl_pengeluaran" value="{{ old('ntgl_pengeluaran') ?? $pengeluaran->tgl_pengeluaran }}" required
                placeholder="Masukan tanggal pengeluaran..">
        </div>
        <button type="submit" class="btn btn-primary btn-user col-md-3">
            Update pengeluaran </button>
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
