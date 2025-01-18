<?php

namespace App\Http\Controllers;

use App\Models\DaftarPoli;
use App\Models\DetailPeriksa;
use App\Models\Dokter;
use App\Models\JadwalPeriksa;
use App\Models\Konsultasi;
use App\Models\Obat;
use App\Models\Periksa;
use App\Models\Poli;
use Illuminate\Auth\Events\Validated;
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

        // $jadwalHariSama = JadwalPeriksa::where('id_dokter', $validatedData['id_dokter'])
        //     ->where('hari', $validatedData['hari'])
        //     ->exists();

        // if ($jadwalHariSama) {
        //     return back()->withErrors(['isAktif' => 'Tidak bisa menambahkan jadwal ini karena sudah ada jadwal lain dengan hari yang sama.']);
        // }
        

        // $poliDokter = Auth::user()->dokter->id_poli;
        
        // $dokterSama = JadwalPeriksa::whereHas('dokter', function ($query) use ($poliDokter) {
        //     $query->where('id_poli', $poliDokter);
        // })
        // ->where('hari', $validatedData['hari'])
        // ->where('isAktif', true) // Menambahkan kondisi isAktif true
        // ->exists();


        // if ($dokterSama) {
        //     return back()->withErrors(['hari' => 'Tidak bisa menambahkan jadwal karena sudah ada dokter dengan poli yang sama pada hari tersebut.']);
        // }

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


    public function memeriksaPasien()
    {
        $dokterId = Auth::user()->dokter->id;

        $daftarPolis = DaftarPoli::whereHas('jadwalPeriksa', function ($query) use ($dokterId) {
            $query->where('id_dokter', $dokterId);
        })->get();
        
        return view('dokter.memeriksaPasien.index', [
            'daftarPolis' => $daftarPolis
        ]);
    }

    public function periksaPasien(DaftarPoli $daftarPoli)
    {
        
        $obats = Obat::all();
        return view('dokter.memeriksaPasien.periksaPasien', [
            'obats' => $obats,
            'daftarPoli' => $daftarPoli
        ]);
    }

    public function storePeriksaPasien(Request $request, DaftarPoli $daftarPoli)
    {
        $validatedData = $request->validate([
            'tgl_periksa' => 'required|date',
            'catatan' => 'nullable|string',
            'id_obat' => 'required|array',
            'id_obat.*' => 'exists:obats,id', // Validasi untuk setiap obat yang dipilih
        ]);

        $totalHargaObat = Obat::whereIn('id', $validatedData['id_obat'])->sum('harga');

        $biayaPeriksa = $totalHargaObat + 150000;
        
        $periksa = Periksa::create([
            'id_daftar_poli' => $daftarPoli->id,
            'tgl_periksa' => $validatedData['tgl_periksa'],
            'catatan' => $validatedData['catatan'],
            'biaya_periksa' => $biayaPeriksa,
        ]);

        foreach ($validatedData['id_obat'] as $obatId) {
            DetailPeriksa::create([
                'id_periksa' => $periksa->id,
                'id_obat' => $obatId,
            ]);
        }
        
        return redirect('/dashboard-dokter/memeriksa-pasien')->with('success', 'Data periksa berhasil disimpan.');
    }
    public function editPeriksaPasien(Request $request, Periksa $periksa)
    {
        $obats = Obat::all();
        return view('dokter.memeriksaPasien.editPeriksaPasien', [
            'periksa' => $periksa,
            'detailPeriksas' => $periksa->detailPeriksa,
            'obats' => $obats
        ]);
    }
    public function storeEditPeriksaPasien(Request $request, Periksa $periksa)
    {
       $validatedData = $request->validate([
            'tgl_periksa' => 'required|date',
            'catatan' => 'nullable|string',
            'id_obat' => 'required|array',
            'id_obat.*' => 'exists:obats,id',
        ]);
        $totalHargaObat = Obat::whereIn('id', $validatedData['id_obat'])->sum('harga');
        $biayaPeriksa = $totalHargaObat + 150000;

        DetailPeriksa::where('id_periksa',$periksa->id)->forceDelete();
        $periksa->update([
            'tgl_periksa' => $validatedData['tgl_periksa'],
            'catatan' => $validatedData['catatan'],
            'biaya_periksa' => $biayaPeriksa,
        ]);
        foreach ($validatedData['id_obat'] as $obatId) {
            DetailPeriksa::create([
                'id_periksa' => $periksa->id,
                'id_obat' => $obatId,
            ]);
        }
        return redirect('/dashboard-dokter/memeriksa-pasien')->with('success', 'Data periksa berhasil diupdate.');
    }
    public function riwayatPasien(Request $request, Periksa $periksa)
    {
        // Ambil data dokter yang login
        $dokter = Auth::user()->dokter; // Pastikan relasi antara `users` dan `dokters` sudah terdefinisi.

        // Ambil riwayat pasien berdasarkan dokter
        $riwayatPasien = Periksa::whereHas('daftarPoli.jadwalPeriksa', function ($query) use ($dokter) {
            $query->where('id_dokter', $dokter->id);
        })
        ->orderBy('tgl_periksa', 'desc') // Urutkan berdasarkan tanggal
        ->get();

        // Kembalikan data ke view
        return view('dokter.riwayatPasien.index', [
            'riwayatPasien' => $riwayatPasien,
        ]);
    }
    public function riwayatPasienDetail(Periksa $periksa)
    {
        return view('dokter.riwayatPasien.riwayatPasienDetail', [
            'riwayatPasien' => $periksa,
        ]);
    }
    public function konsultasi()
    {
        $konsultasis = Konsultasi::where('id_dokter', Auth::user()->dokter->id)->get();

        return view('dokter.konsultasi.index', [
            'konsultasis' => $konsultasis,
        ]);
    }
    public function editKonsultasi(Konsultasi $konsultasi)
    {
        return view('dokter.konsultasi.editKonsultasi', [
            'konsultasi' => $konsultasi,
        ]);
    }
    public function storeEditKonsultasi(Request $request, Konsultasi $konsultasi)
    {
        $validatedData = $request -> validate([
            'jawaban' => 'max:255',
        ]);

        Konsultasi::where('id', $konsultasi->id)->update($validatedData);
        return redirect('/dashboard-dokter/konsultasi')->with('success', 'Konsultasi berhasil diubah');
    }
}
