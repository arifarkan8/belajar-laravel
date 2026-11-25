<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerpusAuthController extends Controller
{
    public function register()
    {
        return view('perpus_register');
    }

    public function simpanRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:pustakawan,anggota'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect('/perpus/login')->with('sukses', 'Registrasi berhasil! Silakan login ke Portal E-Perpustakaan.');
    }

    public function login()
    {
        return view('perpus_login');
    }

    public function cekLogin(Request $request)
    {
        $kredensial = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            return redirect('/perpus/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang kamu masukkan salah!',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/perpus/login')->with('sukses', 'Kamu telah berhasil keluar (Logout).');
    }
}