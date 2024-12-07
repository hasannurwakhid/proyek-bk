@extends('admin.layouts.main')
@section('container')
    <div class="w-full mx-auto">
        <div class="mt-20 max-w-md shadow-md mx-auto p-7 rounded-md">
            <form action="/pasien/{{ $pasien->id }}" method="POST">
                @method('put')
                @csrf
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="p-2 mt-2 w-full rounded-md border border-slate-300"
                    value="{{ old('username', $pasien->user->username) }}">
                @error('username')
                    <div class="mb-5 text-red-600">
                        {{ $message }}
                    </div>
                @enderror

                <label for="password">Password</label>
                <input type="text" name="password" id="password"
                    class="p-2 mt-2  w-full rounded-md border border-slate-300">
                @error('password')
                    <div class="mb-5 text-red-600">
                        {{ $message }}
                    </div>
                @enderror

                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama"
                    class="p-2 mt-2 mb-2 w-full rounded-md border border-slate-300"
                    value="{{ old('nama', $pasien->nama) }}">
                @error('nama')
                    <div class="mb-5 text-red-600">
                        {{ $message }}
                    </div>
                @enderror

                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat"
                    class="p-2 mt-2 mb-2  w-full rounded-md border border-slate-300"
                    value="{{ old('alamat', $pasien->alamat) }}">
                @error('alamat')
                    <div class="mb-5 text-red-600">
                        {{ $message }}
                    </div>
                @enderror

                <label for="no_ktp">No KTP</label>
                <input type="text" name="no_ktp" id="no_ktp"
                    class="p-2 mt-2 mb-2 w-full rounded-md border border-slate-300"
                    value="{{ old('no_ktp', $pasien->no_ktp) }}">
                @error('no_ktp')
                    <div class="mb-5 text-red-600">
                        {{ $message }}
                    </div>
                @enderror

                <label for="no_hp">No HP</label>
                <input type="text" name="no_hp" id="no_hp"
                    class="p-2 mt-2 mb-2 w-full rounded-md border border-slate-300"
                    value="{{ old('no_hp', $pasien->no_hp) }}">
                @error('no_hp')
                    <div class="mb-5 text-red-600">
                        {{ $message }}
                    </div>
                @enderror

                <label for="no_rm">No RM</label>
                <input type="text" name="no_rm" id="no_rm"
                    class="p-2 mt-2 mb-2 w-full rounded-md border border-slate-300"
                    value="{{ old('no_rm', $pasien->no_rm) }}">
                @error('no_rm')
                    <div class="mb-5 text-red-600">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit" class="w-full border p-2 rounded-md bg-green-700 hover:opacity-90 text-white">Tambah
                    Pasien</button>
            </form>
        </div>
    </div>
@endsection
