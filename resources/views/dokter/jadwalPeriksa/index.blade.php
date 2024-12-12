@extends('dokter.layouts.main')
@section('container')
    <div class="w-full p-10">
        <h2 class="text-xl font-semibold mb-3">Jadwal Periksa</h2>
        <a href="/dashboard-dokter/jadwal-periksa/tambah">
            <button class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 mb-3 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" class="fill-current"
                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                </svg>
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
                                        <button
                                            class="flex items-center bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" class="fill-current mr-2"
                                                viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                <path
                                                    d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                                            </svg>
                                            Edit
                                        </button>
                                    </a>
                                    <form action="/dashboard-dokter/jadwal-periksa/{{ $jadwalPeriksa->id }}/hapus"
                                        method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit"
                                            class="flex items-center bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" class="fill-current mr-2"
                                                viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                <path
                                                    d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                            </svg>
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
