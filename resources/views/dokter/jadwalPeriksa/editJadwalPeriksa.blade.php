@extends('dokter.layouts.main')
@section('container')
    <div class="w-full mx-auto">
        <div class="mt-36 max-w-md border shadow-md mx-auto p-7 rounded-md">
            <h1 class="mb-6 text-2xl font-bold text-center ">Edit Jadwal</h1>
            <form action="/dashboard-dokter/jadwal-periksa/{{ $jadwalPeriksa->id }}/edit" method="POST">
                @method('put')
                @csrf
                <div class="mb-2">
                    <label for="hari" class="form-label font-semibold">Hari</label>
                    <select name="hari" class="p-2 w-full rounded-md border border-slate-300">
                        <option value="Senin" {{ old('hari', $jadwalPeriksa) == 'Senin' ? 'selected' : '' }}>Senin</option>
                        <option value="Selasa" {{ old('hari', $jadwalPeriksa) == 'Selasa' ? 'selected' : '' }}>Selasa
                        </option>
                        <option value="Rabu" {{ old('hari', $jadwalPeriksa) == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                        <option value="Kamis" {{ old('hari', $jadwalPeriksa) == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                        <option value="Jumat" {{ old('hari', $jadwalPeriksa) == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                        <option value="Sabtu" {{ old('hari', $jadwalPeriksa) == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                        <option value="Minggu" {{ old('hari', $jadwalPeriksa) == 'Minggu' ? 'selected' : '' }}>Minggu
                        </option>
                    </select>
                    @error('hari')
                        <div class="mb-5 text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">

                    <label for="jam_mulai" class="font-semibold block text-gray-700">Jam Mulai</label>
                    <input type="time" name="jam_mulai" id="jam_mulai"
                        value="{{ old('jam_mulai', date('H:i', strtotime($jadwalPeriksa->jam_mulai))) }}"
                        class="p-2 w-full rounded-md border border-slate-300">
                    @error('jam_mulai')
                        <div class="text-red-600 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="jam_selesai" class="font-semibold block text-gray-700">Jam Selesai</label>
                    <input type="time" name="jam_selesai" id="jam_selesai"
                        value="{{ old('jam_selesai', date('H:i', strtotime($jadwalPeriksa->jam_selesai))) }}"
                        class="p-2 w-full rounded-md border border-slate-300">
                    @error('jam_selesai')
                        <div class="text-red-600 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-10">
                    <label for="isAktif" class="font-semibold form-label">Aktif</label>
                    <select name="isAktif" class="p-2 w-full rounded-md border border-slate-300">
                        <option value="0" {{ old('isAktif', $jadwalPeriksa) == 0 ? 'selected' : '' }}>Tidak</option>
                        <option value="1" {{ old('isAktif', $jadwalPeriksa) == 1 ? 'selected' : '' }}>Ya</option>

                    </select>
                    @error('isAktif')
                        <div class="mb-5 text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full border p-2 rounded-md bg-green-700 hover:opacity-90 text-white">Tambah</button>
            </form>
        </div>
    </div>
@endsection
