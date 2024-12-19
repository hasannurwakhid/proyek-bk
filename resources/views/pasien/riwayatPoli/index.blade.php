@extends('pasien.layouts.main')
@section('container')
    <div class="w-full p-10">
        <h2 class="text-xl font-semibold mb-3">Riwayat Daftar Poli</h2>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 p-2">No</th>
                        <th class="border border-gray-300 p-2">Poli</th>
                        <th class="border border-gray-300 p-2">Dokter</th>
                        <th class="border border-gray-300 p-2">Hari</th>
                        <th class="border border-gray-300 p-2">Mulai</th>
                        <th class="border border-gray-300 p-2">Selesai</th>
                        <th class="border border-gray-300 p-2">Antrian</th>
                        <th class="border border-gray-300 p-2">Status</th>
                        <th class="border border-gray-300 p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftarPolis as $index => $daftarPoli)
                        <tr>
                            <td class="border border-gray-300 p-2 text-center">{{ $index + 1 }}</td>
                            <td class="border border-gray-300 p-2 text-center">
                                {{ $daftarPoli?->jadwalPeriksa?->dokter?->poli?->nama_poli }}
                            </td>
                            <td class="border border-gray-300 p-2 text-center">
                                {{ $daftarPoli?->jadwalPeriksa?->dokter?->nama }}</td>
                            <td class="border border-gray-300 p-2 text-center">{{ $daftarPoli?->jadwalPeriksa?->hari }}</td>
                            <td class="border border-gray-300 p-2 text-center">{{ $daftarPoli->jadwalPeriksa?->jam_mulai }}
                            </td>
                            <td class="border border-gray-300 p-2 text-center">{{ $daftarPoli?->jadwalPeriksa?->jam_selesai }}
                            </td>
                            <td class="border border-gray-300 p-2 text-center">{{ $daftarPoli?->no_antrian }}</td>
                            <td class="border border-gray-300 p-2 flex justify-center items-center">
                                @if ($daftarPoli->periksa)
                                    <div class="text-center rounded-md p-1 w-1/2 text-white bg-green-700">
                                        Sudah Diperiksa
                                    </div>
                                @else
                                    <div class="text-center rounded-md p-1 w-1/2 text-white bg-yellow-500">
                                        Belum Diperiksa
                                    </div>
                                @endif
                            </td>
                            <td class="border border-gray-300 p-2">
                                <div class="flex justify-center items-center gap-2">
                                    @if ($daftarPoli?->periksa)
                                        <!-- Tombol Edit -->
                                        <a href="/dashboard-pasien/riwayat-poli/{{ $daftarPoli?->id }}">
                                            <button
                                                class="flex items-center bg-green-700 text-white px-3 py-1 rounded-md hover:bg-green-900">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                    class="fill-current mr-2"
                                                    viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path
                                                        d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                                </svg>
                                                Lihat Detail
                                            </button>
                                        </a>
                                    @else
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
