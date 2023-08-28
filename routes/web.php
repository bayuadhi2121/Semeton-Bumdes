<?php

use Illuminate\Support\Facades\Route;

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
    return view('pages.Login');
})->name('login');

Route::post('login', function () {
    return view('pages.Login');
})->name('login.post');

Route::get('dashboard', function () {
    return view('layouts.App');
})->name('dashboard');
