<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body>
    <div class="w-full mx-auto">
        <div class="mt-20 max-w-md border shadow-md mx-auto p-7 rounded-md">
            <h1 class="mb-6 text-2xl font-bold text-center ">Register Pasien</h1>
            <form action="/register-pasien" method="POST" class="mb-5">
                @csrf

                <div class="mb-2">
                    <label class="font-semibold" for="username">Username</label>
                    <input type="text" name="username" id="username"
                        class="p-2 w-full rounded-md border border-slate-300" value="{{ old('username') }}">
                    @error('username')
                        <div class="mb-3 text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label class="font-semibold" for="password">Password</label>
                    <input type="password" name="password" id="password"
                        class="p-2  w-full rounded-md border border-slate-300">
                    @error('password')
                        <div class="mb-3 text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label class="font-semibold" for="nama">Nama</label>
                    <input type="text" name="nama" id="nama"
                        class="p-2 w-full rounded-md border border-slate-300" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="mb-3 text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label class="font-semibold" for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat"
                        class="p-2  w-full rounded-md border border-slate-300" value="{{ old('alamat') }}">
                    @error('alamat')
                        <div class="mb-3 text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label class="font-semibold" for="no_ktp">No KTP</label>
                    <input type="text" name="no_ktp" id="no_ktp"
                        class="p-2 w-full rounded-md border border-slate-300" value="{{ old('no_ktp') }}">
                    @error('no_ktp')
                        <div class="mb-3 text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-10">
                    <label class="font-semibold" for="no_hp">No HP</label>
                    <input type="text" name="no_hp" id="no_hp"
                        class="p-2 w-full rounded-md border border-slate-300" value="{{ old('no_hp') }}">
                    @error('no_hp')
                        <div class="mb-3 text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full border p-2 rounded-md bg-slate-700 hover:opacity-90 text-white">Register
                </button>
            </form>
            <p class="text-center font-light">
                Sudah punya akun?
                <a href="/login-pasien" class="hover:text-blue-600">
                    Login
                </a>
            </p>
        </div>
    </div>
</body>

</html>
