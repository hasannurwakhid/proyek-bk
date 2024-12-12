@extends('dokter.layouts.main')
@section('container')
    <div class="container mx-auto px-4 my-3">
        <div class="w-full border shadow-md p-7 rounded-md bg-white">
            <h1 class="mb-6 text-2xl font-bold text-gray-800">Periksa Pasien</h1>
            <form action="/dashboard-dokter/memeriksa-pasien/{{ $daftarPoli->id }}" method="POST">
                @csrf
                <!-- Nama Pasien -->
                <div class="mb-4">
                    <label class="font-semibold text-gray-700" for="nama_pasien">Nama Pasien</label>
                    <input type="text" name="nama_pasien" id="nama_pasien"
                        class="p-2 w-full rounded-md border border-gray-300 bg-gray-100" disabled
                        value="{{ $daftarPoli->pasien->nama }}">
                </div>

                <!-- Tanggal Periksa -->
                <div class="mb-4">
                    <label class="font-semibold text-gray-700" for="tgl_periksa">Tanggal Periksa</label>
                    <input type="date" name="tgl_periksa" id="tgl_periksa"
                        class="p-2 w-full rounded-md border border-gray-300 focus:ring focus:ring-green-200">
                    @error('tgl_periksa')
                        <div class="mt-2 text-red-600 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Catatan -->
                <div class="mb-4">
                    <label class="font-semibold text-gray-700" for="catatan">Catatan</label>
                    <textarea name="catatan" id="catatan" rows="3" class="p-3 w-full rounded-md border border-gray-300"></textarea>
                    @error('catatan')
                        <div class="mt-2 text-red-600 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Obat -->
                <div id="obat-container" class="mb-6">
                    <div class="mb-4 flex gap-4 obat-row">
                        <div class="flex-1">
                            <label class="font-semibold text-gray-700" for="id_obat">Obat</label>
                            <select name="id_obat[]"
                                class="p-2 w-full rounded-md border border-gray-300 focus:ring focus:ring-green-200"
                                onchange="updateTotal()">
                                <option value="" data-harga="0">--Pilih Obat--</option>
                                @foreach ($obats as $obat)
                                    <option value="{{ $obat->id }}" data-harga="{{ $obat->harga }}">
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

                <button type="button" id="add-obat"
                    class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md mb-6">
                    Tambah Obat
                </button>

                <!-- Biaya Periksa -->
                <div class="mb-6">
                    <label class="font-semibold text-gray-700" for="biaya_periksa">Biaya Periksa</label>
                    <input type="text" id="biaya_periksa" name="biaya_periksa"
                        class="p-2 w-full rounded-md border border-gray-300 bg-gray-100" readonly value="150000">
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

            // Hitung total harga obat
            obatRows.forEach(row => {
                const hargaObat = row.options[row.selectedIndex].dataset.harga || 0;
                totalHargaObat += parseInt(hargaObat);
            });

            // Tambahkan biaya periksa dasar (150000)
            const totalBiayaPeriksa = totalHargaObat + 150000;

            // Update input biaya periksa
            document.getElementById('biaya_periksa').value = totalBiayaPeriksa;
        }

        // Tambah baris obat
        document.getElementById('add-obat').addEventListener('click', function() {
            const container = document.getElementById('obat-container');

            const newRow = document.createElement('div');
            newRow.classList.add('mb-4', 'flex', 'gap-4', 'obat-row');

            newRow.innerHTML = `
                <div class="flex-1">
                    <label class="font-semibold text-gray-700" for="id_obat">Obat</label>
                    <select name="id_obat[]" class="p-2 w-full rounded-md border border-gray-300 focus:ring focus:ring-green-200" onchange="updateTotal()">
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

            // Tambahkan event listener untuk tombol hapus
            newRow.querySelector('.remove-obat').addEventListener('click', function() {
                newRow.remove();
                updateTotal();
            });
        });
    </script>
@endsection
