<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Selamat Datang di HNW's Care</title>
</head>

<body class="bg-gray-50 text-gray-800">
    <!-- Header -->
    <header class="bg-slate-900 text-white py-5 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">HNW's Care</h1>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="#tentang" class="hover:underline">Tentang</a></li>
                    <li><a href="#layanan" class="hover:underline">Layanan</a></li>
                    <li><a href="#kontak" class="hover:underline">Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-slate-900 text-white py-20">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-5">Selamat Datang di HNW's Care</h2>
            <p class="mb-8 text-lg">Kelola interaksi dokter dan pasien dengan sistem yang terintegrasi dan mudah.</p>
            <a href="#login" class="bg-green-500 text-white px-6 py-3 rounded-md text-lg shadow-md hover:bg-green-600">
                Mulai Sekarang
            </a>
        </div>
    </section>

    <!-- Login Options -->
    <section id="login" class="container mx-auto my-20">
        <h2 class="text-center text-3xl font-bold mb-10">Pilihan Login</h2>
        <div class="flex justify-center flex-wrap gap-2">
            <a href="/login-dokter">
                <div
                    class="text-center  m-10 min-w-52 max-w-96 border p-10 rounded-md bg-white hover:scale-110 transition duration-500 ease-in-out shadow-md flex flex-col justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" class="fill-slate-800 mb-5"
                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-96 55.2C54 332.9 0 401.3 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7c0-81-54-149.4-128-171.1l0 50.8c27.6 7.1 48 32.2 48 62l0 40c0 8.8-7.2 16-16 16l-16 0c-8.8 0-16-7.2-16-16s7.2-16 16-16l0-24c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 24c8.8 0 16 7.2 16 16s-7.2 16-16 16l-16 0c-8.8 0-16-7.2-16-16l0-40c0-29.8 20.4-54.9 48-62l0-57.1c-6-.6-12.1-.9-18.3-.9l-91.4 0c-6.2 0-12.3 .3-18.3 .9l0 65.4c23.1 6.9 40 28.3 40 53.7c0 30.9-25.1 56-56 56s-56-25.1-56-56c0-25.4 16.9-46.8 40-53.7l0-59.1zM144 448a24 24 0 1 0 0-48 24 24 0 1 0 0 48z" />
                    </svg>
                    <h1 class="font-semibold text-2xl mb-5">Login Dokter</h1>
                    <p>Apabila Anda adalah seorang Dokter, silahkan Login terlebih dahulu untuk memulai melayani Pasien!
                    </p>
                </div>
            </a>
            <a href="/login-pasien">
                <div
                    class="text-center m-10 min-w-52 max-w-96 border p-10 rounded-md bg-white hover:scale-110 transition duration-500 ease-in-out shadow-md flex flex-col justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" class="fill-slate-800 mb-5"
                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                    </svg>
                    <h1 class="font-semibold text-2xl mb-5">Login Pasien</h1>
                    <p>Apabila Anda adalah seorang Pasien, silahkan Registrasi terlebih dahulu untuk melakukan
                        pendaftaran sebagai Pasien!</p>
                </div>
            </a>
        </div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="py-20 px-20 bg-gray-100">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-5">Tentang Kami</h2>
            <p class="max-w-2xl mx-auto">Kami bertujuan untuk menyediakan koneksi yang mulus antara dokter dan pasien.
                Dengan fitur penjadwalan dan pengelolaan data yang canggih, kami membantu tenaga kesehatan untuk fokus
                pada kesehatan pasien.</p>
        </div>
    </section>

    <!-- Services Section -->
    <section id="layanan" class="py-20">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-10">Layanan Kami</h2>
            <div class="flex flex-wrap justify-center gap-10">
                <div class="bg-white shadow-md p-5 rounded-md max-w-xs">
                    <h3 class="text-xl font-bold mb-3">Penjadwalan Dokter</h3>
                    <p>Mengelola jadwal dokter dengan mudah dan efisien.</p>
                </div>
                <div class="bg-white shadow-md p-5 rounded-md max-w-xs">
                    <h3 class="text-xl font-bold mb-3">Manajemen Pasien</h3>
                    <p>Melacak data pasien, riwayat medis, dan lainnya.</p>
                </div>
                <div class="bg-white shadow-md p-5 rounded-md max-w-xs">
                    <h3 class="text-xl font-bold mb-3">Keamanan Data</h3>
                    <p>Menjamin semua data kesehatan aman dan terjaga privasinya.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="kontak" class="bg-slate-900 text-white py-10">
        <div class="container mx-auto text-center">
            <p class="mb-3">Hubungi kami di: <a href="mailto:info@sistemkesehatan.com"
                    class="underline">info@hnwcare.com</a></p>
            <p>&copy; 2024 HNW's Care. Hak cipta dilindungi.</p>
        </div>
    </footer>
</body>

</html>
