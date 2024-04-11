@extends('layouts.template')
@section('judul', $judul)
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/extra-libs/multicheck/multicheck.css') }}" />
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush
@section('content')
    <div class="container-fluid">
    <div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">{{ $keterangan }}</h5>
                </div>
                <div class="col-md-6 text-end">
                    <a class="btn btn-info" href="{{ route('anggota.tambah') }}">Tambah Data</a>
                    <a class="btn btn-success" href="{{ route('anggota.cetak-all') }}">Cetak Semua</a>
                </div>
            </div><br>
            <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Anggota</th>
                        <th>Nomor Keanggotaan</th>
                        <th>Nomor Kartu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($data as $d)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->nomor_anggota }}</td>
                            <td>{{ $d->password }}</td>
                            <td>
                                <a href="{{ route('anggota.edit', ['id' => $d->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ route('anggota.hapus', ['id' => $d->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                                <a target="_blank" href="{{ route('anggota.cetak', ['id' => $d->id]) }}" class="btn btn-info btn-sm">Cetak</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection
@push('js')
    <script src="{{ asset('assets/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/DataTables/datatables.min.js') }}"></script>
    <script>
      /****************************************
       *       Basic Table                   *
       ****************************************/
      $("#zero_config").DataTable();
    </script>
@endpush