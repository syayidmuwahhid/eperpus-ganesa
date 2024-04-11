<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\DataBuku;
use App\Models\PerpusTransaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    function index() {
        return view('anggota.dashboard');
    }

    function pinjamBuku(Request $request) {
        //validasi user
        $cekuser = User::where(['password' => $request->password, 'status_user' => 3])->first();
        if ($cekuser && Hash::check($cekuser->username, $request->password)) {
            //cek riwayat
            $riwayat = PerpusTransaksi::where(['user_id' => $cekuser->id, 'status' => 0])->count();
            
            if ($riwayat != 0) {
                return redirect()->back()->withInput()->with('error', 'Silakan Mengembalikan Buku Terlebih Dahulu !!');
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
                'user_id' => $cekuser->id,
            ]);
            return redirect()->route('home')->with('success', 'Berhasil Melakukan Peminjaman');
        } else {
            return redirect()->back()->withInput()->with('error', 'Pengguna Tidak Ditemukan !!');
        }
    }

    function indexAdmin() {
        $data = array(
            'judul' => 'Dashboard',
            'jml_anggota' => User::where('status_user', 3)->count(),
            'jml_buku' => DataBuku::count(),
            'jml_pinjam' => PerpusTransaksi::count(),
            'jml_belumkembali' => PerpusTransaksi::where('status', 0)->count(),
            'riwayat_pinjam' => PerpusTransaksi::select('perpus_transaksi.*', 'name', 'judul')
                ->join('users', 'users.id', 'user_id')
                ->join('data_bukus', 'data_bukus.kode_buku', 'perpus_transaksi.kode_buku')
                ->limit(5)
                ->orderBy('perpus_transaksi.created_at', 'desc')
                ->get(),
        );
        return view('admin.dashboard', $data);
    }
}
