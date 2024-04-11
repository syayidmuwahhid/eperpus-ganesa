<?php

namespace App\Http\Controllers;

use App\Models\DataBuku;
use App\Models\Penerimaan;
use App\Models\Pengeluaran;
use App\Models\PerpusTransaksi;
use App\Models\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    function KoleksiBuku() 
    {
        $qry = DataBuku::select('data_bukus.*', 'nama_penerbit', 'nama_kategori')
            ->join('penerbits', 'penerbit_id', 'penerbits.id')
            ->join('kategori_bukus', 'kategori_buku_id', 'kategori_bukus.id')
            ->get();
        
            foreach ($qry as $q) {
                $penerimaan = (int) Penerimaan::where('kode_buku', $q->kode_buku)->sum('jumlah');
                $pengeluaran = (int) Pengeluaran::where('kode_buku', $q->kode_buku)->sum('jumlah');

                $q->jumlah = $penerimaan-$pengeluaran;
            }

        $data = array(
            'judul' => 'Koleksi Buku', 
            'keterangan' => 'Tabel Koleksi Buku',
            'data' => $qry,
        );
        return view('admin.koleksibuku', $data);
    }
    
    function KoleksiBukuCetak() 
    {
        $qry = DataBuku::select('data_bukus.*', 'nama_penerbit', 'nama_kategori')
            ->join('penerbits', 'penerbit_id', 'penerbits.id')
            ->join('kategori_bukus', 'kategori_buku_id', 'kategori_bukus.id')
            ->get();
        
        foreach ($qry as $q) {
            $penerimaan = (int) Penerimaan::where('kode_buku', $q->kode_buku)->sum('jumlah');
            $pengeluaran = (int) Pengeluaran::where('kode_buku', $q->kode_buku)->sum('jumlah');
            $q->jumlah = $penerimaan-$pengeluaran;
        }
        return view('admin.koleksibukucetak', ['data' => $qry]);
    }

    function Peminjaman() 
    {
        $qry = PerpusTransaksi::select('perpus_transaksi.*', 'judul', 'nama_penerbit', 'nama_kategori', 'name')
            ->join('data_bukus', 'data_bukus.kode_buku', 'perpus_transaksi.kode_buku')
            ->join('penerbits', 'penerbits.id', 'penerbit_id')
            ->join('kategori_bukus', 'kategori_bukus.id', 'kategori_buku_id')
            ->join('users', 'perpus_transaksi.user_id', 'users.id')
            ->get();

        $data = array(
            'judul' => 'Laporan Peminjaman', 
            'keterangan' => 'Tabel Laporan Peminjaman',
            'data' => $qry,
        );
        return view('admin.laporanpeminjaman', $data);
    }

    function PeminjamanCetak(Request $request) 
    {
        $qry = PerpusTransaksi::select('perpus_transaksi.*', 'judul', 'nama_penerbit', 'nama_kategori', 'name')
            ->join('data_bukus', 'data_bukus.kode_buku', 'perpus_transaksi.kode_buku')
            ->join('penerbits', 'penerbits.id', 'penerbit_id')
            ->join('kategori_bukus', 'kategori_bukus.id', 'kategori_buku_id')
            ->join('users', 'perpus_transaksi.user_id', 'users.id')
            ->whereMonth('perpus_transaksi.created_at', explode('-', $request->bulan)[1])
            ->get();
        return view('admin.laporanpeminjamancetak', ['data' => $qry]);
    }
    
    function Anggota() 
    {
        $qry = User::where('status_user', 3)->get();

        $data = array(
            'judul' => 'Laporan Anggota', 
            'keterangan' => 'Tabel Laporan Anggota',
            'data' => $qry,
        );
        return view('admin.laporananggota', $data);
    }

    function AnggotaCetak() 
    {
        $qry = User::where('status_user', 3)->get();
        return view('admin.laporananggotacetak', ['data' => $qry]);
    }
}
