@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('DATA PEMASUKAN') }}</h1>
<!-- Main Content goes here -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
    @push('success')
    @endpush
    <div class="card-header py-3">
        <a href="{{route('pemasukans.create')}}"><button class="btn btn-primary">Tambah Pemasukan</button></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Pemasukan</th>
                        <th>Nominal</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nama Pemasukan</th>
                        <th>Nominal</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse ($pemasukans as $pemasukan)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$pemasukan->nama_pemasukan}}</td>
                        <td>@currency($pemasukan->jml_pemasukan)</td>
                        <td>{{date('d M Y',strtotime($pemasukan->tgl_pemasukan))}}</td>
                        <td>
                            <form action="{{ route('pemasukans.destroy',['pemasukan'=>$pemasukan->id]) }}"
                                method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger ml-3"
                                    onclick="return confirm('Anda yakin mau menghapus item ini ?')">Hapus</button>

                                <a href="{{ route('pemasukans.edit',['pemasukan' => $pemasukan->id]) }}"
                                    class="btn btn-primary">Edit</a>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <td colspan="6" class="text-center">Tidak ada data...</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

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
