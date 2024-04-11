<?php

namespace App\Http\Controllers;

use App\Models\KategoriBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'judul' => 'Kategori Buku', 
            'keterangan' => 'Tabel Kategori Buku',
            'data' => KategoriBuku::get()
        );
        return view('admin.kategoribuku', $data);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'judul' => 'Tambah Kategori Buku',
            'aksi' => route('kategori-buku.simpan')
        );
        return view('admin.kategoribukutambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        KategoriBuku::insert([
            'nama_kategori' => $request->nama_kategori,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('kategori-buku')->with('success', 'Data Berhasil Disimpan');
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
            'judul' => 'Edit Kategori Buku',
            'aksi' => route('kategori-buku.update', ['id' => $id]),
            'data' => KategoriBuku::where('id', $id)->first()
        );
        return view('admin.kategoribukutambah', $data);
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
        KategoriBuku::where('id', $id)->update([
            'nama_kategori' => $request->nama_kategori,
            'user_id' => Auth::user()->id,
            'updated_at' => now()
        ]);
        return redirect()->route('kategori-buku')->with('success', 'Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KategoriBuku::where('id', $id)->delete();
        return redirect()->route('kategori-buku')->with('success', 'Data Berhasil dihapus');
    }
}
