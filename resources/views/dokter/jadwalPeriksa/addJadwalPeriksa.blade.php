@extends('dokter.layouts.main')
@section('container')
    <div class="w-full mx-auto">
        <div class="mt-36 max-w-md shadow-md mx-auto p-7 rounded-md">
            <form action="/dashboard-dokter/jadwal-periksa/tambah" method="POST">
                @csrf
                <label for="hari" class="form-label">Hari</label>
                <select name="hari" class="p-2 mt-2 mb-5 w-full rounded-md border border-slate-300">
                    <option value="Senin" selected>Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                </select>
                @error('hari')
                    <div class="mb-5 text-red-600">
                        {{ $message }}
                    </div>
                @enderror

                <label for="jam_mulai" class="block text-gray-700">Jam Mulai</label>
                <input type="time" name="jam_mulai" id="jam_mulai" value="{{ old('jam_mulai') }}"
                    class="p-2 mt-2 mb-3 w-full rounded-md border border-slate-300">
                @error('jam_mulai')
                    <div class="text-red-600 text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <label for="jam_selesai" class="block text-gray-700">Jam Selesai</label>
                <input type="time" name="jam_selesai" id="jam_selesai" value="{{ old('jam_selesai') }}"
                    class="p-2 mt-2 mb-3 w-full rounded-md border border-slate-300">
                @error('jam_selesai')
                    <div class="text-red-600 text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <label for="isAktif" class="form-label">Aktif</label>
                <select name="isAktif" class="p-2 mt-2 mb-5 w-full rounded-md border border-slate-300">
                    <option value="0" selected>Tidak</option>
                    <option value="1">Ya</option>

                </select>
                @error('isAktif')
                    <div class="mb-5 text-red-600">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit"
                    class="w-full border p-2 rounded-md bg-green-700 hover:opacity-90 text-white">Tambah</button>
            </form>
        </div>
    </div>
@endsection
