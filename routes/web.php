<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataBukuController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

#php artisan make:controller namaController --resource
#php artisan make:mode namamodel --all
#php artisan migrate:fresh --seed

Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::post('/submitBuku', [DashboardController::class, 'pinjamBuku'])->name('submit.buku');

//login
Route::get('/admin/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin/login', [LoginController::class, 'authenticate'])->name('loginAuth');
Route::get('/admin/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/admin', function () { return redirect()->route('dashboard'); });
    Route::get('/admin/dashboard', [DashboardController::class, 'indexAdmin'])->name('dashboard');

    //kategori buku
    Route::get('/admin/kategori-buku', [KategoriBukuController::class, 'index'])->name('kategori-buku');
    Route::get('/admin/kategori-buku/tambah', [KategoriBukuController::class, 'create'])->name('kategori-buku.tambah');
    Route::post('/admin/kategori-buku/simpan', [KategoriBukuController::class, 'store'])->name('kategori-buku.simpan');
    Route::get('/admin/kategori-buku/edit/{id}', [KategoriBukuController::class, 'edit'])->name('kategori-buku.edit');
    Route::post('/admin/kategori-buku/update/{id}', [KategoriBukuController::class, 'update'])->name('kategori-buku.update');
    Route::get('/admin/kategori-buku/hapus/{id}', [KategoriBukuController::class, 'destroy'])->name('kategori-buku.hapus');

    //penerbit
    Route::get('/admin/penerbit', [PenerbitController::class, 'index'])->name('penerbit');
    Route::get('/admin/penerbit/tambah', [PenerbitController::class, 'create'])->name('penerbit.tambah');
    Route::post('/admin/penerbit/simpan', [PenerbitController::class, 'store'])->name('penerbit.simpan');
    Route::get('/admin/penerbit/edit/{id}', [PenerbitController::class, 'edit'])->name('penerbit.edit');
    Route::post('/admin/penerbit/update/{id}', [PenerbitController::class, 'update'])->name('penerbit.update');
    Route::get('/admin/penerbit/hapus/{id}', [PenerbitController::class, 'destroy'])->name('penerbit.hapus');

    //buku
    Route::get('/admin/buku', [DataBukuController::class, 'index'])->name('buku');
    Route::get('/admin/buku/tambah', [DataBukuController::class, 'create'])->name('buku.tambah');
    Route::post('/admin/buku/simpan', [DataBukuController::class, 'store'])->name('buku.simpan');
    Route::get('/admin/buku/edit/{id}', [DataBukuController::class, 'edit'])->name('buku.edit');
    Route::post('/admin/buku/update/{id}', [DataBukuController::class, 'update'])->name('buku.update');
    Route::get('/admin/buku/hapus/{id}', [DataBukuController::class, 'destroy'])->name('buku.hapus');

    //penerimaan
    Route::get('/admin/penerimaan', [PenerimaanController::class, 'index'])->name('penerimaan');
    Route::get('/admin/penerimaan/tambah', [PenerimaanController::class, 'create'])->name('penerimaan.tambah');
    Route::post('/admin/penerimaan/simpan', [PenerimaanController::class, 'store'])->name('penerimaan.simpan');
    Route::get('/admin/penerimaan/edit/{id}', [PenerimaanController::class, 'edit'])->name('penerimaan.edit');
    Route::post('/admin/penerimaan/update/{id}', [PenerimaanController::class, 'update'])->name('penerimaan.update');
    Route::get('/admin/penerimaan/hapus/{id}', [PenerimaanController::class, 'destroy'])->name('penerimaan.hapus');

    //pengeluaran
    Route::get('/admin/pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran');
    Route::get('/admin/pengeluaran/tambah', [PengeluaranController::class, 'create'])->name('pengeluaran.tambah');
    Route::post('/admin/pengeluaran/simpan', [PengeluaranController::class, 'store'])->name('pengeluaran.simpan');
    Route::get('/admin/pengeluaran/edit/{id}', [PengeluaranController::class, 'edit'])->name('pengeluaran.edit');
    Route::post('/admin/pengeluaran/update/{id}', [PengeluaranController::class, 'update'])->name('pengeluaran.update');
    Route::get('/admin/pengeluaran/hapus/{id}', [PengeluaranController::class, 'destroy'])->name('pengeluaran.hapus');

    //anggota
    Route::get('/admin/anggota', [AnggotaController::class, 'index'])->name('anggota');
    Route::get('/admin/anggota/tambah', [AnggotaController::class, 'create'])->name('anggota.tambah');
    Route::post('/admin/anggota/simpan', [AnggotaController::class, 'store'])->name('anggota.simpan');
    Route::get('/admin/anggota/edit/{id}', [AnggotaController::class, 'edit'])->name('anggota.edit');
    Route::post('/admin/anggota/update/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
    Route::get('/admin/anggota/hapus/{id}', [AnggotaController::class, 'destroy'])->name('anggota.hapus');
    Route::get('/admin/anggota/cetak/{id}', [AnggotaController::class, 'cetak'])->name('anggota.cetak');
    Route::get('/admin/anggota/cetak-all', [AnggotaController::class, 'cetakAll'])->name('anggota.cetak-all');
    
    //pengguna
    Route::get('/admin/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
    Route::get('/admin/pengguna/tambah', [PenggunaController::class, 'create'])->name('pengguna.tambah');
    Route::post('/admin/pengguna/simpan', [PenggunaController::class, 'store'])->name('pengguna.simpan');
    Route::get('/admin/pengguna/edit/{id}', [PenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::post('/admin/pengguna/update/{id}', [PenggunaController::class, 'update'])->name('pengguna.update');
    Route::get('/admin/pengguna/hapus/{id}', [PenggunaController::class, 'destroy'])->name('pengguna.hapus');
    
    //peminjaman
    Route::get('/admin/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman');
    Route::get('/admin/peminjaman/tambah', [PeminjamanController::class, 'create'])->name('peminjaman.tambah');
    Route::post('/admin/peminjaman/simpan', [PeminjamanController::class, 'store'])->name('peminjaman.simpan');
    Route::get('/admin/peminjaman/edit/{id}', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
    Route::post('/admin/peminjaman/update/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
    Route::get('/admin/peminjaman/hapus/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.hapus');
    
    //pengembalian
    Route::get('/admin/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian');
    Route::get('/admin/pengembalian/tambah', [PengembalianController::class, 'create'])->name('pengembalian.tambah');
    Route::post('/admin/pengembalian/simpan', [PengembalianController::class, 'store'])->name('pengembalian.simpan');
    Route::get('/admin/pengembalian/edit/{id}', [PengembalianController::class, 'edit'])->name('pengembalian.edit');
    Route::post('/admin/pengembalian/update/{id}', [PengembalianController::class, 'update'])->name('pengembalian.update');
    Route::get('/admin/pengembalian/hapus/{id}', [PengembalianController::class, 'destroy'])->name('pengembalian.hapus');
    Route::post('/admin/pengembalian/konfirmasi', [PengembalianController::class, 'konfirmasi'])->name('pengembalian.konfirmasi');
    
    //Laporan
    Route::get('/admin/laporan/koleksi-buku', [LaporanController::class, 'KoleksiBuku'])->name('laporan.koleksi-buku');
    Route::get('/admin/laporan/koleksi-buku/cetak', [LaporanController::class, 'KoleksiBukuCetak'])->name('laporan.koleksi-buku.cetak');
    Route::get('/admin/laporan/peminjaman', [LaporanController::class, 'Peminjaman'])->name('laporan.peminjaman');
    Route::get('/admin/laporan/peminjaman/cetak', [LaporanController::class, 'PeminjamanCetak'])->name('laporan.peminjaman.cetak');
    Route::get('/admin/laporan/anggota', [LaporanController::class, 'Anggota'])->name('laporan.anggota');
    Route::get('/admin/laporan/anggota/cetak', [LaporanController::class, 'AnggotaCetak'])->name('laporan.anggota.cetak');
});
Route::get('/profile', function () {
    echo "o";
})->withoutMiddleware('admin');


Route::get('/inilaravel', [mahasiswaController::class, 'index']);