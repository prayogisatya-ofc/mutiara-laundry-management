<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
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
        $profit = 0;
        foreach (Transaction::where('payment', 'paid')->get() as $trans) {
            $profit += $trans->getTotal();
        }

        $today = Carbon::today();

        return view('dashboard', [
            'title' => 'Dashboard', 
            'profit' => $profit,
            'transaction_done' => Transaction::where('status', 'done')->orWhere('status', 'taken')->count(),
            'transactions_process' => Transaction::where('status', 'process')->count(),
            'transactions_today' => Transaction::whereDate('created_at', $today)->count(),
            'data' => Transaction::whereDate('created_at', $today)->limit(5)->latest()->get(),
        ]);
    }
}
