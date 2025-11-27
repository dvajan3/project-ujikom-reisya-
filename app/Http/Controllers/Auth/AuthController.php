<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $user = Auth::user();
            
            // Redirect based on role
            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard')->with('success', 'Selamat datang kembali, Admin!');
            } elseif ($user->isSiswa()) {
                return redirect()->route('siswa.dashboard')->with('success', 'Selamat datang kembali!');
            } elseif ($user->isGuru()) {
                return redirect()->route('guru.dashboard')->with('success', 'Selamat datang kembali!');
            } else {
                return redirect()->route('home')->with('success', 'Selamat datang kembali!');
            }
        }

        return back()->withErrors([
            'username' => 'Invalid credentials'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('home')->with('success', 'Anda telah berhasil logout. Terima kasih!');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:user',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => null,
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]);

        Auth::login($user);
        
        return redirect()->route('home')->with('success', 'Terima kasih sudah mendaftar! Selamat datang di Reisya Majalah.');
    }
}