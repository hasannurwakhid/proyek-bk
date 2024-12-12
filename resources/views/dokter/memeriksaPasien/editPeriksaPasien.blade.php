@extends('dokter.layouts.main')
@section('container')
    <div class="container mx-auto px-4 my-3">
        <div class="w-full border shadow-md p-7 rounded-md bg-white">
            <h1 class="mb-6 text-2xl font-bold text-gray-800">Update Periksa Pasien</h1>
            <form action="/dashboard-dokter/memeriksa-pasien/{{ $periksa->id }}/edit" method="POST">
                @method('put')
                @csrf
                <!-- Nama Pasien -->
                <div class="mb-4">
                    <label class="font-semibold text-gray-700" for="nama_pasien">Nama Pasien</label>
                    <input type="text" name="nama_pasien" id="nama_pasien"
                        class="p-2 w-full rounded-md border border-gray-300 bg-gray-100" disabled
                        value="{{ $periksa->daftarPoli->pasien->nama }}">
                </div>

                <!-- Tanggal Periksa -->
                <div class="mb-4">
                    <label class="font-semibold text-gray-700" for="tgl_periksa">Tanggal Periksa</label>
                    <input type="date" name="tgl_periksa" id="tgl_periksa"
                        class="p-2 w-full rounded-md border border-gray-300" value="{{ $periksa->tgl_periksa }}">
                    @error('tgl_periksa')
                        <div class="mt-2 text-red-600 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Catatan -->
                <div class="mb-4">
                    <label class="font-semibold text-gray-700" for="catatan">Catatan</label>
                    <textarea name="catatan" id="catatan" rows="3" class="p-3 w-full rounded-md border border-gray-300">{{ $periksa->catatan }}</textarea>
                    @error('catatan')
                        <div class="mt-2 text-red-600 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Obat -->
                @foreach ($detailPeriksas as $detailPeriksa)
                    <div id="obat-container" class="mb-6">
                        <div class="mb-4 flex gap-4 obat-row">
                            <div class="flex-1">
                                <label class="font-semibold text-gray-700" for="id_obat">Obat</label>
                                <select name="id_obat[]" class="p-2 w-full rounded-md border border-gray-300"
                                    onchange="updateTotal()">
                                    <option value="" data-harga="0">--Pilih Obat--</option>
                                    @foreach ($obats as $obat)
                                        <option value="{{ $obat->id }}" data-harga="{{ $obat->harga }}"
                                            {{ $obat->id == $detailPeriksa->id_obat ? 'selected' : '' }}>
                                            {{ $obat->nama_obat }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="button"
                                class="remove-obat bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md self-end">
                                Hapus
                            </button>
                        </div>
                    </div>
                @endforeach

                <button type="button" id="add-obat"
                    class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md mb-6">
                    Tambah Obat
                </button>

                <!-- Biaya Periksa -->
                <div class="mb-6">
                    <label class="font-semibold text-gray-700" for="biaya_periksa">Biaya Periksa</label>
                    <input type="text" id="biaya_periksa" name="biaya_periksa"
                        class="p-2 w-full rounded-md border border-gray-300 bg-gray-100" readonly
                        value="{{ $periksa->biaya_periksa }}">
                </div>

                <button type="submit" class="w-full bg-slate-700 hover:opacity-90 text-white px-4 py-2 rounded-md">
                    Simpan
                </button>
            </form>
        </div>
    </div>

    <script>
        function updateTotal() {
            const obatRows = document.querySelectorAll('.obat-row select');
            let totalHargaObat = 0;


            obatRows.forEach(row => {
                const hargaObat = row.options[row.selectedIndex].dataset.harga || 0;
                totalHargaObat += parseInt(hargaObat);
            });


            const totalBiayaPeriksa = totalHargaObat + 150000;


            document.getElementById('biaya_periksa').value = totalBiayaPeriksa;
        }


        document.getElementById('add-obat').addEventListener('click', function() {
            const container = document.getElementById('obat-container');

            const newRow = document.createElement('div');
            newRow.classList.add('mb-4', 'flex', 'gap-4', 'obat-row');

            newRow.innerHTML = `
                <div class="flex-1">
                    <label class="font-semibold text-gray-700" for="id_obat">Obat</label>
                    <select name="id_obat[]" class="p-2 w-full rounded-md border border-gray-300" onchange="updateTotal()">
                        <option value="" data-harga="0">--Pilih Obat--</option>
                        @foreach ($obats as $obat)
                            <option value="{{ $obat->id }}" data-harga="{{ $obat->harga }}">{{ $obat->nama_obat }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="button" class="remove-obat bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md self-end">
                    Hapus
                </button>
            `;

            container.appendChild(newRow);


            newRow.querySelector('.remove-obat').addEventListener('click', function() {
                newRow.remove();
                updateTotal();
            });
        });


        document.addEventListener('DOMContentLoaded', function() {
            const removeButtons = document.querySelectorAll('.remove-obat');
            removeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = button.closest('.obat-row');
                    row.remove();
                    updateTotal();
                });
            });
        });
    </script>
@endsection
