@extends('dokter.layouts.main')
@section('container')
    <div class="w-full p-10">
        <h2 class="text-xl font-semibold mb-3">Memeriksa Pasien</h2>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 p-2">No Antrian</th>
                        <th class="border border-gray-300 p-2">Nama Pasien</th>
                        <th class="border border-gray-300 p-2">Keluhan</th>
                        <th class="border border-gray-300 p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftarPolis as $daftarPoli)
                        <tr>

                            <td class="border border-gray-300 p-2">{{ $daftarPoli->no_antrian }}</td>
                            <td class="border border-gray-300 p-2">{{ $daftarPoli->pasien->nama }}</td>
                            <td class="border border-gray-300 p-2">{{ $daftarPoli->keluhan }}</td>
                            <td class="border border-gray-300 p-2">
                                <div class="flex justify-center items-center gap-2">
                                    @if ($daftarPoli->periksa)
                                        <!-- Tombol Edit -->
                                        <a href="/dashboard-dokter/memeriksa-pasien/{{ $daftarPoli->periksa->id }}/edit">
                                            <button
                                                class="flex items-center bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                    class="fill-current mr-2"
                                                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path
                                                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                                                </svg>
                                                Edit
                                            </button>
                                        </a>
                                    @else
                                        <!-- Tombol Periksa -->
                                        <a href="/dashboard-dokter/memeriksa-pasien/{{ $daftarPoli->id }}">
                                            <button
                                                class="flex items-center bg-blue-900 text-white px-3 py-1 rounded-md hover:bg-blue-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                    class="fill-current mr-2" viewBox="0 0 512 512">
                                                    <path
                                                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                                                </svg>
                                                Periksa
                                            </button>
                                        </a>
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
