<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function proses_register(Request $request)
    {
        $request->validate([
            'nama_user' => 'required',
            'NIS' => 'required|unique:user',
            'kelas' => 'required',
            'no_telepon' => 'required',
            'email' => 'required|email|unique:user',
            'password' => 'required',
        ]);

        User::create([
            'nama_user' => $request->nama_user,
            'NIS' => $request->NIS,
            'kelas' => $request->kelas,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'user'
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil.');
    }

    public function login()
    {
        return view('login');
    }

    public function proses_login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials)) {

            if (auth()->user()->role == 'admin') {
                return redirect('/dashboard-admin');
            }

            if (auth()->user()->role == 'petugas') {
                return redirect('/dashboard-petugas');
            }

            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.'
        ]);
    }

    public function dashboard()
    {
        return view('siswa.dashboard');
    }

    public function dashboard_admin()
    {
        return view('admin.dashboard-admin');
    }

    public function dashboard_petugas()
    {
        return view('petugas.dashboard-petugas');
    }


    public function logout()
    {
        auth()->logout();

        return redirect('/login');
    }
}