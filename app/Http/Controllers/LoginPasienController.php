<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginPasienController extends Controller
{
    //
    public function index()
    {
        return view('pasien.login', [
            
        ]);
    }

    public function register()
    {
        return view('pasien.register', [
            
        ]);
    }
    public function storeRegister(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|min:3|max:255|unique:users',
            'password' => 'required|min:5|max:255',
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_ktp' => 'required|max:255',
            'no_hp' => 'required|max:255',
        ]);

        $lastPasien = Pasien::latest('id')->first();
        $urut = $lastPasien ? $lastPasien->id + 1 : 1;

        $year = date('Y');
        $month = date('m');

        $validatedData['no_rm'] = "{$year}{$month}-{$urut}";

        $user = User::create([
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Buat data pasien
        Pasien::create([
            'user_id' => $user->id,
            'nama' => $validatedData['nama'],
            'alamat' => $validatedData['alamat'],
            'no_ktp' => $validatedData['no_ktp'],
            'no_hp' => $validatedData['no_hp'],
            'no_rm' => $validatedData['no_rm'],
        ]);

        return redirect('/login-pasien')->with('success', 'Register berhasil');

    }

    public function authenticate(Request $request)
    {
        
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $remember = $request->has('remember');
        
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            if (Auth::user()->role=="pasien") {
                return redirect()->intended('/dashboard-pasien/daftar-poli');
                
            } else {
                Auth::logout();
                return back()->with('loginError', 'Akses ditolak! Anda bukan pasien.');
            }
        }
        return back()->with('loginError', 'Login gagal! Nama pengguna atau password salah.');
    }

    public function logoutPasien(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
