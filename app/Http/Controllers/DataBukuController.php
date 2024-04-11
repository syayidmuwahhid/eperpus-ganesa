<?php

namespace App\Http\Controllers;

use App\Models\DataBuku;
use App\Models\KategoriBuku;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'judul' => 'Data Buku', 
            'keterangan' => 'Tabel Data Buku',
            'data' => DataBuku::select('data_bukus.*', 'nama_penerbit', 'nama_kategori')
                ->join('penerbits', 'penerbit_id', 'penerbits.id')
                ->join('kategori_bukus', 'kategori_buku_id', 'kategori_bukus.id')
                ->get()
        );
        return view('admin.buku', $data);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'judul' => 'Tambah Buku',
            'aksi' => route('buku.simpan'),
            'penerbit' => Penerbit::get(),
            'kategori' => KategoriBuku::get(),
        );
        return view('admin.bukutambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DataBuku::insert([
            'kode_buku' => $request->kode_buku,
            'judul' => $request->judul,
            'penerbit_id' => $request->penerbit_id,
            'tahun_terbit' => $request->tahun_terbit,
            'penulis' => $request->penulis,
            'kategori_buku_id' => $request->kategori_id,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('buku')->with('success', 'Data Berhasil Disimpan');
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
            'judul' => 'Edit Penerbit',
            'aksi' => route('buku.update', ['id' => $id]),
            'penerbit' => Penerbit::get(),
            'kategori' => KategoriBuku::get(),
            'data' => DataBuku::select('data_bukus.*', 'nama_penerbit', 'nama_kategori')
                ->join('penerbits', 'penerbit_id', 'penerbits.id')
                ->join('kategori_bukus', 'kategori_buku_id', 'kategori_bukus.id')
                ->where('data_bukus.id', $id)->first()
        );
        return view('admin.bukutambah', $data);
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
        DataBuku::where('id', $id)->update([
            'kode_buku' => $request->kode_buku,
            'judul' => $request->judul,
            'penerbit_id' => $request->penerbit_id,
            'tahun_terbit' => $request->tahun_terbit,
            'penulis' => $request->penulis,
            'kategori_buku_id' => $request->kategori_id,
            'user_id' => Auth::user()->id,
            'updated_at' => now()
        ]);
        return redirect()->route('buku')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataBuku::where('id', $id)->delete();
        return redirect()->route('buku')->with('success', 'Data Berhasil Dihapus');
    }
}
