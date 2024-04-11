<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'judul' => 'Pengguna', 
            'keterangan' => 'Tabel Pengguna',
            'data' => User::where('status_user', 2)->get()
        );
        return view('admin.pengguna', $data);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'judul' => 'Tambah Pengguna',
            'aksi' => route('pengguna.simpan')
        );
        return view('admin.penggunatambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::insert([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'finger_data' => '',
            'status_user' => 2,
        ]);
        return redirect()->route('pengguna')->with('success', 'Data Berhasil Disimpan');
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
            'judul' => 'Edit Pengguna',
            'aksi' => route('pengguna.update', ['id' => $id]),
            'data' => User::where('id', $id)->first()
        );
        return view('admin.penggunatambah', $data);
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
        User::where('id', $id)->where('status_user', 3)->update([
            'name' => $request->name,
            'username' => strtolower($request->name),
            'finger_data' => '',
            'status_user' => 3,
            'nomor_anggota' => $request->nomor_anggota,
            'updated_at' => now()
        ]);
        return redirect()->route('pengguna')->with('success', 'Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->where('status_user', 3)->delete();
        return redirect()->route('pengguna')->with('success', 'Data Berhasil dihapus');
    }
}
