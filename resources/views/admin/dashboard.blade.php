@extends('layouts.template')
@section('judul', $judul)
@push('css')
    <link href="{{ asset('assets/libs/fullcalendar/dist/fullcalendar.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/extra-libs/calendar/calendar.css') }}" rel="stylesheet" />
@endpush
@section('content')
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-3">
              <div class="card card-hover">
                <div class="box bg-cyan text-center">
                  <h1 class="font-light text-white">
                    <span>{{ $jml_anggota }}</span>
                  </h1>
                  <h6 class="text-white">Anggota</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white">
                    <span>{{ $jml_buku }}</span>
                  </h1>
                  <h6 class="text-white">Jumlah Buku</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3">
              <div class="card card-hover">
                <div class="box bg-warning text-center">
                  <h1 class="font-light text-white">
                    <span>{{ $jml_pinjam }}</span>
                  </h1>
                  <h6 class="text-white">Buku Dipinjam</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3">
              <div class="card card-hover">
                <div class="box bg-danger text-center">
                  <h1 class="font-light text-white">
                    <span>{{ $jml_belumkembali }}</span>
                  </h1>
                  <h6 class="text-white">Buku Belum Dikembalikan</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Selamat Datang, {{ Auth::user()->name }}</h4>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <!-- card -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Riwayat Peminjaman</h4>
                </div>
                <div class="comment-widgets scrollable">
                  <!-- Comment Row -->
                  @foreach($riwayat_pinjam as $rp)
                  <div class="d-flex flex-row comment-row mt-0">
                    <div class="comment-text w-100">
                      <h6 class="font-medium">{{ $rp->name }} <span class="text-muted">{{ date('d F Y H:i:s', strtotime($rp->created_at)) }}</span>
                      </h6>
                      <span class="mb-3 d-block">{{ $rp->judul }} [{{ $rp->jumlah }} Buah]</span>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>

          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Right sidebar -->
          <!-- ============================================================== -->
          <!-- .right-sidebar -->
          <!-- ============================================================== -->
          <!-- End Right sidebar -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        
@endsection
@push('js')
    <script src="{{ asset('assets/libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('assets/libs/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/pages/calendar/cal-init.js') }}"></script>
@endpush