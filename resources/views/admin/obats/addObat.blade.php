@extends('admin.layouts.main')
@section('container')
    <div class="w-full mx-auto">
        <div class="mt-36 max-w-md shadow-md mx-auto p-7 rounded-md">
            <form action="/obat" method="POST">
                @csrf
                <label for="nama_obat">Nama Obat</label>
                <input type="text" name="nama_obat" id="nama_obat"
                    class="p-2 mt-2 mb-5 w-full rounded-md border border-slate-300">

                <label for="kemasan">Kemasan</label>
                <input type="text" name="kemasan" id="kemasan"
                    class="p-2 mt-2 mb-5 w-full rounded-md border border-slate-300">

                <label for="harga">Harga</label>
                <input type="text" name="harga" id="harga"
                    class="p-2 mt-2 mb-5 w-full rounded-md border border-slate-300">

                <button type="submit" class="w-full border p-2 rounded-md bg-green-700 hover:opacity-90 text-white">Tambah
                    Obat</button>
            </form>
        </div>
    </div>
@endsection
