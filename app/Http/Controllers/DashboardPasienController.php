<?php

namespace App\Http\Controllers;

use App\Models\DaftarPoli;
use App\Models\Dokter;
use App\Models\JadwalPeriksa;
use App\Models\Konsultasi;
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
    public function riwayatPoli(){
        $user = Auth::user();
        $daftarPolis = DaftarPoli::where('id_pasien', $user->pasien->id)->get();
        return view('pasien.riwayatPoli.index', [
            'daftarPolis'=>$daftarPolis
        ]);
    }
    public function detailRiwayatPoli(DaftarPoli $daftarPoli){
        return view('pasien.riwayatPoli.detailRiwayatPoli', [
            'daftarPoli'=>$daftarPoli
        ]);
    }

    public function konsultasi(){

        $konsultasis = Konsultasi::where('id_pasien', Auth::user()->pasien->id)->get();
        return view('pasien.konsultasi.index', [
            'konsultasis'=>$konsultasis
        ]);
    }

    public function addKonsultasi(){
        $dokters = Dokter::all();
        return view('pasien.konsultasi.addKonsultasi', [
            'dokters'=>$dokters
        ]);
    }

    public function storeAddKonsultasi(Request $request){
        $validatedData = $request -> validate([
            'id_dokter' => 'required',
            'subject' => 'required|max:255',
            'pertanyaan' => 'required|max:255',
        ]);
        
        $validatedData['id_pasien'] = Auth::user()->pasien->id;
        
        Konsultasi::create($validatedData);
        return redirect('/dashboard-pasien/konsultasi')->with('success', 'Konsultasi  telah diajukan');
        
    }
    public function deleteKonsultasi(Konsultasi $konsultasi)
    {
        Konsultasi::destroy($konsultasi->id);
        return redirect('/dashboard-pasien/konsultasi')->with('success', 'Konsultasi telah dihapus');
    }

    public function editKonsultasi(Konsultasi $konsultasi)
    {
        return view('pasien.konsultasi.editKonsultasi', [
            'konsultasi'=>$konsultasi
        ]);
    }

    public function storeEditKonsultasi(Request $request, Konsultasi $konsultasi)
    {
        $validatedData = $request -> validate([
            'subject' => 'required|max:255',
            'pertanyaan' => 'required|max:255',
        ]);

        Konsultasi::where('id', $konsultasi->id)->update($validatedData);
        return redirect('/dashboard-pasien/konsultasi')->with('success', 'Konsultasi berhasil diubah');
        
    }
}
