@extends('admin.layouts.main')
@section('container')
    <div class="w-full p-10">
        <h2 class="text-xl font-semibold mb-3">Mengelola Obat</h2>
        <a href="/obat">
            <button class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 mb-3">
                Tambah Obat
            </button>
        </a>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 p-2">ID</th>
                        <th class="border border-gray-300 p-2">Nama Obat</th>
                        <th class="border border-gray-300 p-2">Kemasan</th>
                        <th class="border border-gray-300 p-2">Harga</th>
                        <th class="border border-gray-300 p-2">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($obats as $obat)
                        <tr>
                            <td class="border border-gray-300 p-2">{{ $obat->id }}</td>
                            <td class="border border-gray-300 p-2">{{ $obat->nama_obat }}</td>
                            <td class="border border-gray-300 p-2">{{ $obat->kemasan }}</td>
                            <td class="border border-gray-300 p-2">
                                {{ $obat->harga }}
                            </td>
                            <td class="border border-gray-300 p-2">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="/obat/{{ $obat->id }}/edit">
                                        <button
                                            class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">Edit</button>
                                    </a>
                                    <form action="/obat/{{ $obat->id }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit"
                                            class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600">Hapus</button>

                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
