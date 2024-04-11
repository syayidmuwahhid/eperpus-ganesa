<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Cetak Laporan Anggota</title>
    <style>
      body {
        font-family: Arial, sans-serif;
      }

      @page {
        size: portrait;
      }
      
      .page {
        height: 29.7cm;
        width: 21cm;
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
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Nomor Keanggotaan</th>
                    <th>Tanggal Bergabung</th>
                </tr>
            </thead>
            <tbody>
                @php($no = 1)
                @foreach ($data as $d)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->nomor_anggota }}</td>
                        <td>{{ date('d F Y', strtotime($d->created_at)) }}</td>
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