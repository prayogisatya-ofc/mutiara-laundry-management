<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function index(){
        return view('login');
    }

    // Menangani permintaan login
    public function logedin(Request $request){
        $data = $request->only('username', 'password');
        if(Auth::attempt($data)){
            return redirect()->route('dashboard');
        } else {
            return back()->withInput()->withErrors(['login_error' => 'Username atau password salah.']);
        }
    }

    // Menangani permintaan logout
    public function logout(){
        Auth::logout();
        return redirect()->route('login_views');
    }

    public function dashboard(){
        return view('dashboard', ['title' => 'Dashboard']);
    }
}
