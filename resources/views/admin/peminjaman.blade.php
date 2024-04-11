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
                    <a class="btn btn-info" href="{{ route('peminjaman.tambah') }}">Tambah Data</a>
                </div>
            </div><br>
            <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Anggota</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Harus Kembali</th>
                        <th>Kode Buku</th>
                        <th>Judul Buku</th>
                        <th>Penerbit</th>
                        <th>Kategori</th>
                        <th>Jumlah Buku</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($data as $d)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->tanggal_pinjam }}</td>
                            <td>{{ date('Y-m-d', strtotime('+3 day', strtotime($d->tanggal_pinjam))) }}</td>
                            <td>{{ $d->kode_buku }}</td>
                            <td>{{ $d->judul }}</td>
                            <td>{{ $d->nama_penerbit }}</td>
                            <td>{{ $d->nama_kategori }}</td>
                            <td>{{ $d->jumlah }}</td>
                            <td>{{ $d->status == 0 ? 'Belum Dikembalikan' : 'Selesai' }}</td>
                            <td>
                                <!-- <a href="{{ route('peminjaman.edit', ['id' => $d->id]) }}" class="btn btn-warning">Edit</a href="edit"> -->
                                @if($d->status == 0)
                                <a href="{{ route('peminjaman.hapus', ['id' => $d->id]) }}" class="btn btn-danger">Delete</a href="edit">
                                @endif
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