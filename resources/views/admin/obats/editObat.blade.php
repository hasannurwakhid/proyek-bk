@extends('admin.layouts.main')
@section('container')
    <div class="w-full mx-auto">
        <div class="mt-36 max-w-md shadow-md mx-auto p-7 rounded-md">
            <form action="/obat/{{ $obat->id }}" method="POST">
                @method('put')
                @csrf
                <label for="nama_obat">Nama Obat</label>
                <input type="text" name="nama_obat" id="nama_obat"
                    class="p-2 mt-2 mb-5 w-full rounded-md border border-slate-300"
                    value="{{ old('nama_obat', $obat->nama_obat) }}">

                <label for="kemasan">Kemasan</label>
                <input type="text" name="kemasan" id="kemasan"
                    class="p-2 mt-2 mb-5 w-full rounded-md border border-slate-300"
                    value="{{ old('kemasan', $obat->kemasan) }}">

                <label for="harga">Harga</label>
                <input type="text" name="harga" id="harga"
                    class="p-2 mt-2 mb-5 w-full rounded-md border border-slate-300"
                    value="{{ old('harga', $obat->harga) }}">

                <button type="submit" class="w-full border p-2 rounded-md bg-green-700 hover:opacity-90 text-white">Edit
                    Obat</button>
            </form>
        </div>
    </div>
@endsection
