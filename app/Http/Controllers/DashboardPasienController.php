<?php

namespace App\Http\Controllers;

use App\Models\JadwalPeriksa;
use App\Models\Poli;
use Illuminate\Http\Request;

class DashboardPasienController extends Controller
{
    //
    public function daftarPoli(){
        $polis = Poli::all();
        return view('pasien.daftarPoli.index', [
            'polis'=>$polis
        ]);
    }
    public function getJadwalDokter($poli_id)
    {
        // Ambil jadwal dokter berdasarkan poli_id
        $jadwals = JadwalPeriksa::where('id_poli', $poli_id)->get();

        // Return JSON response
        return response()->json($jadwals);
    }
}
