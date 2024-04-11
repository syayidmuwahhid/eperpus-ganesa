<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Cetak Laporan Anggota</title>
    <style>
      body {
        font-family: Arial, sans-serif;
      }
/* 
      @page {
        size: portrait;
      } */
      
      .page {
        width: 8.56cm;
        height: 5.4cm;
        page-break-after: always;
        margin: 0;
        padding: 0;
        background-color: #FFF;
        border: 3px solid black;
      }
      
      .page-content {
        padding: 1cm;
      }
      
      h4, h5 {
        /* font-size: 28px; */
        text-align: center;
        margin: 0;
        padding: 0;
      }
      
      h6 {
        font-size: 8px;
        text-align: left;
        margin: 0;
        padding: 0;
        height: 20px;
      }
    </style>
  </head>
  <body>
    @foreach($data as $d)
    <div class="page">
      <div class="page-content">
        <h4>KARTU PERPUSTAKAAN</h4>
        <h5>SMK GANESA SUKABUMI</h5>
        <hr>

        <!-- <br> -->
        <!-- <br> -->
        <br>
        <div style="width: 100%;">
            <div style="float: left; width: 70%;">
                <div style="width: 100%;">
                    <div style="float: left; width: 50%;">
                        <h6>Nomor Anggota</h6>
                        <h6>Nama</h6>
                    </div>
                    <div style="float: left; width: 50%;">
                        <h6>: {{ $d->nomor_anggota }}</h6>
                        <h6>: {{ $d->name }}</h6>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 30%; align-items: right;">
                {!! QrCode::size(50)->generate($d->password) !!}
            
            </div>
        </div>
        <br>
        <br>
        <br>
        <hr>
        <p style="font-size: 5px; text-align: center;">{{ $d->password }}</p>
      </div>
    </div>
    @endforeach
  </body>
  <script>
    window.print();
  </script>
</html>