<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan Formulir Registrasi
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses Registrasi User
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:merchant,customer', // Validasi pilihan role
        ]);

        // Membuat user baru dengan role yang dipilih
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // Role ditambahkan di sini
        ]);

        // Login otomatis setelah registrasi
        Auth::login($user);

        // Redirect ke halaman utama atau dashboard
        return redirect()->route('home')->with('success', 'Registration successful!');
    }

    // Menampilkan Formulir Login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses Login User
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Logout User
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
