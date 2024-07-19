<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginmemberController extends Controller
{
    public function index(){
        return view('frontend.login');
    }


    public function proses(Request $request) {
        // cek form validation
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        // cek apakah email dan password benar
        if (auth()->attempt(request(['email', 'password']))) {

            if(Auth::user()->role != 2){
                return redirect()->back()->with('errormsg','Maaf akun anda bukan member');
            } else {
                return redirect('/member');
            }
            
        } else {
            return redirect()->back()->with('errormsg','Login Gagal! Periksa kembali Email dan Password anda');
        }
    }


    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
