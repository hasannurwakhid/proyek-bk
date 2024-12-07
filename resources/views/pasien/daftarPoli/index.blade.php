@extends('pasien.layouts.main')
@section('container')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const poliElement = document.getElementById('poli');
            const jadwalSelect = document.getElementById('id_jadwal');

            poliElement.addEventListener('change', function() {
                console.log("halo");
                const poliId = this.value;

                // Clear previous options
                jadwalSelect.innerHTML = '<option value="">-- Pilih Jadwal Dokter --</option>';

                if (poliId) {
                    fetch(`/getJadwalDokter/${poliId}`)
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(jadwal => {
                                const option = document.createElement('option');
                                option.value = jadwal.id;
                                option.textContent =
                                    `${jadwal.hari}, ${jadwal.jam_mulai} - ${jadwal.jam_selesai}`;
                                jadwalSelect.appendChild(option);
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching jadwal:', error);
                        });
                }
            });
        });
    </script>
    <div class="w-full mx-auto">
        <div class="max-w-md shadow-md mx-auto p-7 rounded-md">
            <form action="#" method="POST">
                @method('put')
                @csrf
                <label for="no_rm">No Rekam Medis</label>
                <input disabled type="text" name="no_rm" id="no_rm"
                    class="p-2 mt-2 mb-3 w-full rounded-md border border-slate-300"
                    value="{{ old('no_rm', auth()->user()->pasien->no_rm) }}">
                @error('no_rm')
                    <div class="mb-5 text-red-600">
                        {{ $message }}
                    </div>
                @enderror

                <label for="poli" class="form-label">Poli</label>
                <select name="poli" id="poli" class="p-2 mt-2 mb-5 w-full rounded-md border border-slate-300">
                    <option value="">-- Pilih Terlebih Dahulu --</option>
                    @foreach ($polis as $poli)
                        <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                    @endforeach
                </select>
                @error('poli')
                    <div class="mb-5 text-red-600">
                        {{ $message }}
                    </div>
                @enderror

                <label for="id_jadwal">Jadwal Dokter</label>
                <select name="id_jadwal" id="id_jadwal" class="p-2 mt-2 mb-5 w-full rounded-md border border-slate-300">
                    <option value="">-- Pilih Jadwal Dokter --</option>
                </select>

                <label for="keluhan">Keluhan</label>
                <textarea name="keluhan" id="" cols="30" rows="10"
                    class="p-2 mt-2 mb-3 w-full rounded-md border border-slate-300" value="{{ old('keluhan') }}">

                </textarea>
                @error('keluhan')
                    <div class="mb-5 text-red-600">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit"
                    class="w-full border p-2 rounded-md bg-green-700 hover:opacity-90 text-white">Daftar</button>
            </form>
        </div>
    </div>
@endsection
