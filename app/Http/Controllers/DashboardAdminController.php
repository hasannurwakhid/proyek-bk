<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Poli;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class DashboardAdminController extends Controller
{

    public function kelolaDokter()
    {
        $dokters = Dokter::all();
        return view('admin.dokters.index', [
            'dokters' => $dokters
        ]);
    }
    public function kelolaObat()
    {
        $obats = Obat::all();
        return view('admin.obats.index', [
            'obats' => $obats
        ]);
    }
    public function kelolaPasien()
    {
        $pasiens = Pasien::all();
        return view('admin.pasiens.index', [
            'pasiens' => $pasiens
        ]);
    }
    public function kelolaPoli()
    {
        $polis = Poli::all();
        return view('admin.polis.index', [
            'polis' => $polis
        ]);
    }

    //
    public function index()
    {

        $obats = Obat::all();
        $polis = Poli::all();
        $dokters = Dokter::all();
        $pasiens = Pasien::all();


        return view('admin.dashboard', [
            'obats' => $obats,
            'polis' => $polis,
            'dokters' => $dokters,
            'pasiens' => $pasiens
        ]);
    }

    public function addDokter()
    {
        $polis = Poli::all();

        return view('admin.dokters.addDokter', [
            'polis' => $polis,
        ]);
    }
    public function storeAddDokter(Request $request)
    {

        $validatedData = $request -> validate([
            'username' => 'required|min:3|max:255|unique:users',
            'password' => 'required|min:5|max:255',
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_hp' => 'required|max:255',
            'id_poli' => 'required|numeric|exists:polis,id',
        ]);

        $user = User::create([
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
        ]);

        Dokter::create([
            'user_id' => $user->id,
            'nama' => $validatedData['nama'],
            'alamat' => $validatedData['alamat'],
            'no_hp' => $validatedData['no_hp'],
            'id_poli' => $validatedData['id_poli'],
        ]);
        
        return redirect('/dashboard-admin/kelola-dokter')->with('success', 'Dokter baru telah ditambahkan');
    }
    public function editDokter(Dokter $dokter)
    {
        $polis = Poli::all();
        return view('admin.dokters.editDokter', [
            'dokter' => $dokter,
            'polis' => $polis
        ]);
    }
    public function storeEditDokter(Request $request, Dokter $dokter)
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

        return redirect('/dashboard-admin/kelola-dokter')->with('success', 'Data dokter telah diupdate');
    }
    public function deleteDokter(Dokter $dokter)
    {
        User::where('id', $dokter->user_id)->delete();
        Dokter::destroy($dokter->id);
        
        return redirect('/dashboard-admin/kelola-dokter')->with('success', 'Dokter telah dihapus');
    }

    public function addPasien()
    {
        return view('admin.pasiens.addPasien', [
            
        ]);
    }
    public function storeAddPasien(Request $request)
    {

        $validatedData = $request -> validate([
            'username' => 'required|min:3|max:255|unique:users',
            'password' => 'required|min:5|max:255',
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_ktp' => 'required|max:255',
            'no_hp' => 'required|max:255',
            'no_rm' => 'required|max:255',
        ]);

        $user = User::create([
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
        ]);

        Pasien::create([
            'user_id' => $user->id,
            'nama' => $validatedData['nama'],
            'alamat' => $validatedData['alamat'],
            'no_ktp' => $validatedData['no_ktp'],
            'no_hp' => $validatedData['no_hp'],
            'no_rm' => $validatedData['no_rm'],
        ]);
        
        return redirect('/dashboard-admin/kelola-pasien')->with('success', 'Pasien baru telah ditambahkan');
    }
    public function editPasien(Pasien $pasien)
    {
        return view('admin.pasiens.editPasien', [
            'pasien' => $pasien,
        ]);
    }
    public function storeEditPasien(Request $request, Pasien $pasien)
    {

        $validatedData = $request->validate([
            'username' => 'required|min:3|max:255|unique:users,username,' . $pasien->user_id,
            'password' => 'nullable|min:5|max:255',
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_ktp' => 'required|max:255',
            'no_hp' => 'required|max:255',
            'no_rm' => 'required|max:255',
        ]);
        
        $pasien->user->update([
            'username' => $validatedData['username'],
            'password' => $validatedData['password'] 
                ? Hash::make($validatedData['password']) 
                : $pasien->user->password,
        ]);

        $pasien->update([
            'nama' => $validatedData['nama'],
            'alamat' => $validatedData['alamat'],
            'no_ktp' => $validatedData['no_ktp'],
            'no_hp' => $validatedData['no_hp'],
            'no_rm' => $validatedData['no_rm'],
        ]);

        return redirect('/dashboard-admin/kelola-pasien')->with('success', 'Data pasien telah diupdate');
    }
    public function deletePasien(Pasien $pasien)
    {
        User::where('id', $pasien->user_id)->delete();
        Pasien::destroy($pasien->id);
        
        return redirect('/dashboard-admin/kelola-pasien')->with('success', 'Pasien telah dihapus');
    }

    public function addPoli()
    {

        return view('admin.polis.addPoli', [
            
        ]);
    }

    public function storeAddPoli(Request $request)
    {

        $validatedData = $request -> validate([
            'nama_poli' => 'required|max:255',
            'keterangan' => 'required|max:255',
        ]);

        Poli::create($validatedData);

        return redirect('/dashboard-admin/kelola-poli')->with('success', 'Poli baru telah ditambahkan');
    }

    public function editPoli(Poli $poli)
    {
        return view('admin.polis.editPoli', [
            'poli' => $poli
        ]);
    }

    public function storeEditPoli(Request $request, Poli $poli)
    {

        $validatedData = $request -> validate([
            'nama_poli' => 'required|max:255',
            'keterangan' => 'required|max:255',
        ]);

        Poli::where('id', $poli->id)->update($validatedData);

        return redirect('/dashboard-admin/kelola-poli')->with('success', 'Poli baru telah diupdate');
    }
    public function deletePoli(Poli $poli)
    {
        Poli::destroy($poli->id);
        return redirect('/dashboard-admin/kelola-poli')->with('success', 'Poli telah dihapus');
    }


    public function addObat()
    {

        return view('admin.obats.addObat', [
            
        ]);
    }
    public function storeAddObat(Request $request)
    {

        $validatedData = $request -> validate([
            'nama_obat' => 'required|max:255',
            'kemasan' => 'required|max:255',
            'harga' => 'required|numeric|min:0',

        ]);

        Obat::create($validatedData);

        return redirect('/dashboard-admin/kelola-obat')->with('success', 'Obat baru telah ditambahkan');
    }
    public function editObat(Obat $obat)
    {
        return view('admin.obats.editObat', [
            'obat' => $obat
        ]);
    }
    public function storeEditObat(Request $request, Obat $obat)
    {

        $validatedData = $request -> validate([
            'nama_obat' => 'required|max:255',
            'kemasan' => 'required|max:255',
            'harga' => 'required|numeric|min:0',

        ]);

        Obat::where('id', $obat->id)->update($validatedData);

        return redirect('/dashboard-admin/kelola-obat')->with('success', 'Obat baru telah diupdate');
    }
    public function deleteObat(Obat $obat)
    {
        Obat::destroy($obat->id);
        return redirect('/dashboard-admin/kelola-obat')->with('success', 'Obat telah dihapus');
    }


    
}
