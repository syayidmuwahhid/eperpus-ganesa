<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Cetak Laporan Peminjaman Buku</title>
    <style>
      body {
        font-family: Arial, sans-serif;
      }
      
      @page {
        size: landscape;
      }
      
      .page {
        width: 29.7cm;
        height: 21cm;
        page-break-after: always;
        margin: 0;
        padding: 0;
        background-color: #FFF;
      }
      
      .page-content {
        padding: 1cm;
      }
      
      h1 {
        font-size: 28px;
        text-align: center;
        margin: 0;
        padding: 0;
      }
      
      table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
      }
      
      th {
        background-color: #F2F2F2;
        border: 1px solid #999;
        padding: 8px;
        font-weight: bold;
        text-align: left;
      }
      
      td {
        border: 1px solid #999;
        padding: 8px;
      }
      
      tr:nth-child(even) {
        background-color: #F2F2F2;
      }
    </style>
  </head>
  <body>
    <div class="page">
      <div class="page-content">
        <h1>Laporan Peminjaman Buku</h1>
        <h4 style="text-align: right;">Bulan : {{ date('F', strtotime(Request()->bulan)) }}</h4>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Tanggal Pinjam</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Penerbit</th>
                    <th>Kategori</th>
                    <th>Jumlah Buku</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php($no = 1)
                @foreach ($data as $d)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->tanggal_pinjam }}</td>
                        <td>{{ $d->kode_buku }}</td>
                        <td>{{ $d->judul }}</td>
                        <td>{{ $d->nama_penerbit }}</td>
                        <td>{{ $d->nama_kategori }}</td>
                        <td>{{ $d->jumlah }}</td>
                        <td>{{ $d->status == 0 ? 'Belum Dikembalikan' : 'Selesai' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </body>
  <script>
    window.print();
  </script>
</html>