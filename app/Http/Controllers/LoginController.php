<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('backend.v_login.login', [
            'judul' => 'Halaman Login',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function proses(Request $request)
    {
        // cek form validation
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        // cek apakah email dan password benar
        if (auth()->attempt(request(['email', 'password']))) {
            
            return redirect('/dashboard');
        }

        // jika salah, kembali ke halaman login
        return redirect()->back()->with('pesanerror', 'Username/Email atau Password salah');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->to('/login');
    }
}