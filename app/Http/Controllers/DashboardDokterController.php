<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\JadwalPeriksa;
use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class DashboardDokterController extends Controller
{
    //
    public function profil()
    {
        $polis = Poli::all();
        return view('dokter.profil.index', [
            'polis' => $polis
        ]);
    }
    public function storeProfil(Request $request, Dokter $dokter)
    {
        $validatedData = $request->validate([
            'username' => 'required|min:3|max:255|unique:users,username,' . $dokter->user_id,
            'password' => 'nullable|min:5|max:255',
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_hp' => 'required|max:255',
            'id_poli' => 'required|numeric|exists:polis,id',
        ]);
        
        $dokter->user->update([
            'username' => $validatedData['username'],
            'password' => $validatedData['password'] 
                ? Hash::make($validatedData['password']) 
                : $dokter->user->password,
        ]);

        $dokter->update([
            'nama' => $validatedData['nama'],
            'alamat' => $validatedData['alamat'],
            'no_hp' => $validatedData['no_hp'],
            'id_poli' => $validatedData['id_poli'],
        ]);

        return redirect('/dashboard-dokter/profil')->with('success', 'Data dokter telah diupdate');
    }

    public function jadwalPeriksa()
    {
        $jadwalPeriksas = JadwalPeriksa::where('id_dokter', Auth::user()->dokter->id)->get();
        return view('dokter.jadwalPeriksa.index', [
            'jadwalPeriksas' => $jadwalPeriksas
        ]);
    }
    public function addJadwalPeriksa()
    {
        return view('dokter.jadwalPeriksa.addJadwalPeriksa', [
            
        ]);
    }
    public function storeAddJadwalPeriksa(Request $request)
    {
        $validatedData = $request->validate([
            'hari' => 'required|string|max:10', 
            'jam_mulai' => 'required|date_format:H:i', 
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai', 
            'isAktif' => 'required|boolean', 
        ]);

        $validatedData['id_dokter'] = Auth::user()->dokter->id;
        
        if ($validatedData['isAktif']) {
                $jadwalAktif = JadwalPeriksa::where('id_dokter', $validatedData['id_dokter'])
                    ->where('isAktif', true)
                    ->exists();

            if ($jadwalAktif) {
                    return back()->withErrors(['isAktif' => 'Tidak bisa mengaktifkan jadwal ini karena sudah ada jadwal lain yang aktif.']);
                }
        }

        JadwalPeriksa::create($validatedData);

        return redirect('/dashboard-dokter/jadwal-periksa')->with('success', 'Jadwal Telah Ditambahkan');
    }
    public function editJadwalPeriksa(JadwalPeriksa $jadwalPeriksa)
    {
        return view('dokter.jadwalPeriksa.editJadwalPeriksa', [
            'jadwalPeriksa' => $jadwalPeriksa
        ]);
    }
    public function storeEditJadwalPeriksa(Request $request, JadwalPeriksa $jadwalPeriksa)
    {
        $validatedData = $request->validate([
            'hari' => 'required|string|max:10', 
            'jam_mulai' => 'required|date_format:H:i', 
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai', 
            'isAktif' => 'required|boolean', 
        ]);

        $validatedData['id_dokter'] = Auth::user()->dokter->id;
        
        if ($validatedData['isAktif']) {
            $jadwalAktifLain = JadwalPeriksa::where('id_dokter', $jadwalPeriksa->id_dokter)
                ->where('isAktif', true)
                ->where('id', '!=', $jadwalPeriksa->id) // Abaikan jadwal yang sedang di-edit
                ->exists();

            if ($jadwalAktifLain) {
                return back()->withErrors(['isAktif' => 'Tidak bisa mengaktifkan jadwal ini karena sudah ada jadwal lain yang aktif.'])->withInput();
            }
        }

        JadwalPeriksa::where('id', $jadwalPeriksa->id)->update($validatedData);

        return redirect('/dashboard-dokter/jadwal-periksa')->with('success', 'Jadwal Telah Diupdate');

    }
    public function deleteJadwalPeriksa(JadwalPeriksa $jadwalPeriksa)
    {
        $jadwalPeriksa->delete();
        return redirect('/dashboard-dokter/jadwal-periksa')->with('success', 'Jadwal Telah Ditambahkan');
        
    }
}
