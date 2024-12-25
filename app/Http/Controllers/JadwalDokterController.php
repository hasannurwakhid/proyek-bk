<?php

namespace App\Http\Controllers;

use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;

class JadwalDokterController extends Controller
{
    //
    public function getJadwalByPoli($poli)
    {
        // Ambil jadwal dokter berdasarkan poli
        $jadwalDokter = JadwalPeriksa::with('dokter')
            ->whereHas('dokter', function ($query) use ($poli) {
                $query->where('id_poli', $poli);
            })->where('isAktif', 1)
            ->get(['id', 'hari', 'jam_mulai', 'jam_selesai']);

        // Jika jadwal tidak ditemukan, kembalikan pesan error
        if ($jadwalDokter->isEmpty()) {
            return response()->json(['message' => 'Tidak ada jadwal dokter untuk poli ini'], 404);
        }

        return response()->json($jadwalDokter);
    }
}
