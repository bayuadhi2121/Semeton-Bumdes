<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.Login'); //return view di folder pages/login
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);                                    //request+validasi value dari view

        if (Auth::attempt($credentials)) {     //mengotentikasi pengguna dengan kredensial yang diterima. Jika kredensial valid (username dan password yang sesuai), fungsi attempt akan mengautentikasi pengguna dan menyimpan status autentikasi dalam sesi
            $request->session()->regenerate(); //alasan keamanan untuk session
            dd('berhasil');
            // return redirect()->intended(route('dashboard'));
        }

        return back()->with('LoginFailed', 'Login Gagal!');
    }

    public function logout(Request $request)
    {
        Auth::logout();                         //mengeluarkan (logout) pengguna yang saat ini diotentikasi
        $request->session()->invalidate();      //memastikan bahwa sesi pengguna yang sedang aktif menjadi tidak valid
        $request->session()->regenerateToken(); //alasan keamanan tambahan untuk token CSRF
        return redirect('/');
    }
}
