<?php

namespace App\Http\Controllers;

use App\Models\DataBuku;
use App\Models\PerpusTransaksi;
use App\Models\User;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'judul' => 'Pengembalian Buku', 
            'keterangan' => 'Tabel Pengembalian Buku',
            'data' => PerpusTransaksi::select('perpus_transaksi.*', 'judul', 'nama_penerbit', 'nama_kategori', 'name')
                ->join('data_bukus', 'data_bukus.kode_buku', 'perpus_transaksi.kode_buku')
                ->join('penerbits', 'penerbits.id', 'penerbit_id')
                ->join('kategori_bukus', 'kategori_bukus.id', 'kategori_buku_id')
                ->join('users', 'perpus_transaksi.user_id', 'users.id')
                ->where('perpus_transaksi.status', 1)
                ->get(),
        );
        return view('admin.pengembalian', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'judul' => 'Tambah Pengembalian Buku',
            'aksi' => route('pengembalian.konfirmasi'),
            'anggota' => User::where('status_user', 3)->get()
        );
        return view('admin.pengembaliantambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //cek buku
        $cekBuku = PerpusTransaksi::where(['user_id' => $request->user_id, 'kode_buku' => $request->kode_buku, 'status' => 0])->count();
        if ($cekBuku == 0) {
            return redirect()->back()->withInput()->with('error', 'Tidak Ada Buku yang perlu dikembalikan !!');
        }

        //cek kode buku
        $cek = DataBuku::where('kode_buku', $request->kode_buku)->first();
        if (empty($cek)) {
            return redirect()->back()->withInput()->with('error', 'Kode Buku Tidak Ditemukan !!');
        }

        PerpusTransaksi::where(['user_id' => $request->user_id, 'kode_buku' => $request->kode_buku, 'status' => 0])->update([
            'tanggal_kembali' => now(),
            'status' => 1,
        ]);
        return redirect()->route('pengembalian')->with('success', 'Data Berhasil Disimpan');
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
        //     'judul' => 'Edit Pengembalian Buku',
        //     'aksi' => route('pengembalian.update', ['id' => $id]),
        //     'data' => Pengembalian::where('id', $id)->first()
        // );
        // return view('admin.pengembaliantambah', $data);
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
        // Pengembalian::where('id', $id)->update([
        //     'nama_kategori' => $request->nama_kategori,
        //     'user_id' => 1,
        //     'updated_at' => now()
        // ]);
        // return redirect()->route('pengembalian')->with('success', 'Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   //get data
        $data = PerpusTransaksi::where(['id' => $id, 'status' => 1])->first();

        if ($data) {
            PerpusTransaksi::where(['id' => $id, 'status' => 1])->update([
                'tanggal_kembali' => null,
                'status' => 0
            ]);
        }
        return redirect()->route('pengembalian')->with('success', 'Data Berhasil dihapus');
    }

    public function konfirmasi(Request $request) {
        //cek buku
        $cekBuku = PerpusTransaksi::where(['user_id' => $request->user_id, 'kode_buku' => $request->kode_buku, 'status' => 0])->count();
        if ($cekBuku == 0) {
            return redirect()->back()->withInput()->with('error', 'Tidak Ada Buku yang perlu dikembalikan !!');
        }

        //cek kode buku
        $cek = DataBuku::where('kode_buku', $request->kode_buku)->first();
        if (empty($cek)) {
            return redirect()->back()->withInput()->with('error', 'Kode Buku Tidak Ditemukan !!');
        }

        $data = array(
            'judul' => 'Tambah Pengembalian Buku',
            'aksi' => route('pengembalian.simpan'),
            'anggota' => User::where('status_user', 3)->where('id', $request->user_id)->first(),
            'data' => $request->all(),
            'data_buku' => PerpusTransaksi::where(['user_id' => $request->user_id, 'kode_buku' => $request->kode_buku, 'status' => 0])->first()
        );
        
        return view('admin.pengembaliankonfirmasi', $data);
    }
}
