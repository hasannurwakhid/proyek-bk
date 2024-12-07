@extends('admin.layouts.main')
@section('container')
    <div class="w-full mx-auto">
        <div class="mt-36 max-w-md shadow-md mx-auto p-7 rounded-md">
            <form action="/poli" method="POST">
                @csrf
                <label for="nama_poli">Nama Poli</label>
                <input type="text" name="nama_poli" id="nama_poli"
                    class="p-2 mt-2 mb-5 w-full rounded-md border border-slate-300">

                <label for="keterangan">keterangan</label>
                <input type="text" name="keterangan" id="keterangan"
                    class="p-2 mt-2 mb-5 w-full rounded-md border border-slate-300">

                <button type="submit" class="w-full border p-2 rounded-md bg-green-700 hover:opacity-90 text-white">Tambah
                    Poli</button>
            </form>
        </div>
    </div>
@endsection
