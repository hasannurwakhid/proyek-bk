@extends('dokter.layouts.main')
@section('container')
    <div class="w-full p-10">
        <h2 class="text-xl font-semibold mb-3">Jadwal Periksa</h2>
        <a href="/dashboard-dokter/jadwal-periksa/tambah">
            <button class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 mb-3">
                Tambah Jadwal
            </button>
        </a>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 p-2">ID</th>
                        <th class="border border-gray-300 p-2">ID Dokter</th>
                        <th class="border border-gray-300 p-2">Hari</th>
                        <th class="border border-gray-300 p-2">Jam Mulai</th>
                        <th class="border border-gray-300 p-2">Jam Selesai</th>
                        <th class="border border-gray-300 p-2">Status</th>
                        <th class="border border-gray-300 p-2">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwalPeriksas as $jadwalPeriksa)
                        <tr>
                            <td class="border border-gray-300 p-2">{{ $jadwalPeriksa->id }}</td>
                            <td class="border border-gray-300 p-2">{{ $jadwalPeriksa->id_dokter }}</td>
                            <td class="border border-gray-300 p-2">{{ $jadwalPeriksa->hari }}</td>
                            <td class="border border-gray-300 p-2">{{ $jadwalPeriksa->jam_mulai }}</td>
                            <td class="border border-gray-300 p-2">{{ $jadwalPeriksa->jam_selesai }}</td>
                            <td class="border border-gray-300 p-2">{{ $jadwalPeriksa->isAktif ? 'Aktif' : 'Tidak Aktif' }}
                            </td>
                            <td class="border border-gray-300 p-2 text-center">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="/dashboard-dokter/jadwal-periksa/{{ $jadwalPeriksa->id }}/edit">
                                        <button class=" bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">
                                            Edit
                                        </button>
                                    </a>
                                    <form action="/dashboard-dokter/jadwal-periksa/{{ $jadwalPeriksa->id }}/hapus"
                                        method="POST">
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
