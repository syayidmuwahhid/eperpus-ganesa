@extends('layouts.template')
@section('judul', $judul)
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}" />
@endpush
@section('content')
    <div class="container-fluid">
        <div class="card">
            <form class="form-horizontal" method="post" action="{{ $aksi }}">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Nomor Keanggotaan</label>
                        <div class="col-sm-9">
                            <select name="user_id" class="form-select select2">
                                @foreach($anggota as $a)
                                    <option value="{{ $a->id }}">{{ '[' . $a->nomor_anggota . '] ' . $a->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Kode Buku</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="kode_buku" placeholder="Masukan Kode Buku" required value="{{ isset($data) ? $data->kode_buku : '' }}" />
                            <!-- <span class="text-danger">*Pastikan Jumlah Buku yang dikembalian sebanyak Buku</span> -->
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
    <script src="{{ asset('assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/libs/select2/dist/js/select2.min.js') }}"></script>
    <script>
        $('.select2').select2();
    </script>
@endpush