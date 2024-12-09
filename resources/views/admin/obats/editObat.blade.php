@extends('admin.layouts.main')
@section('container')
    <div class="w-full mx-auto">
        <div class="mt-36 max-w-md border shadow-md mx-auto p-7 rounded-md">
            <h1 class="mb-6 text-2xl font-bold text-center ">Edit Obat</h1>

            <form action="/obat/{{ $obat->id }}" method="POST">
                @method('put')
                @csrf
                <div class="mb-2">
                    <label class="font-semibold" for="nama_obat">Nama Obat</label>
                    <input type="text" name="nama_obat" id="nama_obat"
                        class="p-2 w-full rounded-md border border-slate-300"
                        value="{{ old('nama_obat', $obat->nama_obat) }}">
                    @error('nama_obat')
                        <div class="mb-3 text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label class="font-semibold" for="kemasan">Kemasan</label>
                    <input type="text" name="kemasan" id="kemasan"
                        class="p-2 w-full rounded-md border border-slate-300" value="{{ old('kemasan', $obat->kemasan) }}">
                    @error('kemasan')
                        <div class="mb-3 text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-10">
                    <label class="font-semibold" for="harga">Harga</label>
                    <input type="text" name="harga" id="harga"
                        class="p-2 w-full rounded-md border border-slate-300" value="{{ old('harga', $obat->harga) }}">
                    @error('harga')
                        <div class="mb-3 text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="w-full border p-2 rounded-md bg-green-700 hover:opacity-90 text-white">Edit
                    Obat</button>
            </form>
        </div>
    </div>
@endsection
