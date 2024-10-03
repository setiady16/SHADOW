<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Import model User

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login')->with('status', session('status'));
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

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Redirect ke halaman yang diinginkan setelah login
            return redirect()->intended('dashboard')->with('status', 'Anda berhasil login.');
        }

        // Kembalikan ke halaman login dengan pesan error jika gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();

        // Redirect ke halaman login setelah logout
        return redirect()->route('login')->with('status', 'Anda telah logout.');
    }

    // Menampilkan form register
    public function showRegisterForm()
    {
        return view('auth.register')->with('status', session('status'));
    }

    // Proses register (untuk membuat akun baru)
    public function register(Request $request)
    {
        // Validasi input pendaftaran
        $request->validate([
            'name' => 'required|string|max:255|alpha', // Validasi tambahan
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Otomatis login setelah register
        Auth::login($user);

        // Redirect ke dashboard setelah berhasil register
        return redirect()->route('dashboard.index')->with('status', 'Akun Anda telah berhasil dibuat.');
    }
}
