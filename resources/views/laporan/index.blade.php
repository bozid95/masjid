@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('LAPORAN') }}</h1>

<!-- Main Content goes here -->
<form action="{{ url('cari-laporan') }}" method="get">
    @csrf
    <form class="user">
        <label for="">Dari Tanggal</label>
        <div class="form-group">
            <input type="date" class="form-control form-control-user col-md-12" id="dari" name="dari" required
                placeholder="Dari.......">
        </div>
        <label for="">Sampai Tanggal</label>
        <div class="form-group">
            <input type="date" class="form-control form-control-user col-md-12" id="sampai" name="sampai" required
                placeholder="Sampai......">
        </div>
        <button type="submit" class="btn btn-primary btn-user col-md-2">
            Lihat Laporan </button>
        </a>
    </form>
</form>
@if (isset($pemasukan))
<div class="card-body">
    <center>Total Rekap Pemasukan dari {{date('d M Y',strtotime($dari))}} sampai {{date('d M Y',strtotime($sampai))}} :
        @currency($pemasukanRekap)</center>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Pemasukan</th>
                    <th>Nominal</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Nama Pemasukan</th>
                    <th>Nominal</th>
                    <th>Tanggal</th>
                </tr>
            </tfoot>
            <tbody>
                @forelse ($pemasukan as $pemasukan)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$pemasukan->nama_pemasukan}}</td>
                    <td>@currency($pemasukan->jml_pemasukan)</td>
                    <td>{{date('d M Y',strtotime($pemasukan->tgl_pemasukan))}}</td>
                </tr>
                @empty
                <td colspan="6" class="text-center">Tidak ada data...</td>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="card-body">
    <center>Total Rekap Pengeluaran dari {{$dari}} sampai {{$sampai}} : @currency($pengeluaranRekap)</center>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Pengeluaran</th>
                    <th>Nominal</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Nama Pengeluaran</th>
                    <th>Nominal</th>
                    <th>Tanggal</th>
                </tr>
            </tfoot>
            <tbody>
                @forelse ($pengeluaran as $pengeluaran)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$pengeluaran->nama_pengeluaran}}</td>
                    <td>@currency($pengeluaran->jml_pengeluaran)</td>
                    <td>{{date('d M Y',strtotime($pengeluaran->tgl_pengeluaran))}}</td>
                </tr>
                @empty
                <td colspan="6" class="text-center">Tidak ada data...</td>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endif
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
