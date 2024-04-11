<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'judul' => 'Anggota Perpustakaan', 
            'keterangan' => 'Tabel Anggota Perpustakaan',
            'data' => User::where('status_user', 3)->get()
        );
        return view('admin.anggota', $data);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'judul' => 'Tambah Anggota Perpustakaan',
            'aksi' => route('anggota.simpan')
        );
        return view('admin.anggotatambah', $data);
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
            'nomor_anggota' => $request->nomor_anggota,
            'username' => strtolower($request->name),
            'password' => Hash::make(strtolower($request->name)),
            'finger_data' => '',
            'status_user' => 3,
            'created_at' => now()
        ]);
        return redirect()->route('anggota')->with('success', 'Data Berhasil Disimpan');
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
            'judul' => 'Edit Anggota Perpustakaan',
            'aksi' => route('anggota.update', ['id' => $id]),
            'data' => User::where('id', $id)->first()
        );
        return view('admin.anggotatambah', $data);
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
            'nomor_anggota' => $request->nomor_anggota,
            'username' => strtolower($request->name),
            'password' => Hash::make(strtolower($request->name)),
            'finger_data' => '',
            'updated_at' => now()
        ]);
        return redirect()->route('anggota')->with('success', 'Data Berhasil diubah');
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
        return redirect()->route('anggota')->with('success', 'Data Berhasil dihapus');
    }

    function cetak($id)
    {
        // echo QrCode::generate('okk');
        $data = array(
            'data' => User::where('id', $id)->get()
        );
        return view('admin.anggotacetak', $data);
    }
    
    function cetakAll()
    {
        // echo QrCode::generate('okk');
        $data = array(
            'data' => User::where('status_user', 3)->get()
        );
        return view('admin.anggotacetak', $data);
    }
}
