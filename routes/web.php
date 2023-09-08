<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsahaController;
use App\Livewire\Akun;
use App\Livewire\JenisPendapatan;
use App\Livewire\Person;
use App\Livewire\TransaksiJasa;
use App\Livewire\Usaha;

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


Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::group(['middleware' => ['auth']], function () {
Route::get('/pengelola', Person::class)->name('pengelola');
Route::get('/usaha', Usaha::class)->name('usaha');
Route::get('/barang', [BarangController::class, 'index'])->name('barang');
Route::get('/jenispendapatan', JenisPendapatan::class)->name('jenispendapatan');
Route::get('/Akun', Akun::class)->name('akun');
Route::get('/transaksi/{usaha}', TransaksiJasa::class)->name('trxjasa');
// });
