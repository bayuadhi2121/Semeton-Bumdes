<?php

use App\Livewire\Akun;
use App\Livewire\Usaha;
use App\Livewire\Barang;
use App\Livewire\Hutang;
use App\Livewire\Person;
use App\Livewire\Dashboard;
use App\Livewire\Transaksi;
use App\Livewire\JenisPendapatan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Livewire\Laporan;
use App\Livewire\Transaksi\Detail\TransaksiDetailBeban;
use App\Livewire\Transaksi\Detail\TransaksiDetailUsaha;
use App\Livewire\Transaksi\Detail\TransaksiDetailLainnya;
use App\Livewire\JurnalUmum;
use App\Livewire\Laporan\Laba\Dagang;
use App\Livewire\Laporan\Laba\Gabungan;
use App\Livewire\Laporan\Laba\Jasa;
use App\Livewire\Laporan\LaporanModal;
use App\Livewire\Laporan\LaporanNeraca;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/neraca', function () {
    return view('pages.neraca.index');
});
Route::get('/cek2', function () {
    return view('pages.detailjasa.index');
});
Route::get('/cek3', function () {
    return view('pages.detailbeban.index');
});
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    // Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/pengelola', Person::class)->name('pengelola');
    Route::get('/usaha', Usaha::class)->name('usaha');
    Route::get('/barang', Barang::class)->name('barang');
    Route::get('/jenispendapatan', JenisPendapatan::class)->name('jenispendapatan');
    Route::get('/akun', Akun::class)->name('akun');
    Route::get('/transaksi', Transaksi::class)->name('transaksi');
    Route::get('/laporan', Laporan::class)->name('laporan');
    Route::get('/hutang', Hutang::class)->name('hutang');
    Route::get('/laporan/neraca', LaporanNeraca::class)->name('neraca');
    Route::get('/laporan/modal', LaporanModal::class)->name('modal');
    Route::get('/laporan/laba/jasa', Jasa::class)->name('jasa');
    Route::get('/laporan/laba/dagang', Dagang::class)->name('dagang');
    Route::get('/laporan/laba/gabungan', Gabungan::class)->name('gabungan');
    Route::get('/transaksi/{transaksi}/Usaha', TransaksiDetailUsaha::class)->name('detailusaha');
    Route::get('/transaksi/{transaksi}/Lainnya', TransaksiDetailLainnya::class)->name('detaillainnya');
    Route::get('/transaksi/{transaksi}/Beban', TransaksiDetailBeban::class)->name('detailbeban');
    Route::get('/jurnalumum', JurnalUmum::class)->name('jurnal');
});
