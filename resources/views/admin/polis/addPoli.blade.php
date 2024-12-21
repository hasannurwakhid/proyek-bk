@extends('admin.layouts.main')
@section('container')
    <div class="w-full p-5">
        <div class="my-10 max-w-md shadow-md mx-auto p-7 rounded-md">
            <h1 class="mb-6 text-2xl font-bold text-center ">Tambah Poli</h1>
            <form action="/poli" method="POST">
                @csrf

                <div class="mb-2">
                    <label for="nama_poli" class="font-bold">Nama Poli</label>
                    <input type="text" name="nama_poli" id="nama_poli" class="p-2 w-full rounded-md border border-slate-300"
                        value="{{ old('nama_poli') }}">
                    @error('nama_poli')
                        <div class="mb-3 text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-10">
                    <label for="keterangan" class="font-bold">keterangan</label>
                    <input type="text" name="keterangan" id="keterangan"
                        class="p-2 w-full rounded-md border border-slate-300" value="{{ old('keterangan') }}">
                    @error('keterangan')
                        <div class="mb-3 text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="w-full border p-2 rounded-md bg-green-700 hover:opacity-90 text-white">Tambah
                </button>
            </form>
        </div>
    </div>
@endsection
