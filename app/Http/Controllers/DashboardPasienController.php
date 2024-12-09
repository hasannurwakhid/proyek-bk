<?php

namespace App\Http\Controllers;

use App\Models\DaftarPoli;
use App\Models\JadwalPeriksa;
use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardPasienController extends Controller
{
    //
    public function daftarPoli(){
        $polis = Poli::all();
        return view('pasien.daftarPoli.index', [
            'polis'=>$polis
        ]);
    }
    public function storeDaftarPoli(Request $request){
        
        

        

        $validatedData = $request->validate([
            'id_jadwal' => 'required|exists:jadwal_periksas,id', 
            'keluhan' => 'required|string|max:255',
        ]);   

        try {
            $existingQueueCount = DaftarPoli::where('id_jadwal', $validatedData['id_jadwal'])
                        ->whereDate('created_at', now()->toDateString())
                        ->count();

            $newQueueNumber = $existingQueueCount + 1;

            $daftarPoli = DaftarPoli::create([
                'id_pasien' => Auth::user()->pasien->id, 
                'id_jadwal' => $validatedData['id_jadwal'],
                'keluhan' => $validatedData['keluhan'],
                'no_antrian' => $newQueueNumber
            ]);

            return redirect('/dashboard-pasien/daftar-poli')->with('success', 'Pendaftaran berhasil dilakukan');

        } catch (\Exception $e) {
            // Tangani error jika terjadi masalah saat menyimpan
            return back()->withErrors(['error' => 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.']);
        }
    }   
    
}
