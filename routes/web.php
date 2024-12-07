<?php

use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardDokterController;
use App\Http\Controllers\DashboardPasienController;
use App\Http\Controllers\JadwalDokterController;
use App\Http\Controllers\LoginDokterController;
use App\Http\Controllers\LoginPasienController;
use App\Http\Middleware\Admin;
use App\Models\JadwalPeriksa;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingPage');
});

//======================dokter

Route::get('/login-dokter', [LoginDokterController::class, 'index']);
Route::post('/login-dokter', [LoginDokterController::class, 'authenticate']);
Route::post('/logout-dokter', [LoginDokterController::class, 'logoutDokter']);

Route::get('/dashboard-dokter/profil', [DashboardDokterController::class, 'profil']);
Route::put('/dashboard-dokter/profil/{dokter}', [DashboardDokterController::class, 'storeProfil']);

Route::get('/dashboard-dokter/jadwal-periksa', [DashboardDokterController::class, 'jadwalPeriksa']);
Route::get('/dashboard-dokter/jadwal-periksa/tambah', [DashboardDokterController::class, 'addJadwalPeriksa']);
Route::post('/dashboard-dokter/jadwal-periksa/tambah', [DashboardDokterController::class, 'storeAddJadwalPeriksa']);
Route::get('/dashboard-dokter/jadwal-periksa/{jadwalPeriksa}/edit', [DashboardDokterController::class, 'editJadwalPeriksa']);
Route::put('/dashboard-dokter/jadwal-periksa/{jadwalPeriksa}/edit', [DashboardDokterController::class, 'storeEditJadwalPeriksa']);
Route::delete('/dashboard-dokter/jadwal-periksa/{jadwalPeriksa}/hapus', [DashboardDokterController::class, 'deleteJadwalPeriksa']);

//======================pasien

Route::get('/register-pasien', [LoginPasienController::class, 'register']);
Route::post('/register-pasien', [LoginPasienController::class, 'storeRegister']);
Route::get('/login-pasien', [LoginPasienController::class, 'index']);
Route::post('/login-pasien', [LoginPasienController::class, 'authenticate']);
Route::post('/logout-pasien', [LoginPasienController::class, 'logoutPasien']);

Route::get('/dashboard-pasien/daftar-poli', [DashboardPasienController::class, 'daftarPoli']);

Route::get('/getJadwalDokter/{poli}', [JadwalDokterController::class, 'getJadwalByPoli']);

//======================admin

Route::get('/login-admin', [LoginAdminController::class, 'index']);
Route::post('/login-admin', [LoginAdminController::class, 'authenticate']);
Route::post('/logout-admin', [LoginAdminController::class, 'logoutAdmin'])->middleware(Admin::class);

Route::get('/dashboard-admin/kelola-dokter', [DashboardAdminController::class, 'kelolaDokter'])->middleware(Admin::class);
Route::get('/dashboard-admin/kelola-obat', [DashboardAdminController::class, 'kelolaObat'])->middleware(Admin::class);
Route::get('/dashboard-admin/kelola-pasien', [DashboardAdminController::class, 'kelolaPasien'])->middleware(Admin::class);
Route::get('/dashboard-admin/kelola-poli', [DashboardAdminController::class, 'kelolaPoli'])->middleware(Admin::class);

Route::get('/poli', [DashboardAdminController::class, 'addPoli'])->middleware(Admin::class);
Route::post('/poli', [DashboardAdminController::class, 'storeAddPoli'])->middleware(Admin::class);
Route::get('/poli/{poli}/edit', [DashboardAdminController::class, 'editPoli'])->middleware(Admin::class);
Route::put('/poli/{poli}', [DashboardAdminController::class, 'storeEditPoli'])->middleware(Admin::class);
Route::delete('/poli/{poli}', [DashboardAdminController::class, 'deletePoli'])->middleware(Admin::class);

Route::get('/obat', [DashboardAdminController::class, 'addObat'])->middleware(Admin::class);
Route::post('/obat', [DashboardAdminController::class, 'storeAddObat'])->middleware(Admin::class);
Route::get('/obat/{obat}/edit', [DashboardAdminController::class, 'editObat'])->middleware(Admin::class);
Route::put('/obat/{obat}', [DashboardAdminController::class, 'storeEditObat'])->middleware(Admin::class);
Route::delete('/obat/{obat}', [DashboardAdminController::class, 'deleteObat'])->middleware(Admin::class);

Route::get('/dokter', [DashboardAdminController::class, 'addDokter'])->middleware(Admin::class);
Route::post('/dokter', [DashboardAdminController::class, 'storeAddDokter'])->middleware(Admin::class);
Route::get('/dokter/{dokter}/edit', [DashboardAdminController::class, 'editDokter'])->middleware(Admin::class);
Route::put('/dokter/{dokter}', [DashboardAdminController::class, 'storeEditDokter'])->middleware(Admin::class);
Route::delete('/dokter/{dokter}', [DashboardAdminController::class, 'deleteDokter'])->middleware(Admin::class);

Route::get('/pasien', [DashboardAdminController::class, 'addPasien'])->middleware(Admin::class);
Route::post('/pasien', [DashboardAdminController::class, 'storeAddPasien'])->middleware(Admin::class);
Route::get('/pasien/{pasien}/edit', [DashboardAdminController::class, 'editPasien'])->middleware(Admin::class);
Route::put('/pasien/{pasien}', [DashboardAdminController::class, 'storeEditPasien'])->middleware(Admin::class);
Route::delete('/pasien/{pasien}', [DashboardAdminController::class, 'deletePasien'])->middleware(Admin::class);





