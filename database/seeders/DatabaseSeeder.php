<?php

namespace Database\Seeders;

use App\Models\Dokter;
use App\Models\JadwalPeriksa;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Poli;
use Illuminate\Support\Facades\Hash;


use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Poli::factory()->create([
            'nama_poli' => 'Gigi',
            'keterangan' => 'Poli untuk sakit gigi',
        ]);

        Poli::factory()->create([
            'nama_poli' => 'Saraf',
            'keterangan' => 'Poli untuk saraf',
        ]);

        Obat::factory()->create([
            'nama_obat' => 'Paracetamol',
            'kemasan' => 'Tablet',
            'harga' => 10000,
        ]);

        Obat::factory()->create([
            'nama_obat' => 'Promag',
            'kemasan' => 'Tablet',
            'harga' => 2000,
        ]);

        User::factory()->create([
            'username' => 'adminsatu',
            'password' => Hash::make('12345'),
            'role' => 'admin'
        ]);

        $dokter1 = User::factory()->create([
            'username' => 'dokter1',
            'password' => Hash::make('12345'),
            'role' => 'dokter'
        ]);

        $dokter1Data = Dokter::factory()->create([
            'user_id' => $dokter1->id,
            'nama' => 'Dokter Satu',
            'alamat' => 'Jakarta',
            'no_hp' => '082134308137',
            'id_poli' => 1,
        ]);

        $dokter2 = User::factory()->create([
            'username' => 'dokter2',
            'password' => Hash::make('12345'),
            'role' => 'dokter'
        ]);

        $dokter2Data = Dokter::factory()->create([
            'user_id' => $dokter2->id,
            'nama' => 'Dokter Dua',
            'alamat' => 'Meikarta',
            'no_hp' => '082134308166',
            'id_poli' => 2,
        ]);


        $pasien1 = User::factory()->create([
            'username' => 'pasien1',
            'password' => Hash::make('12345'),
            'role' => 'pasien'
        ]);

        Pasien::factory()->create([
            'user_id' => $pasien1->id,
            'nama' => 'Pasien Satu',
            'alamat' => 'Jakarta',
            'no_ktp' => '33741',
            'no_hp' => '082139448167',
            'no_rm' => '1234567890',
        ]);

        $pasien2 = User::factory()->create([
            'username' => 'pasien2',
            'password' => Hash::make('12345'),
            'role' => 'pasien'
        ]);

        Pasien::factory()->create([
            'user_id' => $pasien2->id,
            'nama' => 'Pasien Dua',
            'alamat' => 'Surabaya',
            'no_ktp' => '33741',
            'no_hp' => '082139448167',
            'no_rm' => '1234567890',
        ]);

        JadwalPeriksa::factory()->create([
            'id_dokter' => $dokter1Data->id,
            'hari' => "Senin",
            'jam_mulai' => "13:00:00",
            'jam_selesai' => "15:00:00",
            'isAktif' => 1
        ]);

        JadwalPeriksa::factory()->create([
            'id_dokter' => $dokter2Data->id,
            'hari' => "Rabu",
            'jam_mulai' => "07:00:00",
            'jam_selesai' => "09:00:00",
            'isAktif' => 1
        ]);

        

        

        
        


        
    }
}
