<?php

namespace App\Http\Controllers;

use App\Models\DataBuku;
use App\Models\Penerimaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'judul' => 'Data Penerimaan Buku', 
            'keterangan' => 'Tabel Data Penerimaan Buku',
            'data' => Penerimaan::select('penerimaans.*', 'judul', 'nama_penerbit', 'tahun_terbit', 'nama_kategori')
                ->join('data_bukus', 'data_bukus.kode_buku', 'penerimaans.kode_buku')
                ->join('penerbits', 'penerbits.id', 'penerbit_id')
                ->join('kategori_bukus', 'kategori_bukus.id', 'kategori_buku_id')
                ->get()
        );
        return view('admin.penerimaan', $data);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'judul' => 'Tambah Penerimaan Buku',
            'aksi' => route('penerimaan.simpan'),
        );
        return view('admin.penerimaantambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //cek kode buku
        $cek = DataBuku::where('kode_buku', $request->kode_buku)->first();
        if (empty($cek)) {
            return redirect()->back()->withInput()->with('error', 'Kode Buku Tidak Ditemukan !!');
        }

        Penerimaan::insert([
            'kode_buku' => $request->kode_buku,
            'tanggal_diterima' => $request->tanggal_diterima,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('penerimaan')->with('success', 'Data Berhasil Disimpan');
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
        $data = array(
            'judul' => 'Edit Penerimaan Buku',
            'aksi' => route('penerimaan.update', ['id' => $id]),
            'data' => Penerimaan::where('id', $id)->first()
        );
        return view('admin.penerimaantambah', $data);
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
        //cek kode buku
        $cek = DataBuku::where('kode_buku', $request->kode_buku)->first();
        if (empty($cek)) {
            return redirect()->back()->withInput()->with('error', 'Kode Buku Tidak Ditemukan !!');
        }

        Penerimaan::where('id', $id)->update([
            'kode_buku' => $request->kode_buku,
            'tanggal_diterima' => $request->tanggal_diterima,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'user_id' => Auth::user()->id,
            'updated_at' => now()
        ]);
        return redirect()->route('penerimaan')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penerimaan::where('id', $id)->delete();
        return redirect()->route('penerimaan')->with('success', 'Data Berhasil Dihapus');
    }
}
