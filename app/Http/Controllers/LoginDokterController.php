<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginDokterController extends Controller
{
    //
    public function index()
    {
        if(Auth::user()){
            return redirect()->intended('/dashboard-dokter/jadwal-periksa');
        }
        return view('dokter.login', [
            
        ]);
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
            if (Auth::user()->role=="dokter") {
                return redirect()->intended('/dashboard-dokter/jadwal-periksa');
                // dd(Auth::user()->username);
                // dd("Login Dokter Berhasil");
            } else {
                Auth::logout();
                return back()->with('loginError', 'Akses ditolak! Anda bukan dokter.');
            }
        }
        return back()->with('loginError', 'Login gagal! Nama pengguna atau password salah.');
    }

    public function logoutDokter(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
