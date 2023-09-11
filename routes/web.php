<?php

use App\Livewire\Akun;
use App\Livewire\Usaha;
use App\Livewire\Barang;
use App\Livewire\Person;
use App\Livewire\Transaksi;
use App\Livewire\JenisPendapatan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::get('/pengelola', Person::class)->name('pengelola');
Route::get('/usaha', Usaha::class)->name('usaha');
Route::get('/barang', Barang::class)->name('barang');
Route::get('/jenispendapatan', JenisPendapatan::class)->name('jenispendapatan');
Route::get('/akun', Akun::class)->name('akun');
Route::get('/transaksi', Transaksi::class)->name('transaksi');
