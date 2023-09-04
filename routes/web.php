<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\UsahaController;

use App\Http\Controllers\JenisPendapatanController;

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
Route::get('/pengelola', [PersonController::class, 'index'])->name('pengelola');

Route::get('/usaha', [UsahaController::class, 'index'])->name('usaha');
Route::get('/barang', [BarangController::class, 'index'])->name('barang');
Route::get('/jenispendapatan', [JenisPendapatanController::class, 'index'])->name('jenispendapatan');
// });
