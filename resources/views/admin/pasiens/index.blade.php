@extends('admin.layouts.main')
@section('container')
    <div class="w-full p-10">
        <h2 class="text-xl font-semibold mb-3">Mengelola Pasien</h2>
        <a href="/pasien">
            <button class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 mb-3">
                Tambah Pasien
            </button>
        </a>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 p-2">ID</th>
                        <th class="border border-gray-300 p-2">Nama</th>
                        <th class="border border-gray-300 p-2">Alamat</th>
                        <th class="border border-gray-300 p-2">No KTP</th>
                        <th class="border border-gray-300 p-2">No HP</th>
                        <th class="border border-gray-300 p-2">No RM</th>
                        <th class="border border-gray-300 p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasiens as $pasien)
                        <tr>

                            <td class="border border-gray-300 p-2">{{ $pasien->id }}</td>
                            <td class="border border-gray-300 p-2">{{ $pasien->nama }}</td>
                            <td class="border border-gray-300 p-2">{{ $pasien->alamat }}</td>
                            <td class="border border-gray-300 p-2">{{ $pasien->no_ktp }}</td>
                            <td class="border border-gray-300 p-2">{{ $pasien->no_hp }}</td>
                            <td class="border border-gray-300 p-2">{{ $pasien->no_rm }}</td>
                            <td class="border border-gray-300 p-2">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="/pasien/{{ $pasien->id }}/edit">
                                        <button
                                            class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">Edit</button>
                                    </a>
                                    <form action="/pasien/{{ $pasien->id }}" method="POST">
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
