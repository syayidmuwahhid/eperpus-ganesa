<?php

namespace App\Http\Controllers;

use App\Models\DataBuku;
use App\Models\Penerimaan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'judul' => 'Data Pengeluaran Buku', 
            'keterangan' => 'Tabel Data Pengeluaran Buku',
            'data' => Pengeluaran::select('pengeluarans.*', 'judul', 'nama_penerbit', 'tahun_terbit', 'nama_kategori')
                ->join('data_bukus', 'data_bukus.kode_buku', 'pengeluarans.kode_buku')
                ->join('penerbits', 'penerbits.id', 'penerbit_id')
                ->join('kategori_bukus', 'kategori_bukus.id', 'kategori_buku_id')
                ->get()
        );
        return view('admin.pengeluaran', $data);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'judul' => 'Tambah Pengeluaran Buku',
            'aksi' => route('pengeluaran.simpan'),
        );
        return view('admin.pengeluarantambah', $data);
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
        
        //cek total buku
        $penerimaan = (int) Penerimaan::where('kode_buku', $request->kode_buku)->sum('jumlah');
        if ($request->jumlah > $penerimaan) {
            return redirect()->back()->withInput()->with('error', 'Jumlah Buku Tidak Valid !! [tersedia: ' . $penerimaan . ' Buku]');
        }

        Pengeluaran::insert([
            'kode_buku' => $request->kode_buku,
            'tanggal_dikeluarkan' => $request->tanggal_dikeluarkan,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'user_id' => 1,
        ]);
        return redirect()->route('pengeluaran')->with('success', 'Data Berhasil Disimpan');
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
            'judul' => 'Edit Pengeluaran Buku',
            'aksi' => route('pengeluaran.update', ['id' => $id]),
            'data' => Pengeluaran::where('id', $id)->first()
        );
        return view('admin.pengeluarantambah', $data);
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

        Pengeluaran::where('id', $id)->update([
            'kode_buku' => $request->kode_buku,
            'tanggal_dikeluarkan' => $request->tanggal_dikeluarkan,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'user_id' => 1,
            'updated_at' => now()
        ]);
        return redirect()->route('pengeluaran')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengeluaran::where('id', $id)->delete();
        return redirect()->route('pengeluaran')->with('success', 'Data Berhasil Dihapus');
    }
}
