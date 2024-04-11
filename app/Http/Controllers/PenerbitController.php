<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'judul' => 'Penerbit', 
            'keterangan' => 'Tabel Penerbit',
            'data' => Penerbit::get()
        );
        return view('admin.penerbit', $data);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'judul' => 'Tambah Penerbit',
            'aksi' => route('penerbit.simpan')
        );
        return view('admin.penerbittambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Penerbit::insert([
            'nama_penerbit' => $request->nama_penerbit,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('penerbit')->with('success', 'Data Berhasil disimpan');
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
            'aksi' => route('penerbit.update', ['id' => $id]),
            'data' => Penerbit::where('id', $id)->first()
        );
        return view('admin.penerbittambah', $data);
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
        Penerbit::where('id', $id)->update([
            'nama_penerbit' => $request->nama_penerbit,
            'user_id' => Auth::user()->id,
            'updated_at' => now()
        ]);
        return redirect()->route('penerbit')->with('success', 'Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penerbit::where('id', $id)->delete();
        return redirect()->route('penerbit')->with('success', 'Data Berhasil dihapus');
    }
}
