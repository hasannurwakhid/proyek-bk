<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserData;


class LoginAdminController extends Controller
{
    //

    public function index()
    {
        if(Auth::user()){
            return redirect()->intended('/dashboard-admin/kelola-dokter');
        }

        return view('admin.login', [
            'title' => "Login",
            'active' => "login"
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
            // Regenerasi sesi untuk mencegah session fixation attacks
            $request->session()->regenerate();

            // Cek role pengguna
            if (Auth::user()->role=="admin") {
                return redirect()->intended('/dashboard-admin/kelola-dokter');
            } else {
                // Logout jika bukan admin
                Auth::logout();
                return back()->with('loginError', 'Akses ditolak! Anda bukan admin.');
            }
        }

        return back()->with('loginError', 'Login gagal! Nama pengguna atau password salah.');
    }

    public function logoutAdmin(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
