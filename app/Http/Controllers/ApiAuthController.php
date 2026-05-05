<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ApiAuthController extends Controller
{
    public function login(Request $request)
    {
        // VALIDASI
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi'
        ]);

        // LOGIN
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Email atau password salah'
            ], 401);
        }

        // AMBIL USER
        $user = Auth::user();

        // BUAT TOKEN
        $token = $user->createToken('api-token')->plainTextToken;

        // RESPONSE
        return response()->json([
            'token' => $token
        ]);
    }
    public function register(Request $request)
    {
        // VALIDASI
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan',

            'password.required' => 'Password wajib diisi',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        // SIMPAN USER
        $user = User::create([
            'name' => 'user baru',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // BUAT TOKEN
        $token = $user->createToken('api-token')->plainTextToken;

        // RESPONSE
        return response()->json([
            'email' => $user->email,
            'token' => $token
        ]);
    }
    public function logout(Request $request)
    {
        // HAPUS TOKEN YANG SEDANG DIPAKAI
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout berhasil'
        ]);
    }
}
