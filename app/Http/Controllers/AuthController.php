<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function proses_register(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_user' => 'required',
            'NIS' => 'required|unique:user',
            'kelas' => 'required',
            'no_telepon' => 'required',
            'email' => 'required|email|unique:user',
            'password' => 'required|min:6',
        ]);

        // Simpan data user ke database
        \App\Models\User::create([
            'nama_user' => $request->nama_user,
            'NIS' => $request->NIS,
            'kelas' => $request->kelas,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function login()
    {
        return view('login');
    }

    public function proses_login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba login dengan credentials yang diberikan
        if (auth()->attempt($credentials)) {
            return redirect('/dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login')->with('success', 'Anda telah logout.');
    }
}
