<?php

namespace App\Http\Controllers;

use App\Models\DataBuku;
use App\Models\PerpusTransaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'judul' => 'Peminjaman Buku', 
            'keterangan' => 'Tabel Peminjaman Buku',
            'data' => PerpusTransaksi::select('perpus_transaksi.*', 'judul', 'nama_penerbit', 'nama_kategori', 'name')
                ->join('data_bukus', 'data_bukus.kode_buku', 'perpus_transaksi.kode_buku')
                ->join('penerbits', 'penerbits.id', 'penerbit_id')
                ->join('kategori_bukus', 'kategori_bukus.id', 'kategori_buku_id')
                ->join('users', 'perpus_transaksi.user_id', 'users.id')
                ->orderBy('status', 'asc')
                ->orderBy('tanggal_pinjam', 'desc')
                ->get(),
        );
        return view('admin.peminjaman', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'judul' => 'Tambah Peminjaman Buku',
            'aksi' => route('peminjaman.simpan'),
            'anggota' => User::where('status_user', 3)->get()
        );
        return view('admin.peminjamantambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //cek riwayat
        $riwayat = PerpusTransaksi::where(['user_id' => $request->user_id, 'status' => 0])->count();

        if ($riwayat != 0) {
            return redirect()->back()->withInput()->with('error', 'Pengguna Belum Mengembalikan Buku !!');
        }

        //cek kode buku
        $cek = DataBuku::where('kode_buku', $request->kode_buku)->first();
        if (empty($cek)) {
            return redirect()->back()->withInput()->with('error', 'Kode Buku Tidak Ditemukan !!');
        }

        PerpusTransaksi::insert([
            'kode_buku' => $request->kode_buku,
            'tanggal_pinjam' => now(),
            'status' => 0,
            'jumlah' => $request->jumlah,
            'user_id' => $request->user_id,
        ]);
        return redirect()->route('peminjaman')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data = array(
        //     'judul' => 'Edit Peminjaman Buku',
        //     'aksi' => route('peminjaman.update', ['id' => $id]),
        //     'data' => peminjaman::where('id', $id)->first()
        // );
        // return view('admin.peminjamantambah', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // peminjaman::where('id', $id)->update([
        //     'nama_kategori' => $request->nama_kategori,
        //     'user_id' => 1,
        //     'updated_at' => now()
        // ]);
        // return redirect()->route('peminjaman')->with('success', 'Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PerpusTransaksi::where(['id' => $id, 'status' => 0])->delete();
        return redirect()->route('peminjaman')->with('success', 'Data Berhasil dihapus');
    }
}
