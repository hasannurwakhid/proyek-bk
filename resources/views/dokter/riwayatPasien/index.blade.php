@extends('dokter.layouts.main')
@section('container')
    <div class="w-full p-10">
        <h2 class="text-xl font-semibold mb-3">Riwayat Pasien</h2>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 p-2">No </th>
                        <th class="border border-gray-300 p-2">Nama Pasien</th>
                        <th class="border border-gray-300 p-2">Tanggal Periksa</th>
                        <th class="border border-gray-300 p-2">Keluhan</th>
                        <th class="border border-gray-300 p-2">Catatan</th>
                        <th class="border border-gray-300 p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($riwayatPasien as $index => $riwayat)
                        <tr>
                            <td class="border border-gray-300 p-2">{{ $index + 1 }}</td>
                            <td class="border border-gray-300 p-2">{{ $riwayat->daftarPoli->pasien->nama }}</td>
                            <td class="border border-gray-300 p-2">{{ $riwayat->tgl_periksa }}</td>
                            <td class="border border-gray-300 p-2">{{ $riwayat->daftarPoli->keluhan }}</td>
                            <td class="border border-gray-300 p-2">{{ $riwayat->catatan }}</td>
                            <td class="border border-gray-300 p-2">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="/dashboard-dokter/riwayat-pasien/{{ $riwayat->id }}">
                                        <button
                                            class="flex items-center bg-blue-900 text-white px-3 py-1 rounded-md hover:bg-blue-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" class="fill-current mr-2"
                                                viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                <path
                                                    d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                            </svg>
                                            Detail
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data riwayat pasien.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
