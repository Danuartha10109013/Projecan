<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function login_proses(Request $request)
{
    // Validasi input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Data login yang akan diproses
    $data = [
        'email' => $request->email,
        'password' => $request->password,
    ];

    // Attempt login
    if (Auth::attempt($data)) {
        // Cek peran pengguna setelah login berhasil
        if (Auth::user()->role == 0) {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->role == 1) {
            return redirect()->route('pegawai.dashboard');
        }
    } else {
        // Redirect kembali ke halaman login jika gagal
        return redirect()->route('login')->with('failed', 'Username atau Password anda salah!');
    }
}

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('succes', 'Kamu berhasil signout');
    }
}
