@extends('layouts.template')
@section('judul', $judul)
@push('css')
@endpush
@section('content')
    <div class="container-fluid">
        <div class="card">
            <form class="form-horizontal" method="post" action="{{ $aksi }}">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Kode Buku</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="kode_buku" placeholder="Masukan Kode Buku" required value="{{ isset($data) ? $data->kode_buku : '' }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Judul Buku</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="judul" placeholder="Masukan Judul Buku" required value="{{ isset($data) ? $data->judul : '' }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Penerbit Buku</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="penerbit_id" placeholder="Pilih Penerbit" required>
                                @if(isset($data)) <option value="{{ $data->penerbit_id }}">{{ $data->nama_penerbit }}</option> @endif
                                @if(isset($penerbit))
                                    @foreach($penerbit as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama_penerbit }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Tahun Terbit</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="tahun_terbit" placeholder="Masukan Tahun Terbit" required value="{{ isset($data) ? $data->tahun_terbit : '' }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Penulis</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="penulis" placeholder="Masukan Nama Penulis" required value="{{ isset($data) ? $data->penulis : '' }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Kategori Buku</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="kategori_id" placeholder="Pilih Kategori" required>
                                @if(isset($data)) <option value="{{ $data->kategori_buku_id }}">{{ $data->nama_kategori }}</option> @endif
                                @if(isset($kategori))
                                    @foreach($kategori as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama_kategori }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
@endpush