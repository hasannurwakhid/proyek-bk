@extends('dokter.layouts.main')
@section('container')
    <div class="my-6 p-8 mx-auto max-w-3xl md:w-1/2 bg-white rounded-lg shadow-lg">
        <h1 class="font-bold text-3xl mb-6 text-gray-700 border-b pb-4">Detail Riwayat Pasien</h1>

        <div class="mb-6">
            <h3 class="font-semibold text-lg text-gray-600">Nama Pasien:</h3>
            <p class="text-gray-800 text-lg">{{ $riwayatPasien->daftarPoli->pasien->nama }}</p>
        </div>

        <div class="mb-6">
            <h3 class="font-semibold text-lg text-gray-600">Tanggal Periksa:</h3>
            <p class="text-gray-800 text-lg">{{ $riwayatPasien->tgl_periksa }}</p>
        </div>

        <div class="mb-6">
            <h3 class="font-semibold text-lg text-gray-600">Keluhan:</h3>
            <p class="text-gray-800 text-lg">{{ $riwayatPasien->daftarPoli->keluhan }}</p>
        </div>

        <div class="mb-6">
            <h3 class="font-semibold text-lg text-gray-600">Catatan Dokter:</h3>
            <p class="text-gray-800 text-lg">{{ $riwayatPasien->catatan }}</p>
        </div>

        <div class="mb-6">
            <h3 class="font-semibold text-lg text-gray-600">Obat yang Diberikan:</h3>
            <ul class="list-disc ml-6">
                @foreach ($riwayatPasien->detailPeriksa as $index => $detail)
                    <li class="text-gray-800 text-lg">
                        <span class="font-medium">{{ $detail->obat->nama_obat }}</span>
                        ({{ $detail->obat->kemasan }})
                        -
                        <span class="text-green-700 font-bold">Rp
                            {{ number_format($detail->obat->harga, 0, ',', '.') }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="mt-8">
            <h3 class="font-semibold text-lg text-gray-600">Total Biaya Periksa:</h3>
            <div class="text-center text-4xl font-bold bg-red-600 text-white py-3 rounded-md shadow-md">
                Rp {{ number_format($riwayatPasien->biaya_periksa, 0, ',', '.') }}
            </div>
        </div>
    </div>
@endsection
