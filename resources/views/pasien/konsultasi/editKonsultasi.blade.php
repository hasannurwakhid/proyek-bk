@extends('pasien.layouts.main')
@section('container')
    <div class="w-full p-5">
        <div class="max-w-md border shadow-md mx-auto my-10 p-7 rounded-md">
            <form action="/konsultasi/{{ $konsultasi->id }}" method="POST">
                @csrf
                @method('put')
                <div class="mb-2">
                    <label class="font-semibold" for="subject">Subject</label>
                    <input name="subject" value="{{ $konsultasi->subject }}" id="subject" cols="30" rows="10"
                        class="p-2 w-full rounded-md border border-slate-300">{{ old('subject') }}</input>
                    @error('subject')
                        <div class="mb-5 text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-10">
                    <label class="font-semibold" for="pertanyaan">Pertanyaan</label>
                    <textarea name="pertanyaan" id="pertanyaan" cols="30" rows="10"
                        class="p-2 w-full rounded-md border border-slate-300">{{ $konsultasi->pertanyaan }}</textarea>
                    @error('pertanyaan')
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
