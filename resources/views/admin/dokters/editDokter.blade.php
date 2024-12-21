@extends('admin.layouts.main')
@section('container')
    <div class="w-full p-5">
        <div class="my-10 border max-w-md shadow-md mx-auto p-7 rounded-md">
            <h1 class="mb-6 text-2xl font-bold text-center ">Edit Dokter</h1>
            <form action="/dokter/{{ $dokter?->id }}" method="POST">
                @method('put')
                @csrf
                <div class="mb-2">
                    <label class="font-semibold" for="username">Username</label>
                    <input type="text" name="username" id="username" class="p-2 w-full rounded-md border border-slate-300"
                        value="{{ old('username', $dokter?->user?->username) }}">
                    @error('username')
                        <div class="mb-3 text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label class="font-semibold" for="password">Password</label>
                    <input type="password" name="password" id="password"
                        class="p-2  w-full rounded-md border border-slate-300">
                    @error('password')
                        <div class="mb-3 text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label class="font-semibold" for="nama">Nama</label>
                    <input type="text" name="nama" id="nama"
                        class="p-2 w-full rounded-md border border-slate-300" value="{{ old('nama', $dokter?->nama) }}">
                    @error('nama')
                        <div class="mb-3 text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label class="font-semibold" for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat"
                        class="p-2 w-full rounded-md border border-slate-300"
                        value="{{ old('username', $dokter?->alamat) }}">
                    @error('alamat')
                        <div class="mb-3 text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label class="font-semibold" for="no_hp">No HP</label>
                    <input type="text" name="no_hp" id="no_hp"
                        class="p-2 w-full rounded-md border border-slate-300"
                        value="{{ old('username', $dokter?->no_hp) }}">
                    @error('no_hp')
                        <div class="mb-3 text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-10">
                    <label for="id_poli" class="form-label font-semibold">Poli</label>
                    <select name="id_poli" class="p-2 w-full rounded-md border border-slate-300">
                        @foreach ($polis as $poli)
                            @if (old('id_poli', $dokter?->id_poli) == $poli?->id)
                                <option value="{{ $poli?->id }}" selected>{{ $poli?->nama_poli }}</option>
                            @else
                                <option value="{{ $poli?->id }}">{{ $poli?->nama_poli }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('id_poli')
                        <div class="mb-3 text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="w-full border p-2 rounded-md bg-green-700 hover:opacity-90 text-white">Edit
                    Dokter</button>
            </form>
        </div>
    </div>
@endsection
