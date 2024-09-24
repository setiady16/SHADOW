<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Redirect ke dashboard jika sukses
            return redirect()->route('dashboard.index');
        }

        // Kembalikan ke halaman login dengan pesan error jika gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
}

