<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Email;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // VALIDASI BACKEND
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        // CEK LOGIN
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate(); // keamanan
            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah'
        ]);
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function register(Request $request)
    {
        // VALIDASI BACKEND
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password tidak boleh kosong',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        // SIMPAN USER
        User::create([
            'name' => 'user', // default
            'email' => $request->email,
            'password' => Hash::make($request->password), // 🔒 bcrypt
        ]);

        return redirect('/login')->with('success', 'Register berhasil, silakan login!');
    }
}
