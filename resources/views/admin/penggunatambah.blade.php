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
                        <label class="col-sm-3 text-end control-label col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" placeholder="Masukan Nama" required value="{{ isset($data) ? $data->name : '' }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" placeholder="Masukan Username" required value="{{ isset($data) ? $data->username : '' }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="password" placeholder="Masukan Password" required />
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