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
        return view('pages.Login'); //return view folder pages/login
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);                                    //request+validation value from view

        if (Auth::attempt($credentials)) {     //authenticate user with credential. if creadential is valid(username and password match), fucntion attempt will authenticate user and store authentication status in session
            $request->session()->regenerate(); //security reason for session
            return redirect()->intended('pengelola');
        }

        return back()->with('LoginFailed', 'Login Gagal!');
    }

    public function logout(Request $request)
    {
        Auth::logout();                         //logout the currently authenticated user
        $request->session()->invalidate();      //Ensuring that the active user session becomes invalid.
        $request->session()->regenerateToken(); //security reason for CSRF token
        return redirect('/');
    }
}
