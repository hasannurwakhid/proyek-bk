@extends('admin.layouts.main')

@section('container')
    <div class="w-full p-10">
        <h2 class="text-xl font-semibold mb-3">Mengelola Dokter</h2>
        <a href="/dokter">
            <button class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 mb-3">
                Tambah Dokter
            </button>
        </a>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 p-2">ID</th>
                        <th class="border border-gray-300 p-2">Nama</th>
                        <th class="border border-gray-300 p-2">Alamat</th>
                        <th class="border border-gray-300 p-2">No HP</th>
                        <th class="border border-gray-300 p-2">Poli</th>
                        <th class="border border-gray-300 p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dokters as $dokter)
                        <tr>
                            <td class="border border-gray-300 p-2">{{ $dokter->id }}</td>
                            <td class="border border-gray-300 p-2">{{ $dokter->nama }}</td>
                            <td class="border border-gray-300 p-2">{{ $dokter->alamat }}</td>
                            <td class="border border-gray-300 p-2">{{ $dokter->no_hp }}</td>
                            <td class="border border-gray-300 p-2">{{ $dokter->poli->nama_poli }}</td>
                            <td class="border border-gray-300 p-2 text-center">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="/dokter/{{ $dokter->id }}/edit">
                                        <button class=" bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">
                                            Edit
                                        </button>
                                    </a>
                                    <form action="/dokter/{{ $dokter->id }}" method="POST" >
                                        @method('delete')
                                        @csrf
                                        <button type="submit"
                                            class=" bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600">
                                            Hapus
                                        </button>
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
