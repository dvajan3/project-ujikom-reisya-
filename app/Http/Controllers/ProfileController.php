<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile.show', ['user' => Auth::user()]);
    }

    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:user,email,' . $user->id_user . ',id_user',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $user->nama = $request->nama;
        $user->email = $request->email;

        if ($request->hasFile('foto')) {
            if ($user->foto) {
                Storage::disk('public')->delete($user->foto);
            }
            $user->foto = $request->file('foto')->store('profiles', 'public');
        }

        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui');
    }
}