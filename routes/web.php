<?php

use App\Livewire\Akun;
use App\Livewire\Usaha;
use App\Livewire\Barang;
use App\Livewire\Hutang;
use App\Livewire\Person;
use App\Livewire\Transaksi;
use App\Livewire\JenisPendapatan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Livewire\Transaksi\Detail\TransaksiDetailBeban;
use App\Livewire\Transaksi\Detail\TransaksiDetailUsaha;
use App\Livewire\Transaksi\Detail\TransaksiDetailLainnya;
use App\Livewire\JurnalUmum;

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

Route::get('/cek1', function () {
    return view('pages.detaildagang.index');
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
    Route::get('/pengelola', Person::class)->name('pengelola');
    Route::get('/usaha', Usaha::class)->name('usaha');
    Route::get('/barang', Barang::class)->name('barang');
    Route::get('/jenispendapatan', JenisPendapatan::class)->name('jenispendapatan');
    Route::get('/akun', Akun::class)->name('akun');
    Route::get('/transaksi', Transaksi::class)->name('transaksi');
    Route::get('/hutang', Hutang::class)->name('hutang');
    Route::get('/transaksi/{transaksi}/Usaha', TransaksiDetailUsaha::class)->name('detailusaha');
    Route::get('/transaksi/{transaksi}/Lainnya', TransaksiDetailLainnya::class)->name('detaillainnya');
    Route::get('/transaksi/{transaksi}/Beban', TransaksiDetailBeban::class)->name('detailbeban');
    Route::get('/jurnalumum', JurnalUmum::class)->name('jurnal');
});


