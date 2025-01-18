@extends('dokter.layouts.main')
@section('container')
    <div class="w-full p-5">
        <div class="max-w-md border shadow-md mx-auto my-10 p-7 rounded-md">
            <form action="/dashboard-dokter/konsultasi/{{ $konsultasi->id }}}" method="POST">
                @csrf
                @method('put')
                <div class="mb-10">
                    <label class="font-semibold" for="jawaban">Jawaban</label>
                    <textarea name="jawaban" id="jawaban" cols="30" rows="10"
                        class="p-2 w-full rounded-md border border-slate-300">{{ $konsultasi->jawaban }}</textarea>
                    @error('jawaban')
                        <div class="mb-5 text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full border p-2 rounded-md bg-green-700 hover:opacity-90 text-white">Simpan</button>
            </form>
        </div>
    </div>
@endsection
