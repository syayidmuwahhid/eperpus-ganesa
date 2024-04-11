@extends('layouts.template')
@section('judul', $judul)
@push('css')
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/jquery-minicolors/jquery.minicolors.css') }}" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/quill/dist/quill.snow.css') }}" /> -->
@endpush
@section('content')
    <div class="container-fluid">
        <div class="card">
            <form class="form-horizontal" method="post" action="{{ $aksi }}">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Nama Kategori</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_kategori" placeholder="Masukan Nama Kategori" required value="{{ isset($data) ? $data->nama_kategori : '' }}" />
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
    <!-- <script src="{{ asset('assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script> -->
    <!-- <script src="{{ asset('dist/js/pages/mask/mask.init.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/libs/select2/dist/js/select2.full.min.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/libs/select2/dist/js/select2.min.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/libs/jquery-asColor/dist/jquery-asColor.min.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/libs/jquery-asGradient/dist/jquery-asGradient.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/libs/jquery-minicolors/jquery.minicolors.min.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/libs/quill/dist/quill.min.js') }}"></script> -->
@endpush