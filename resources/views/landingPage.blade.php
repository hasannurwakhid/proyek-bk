<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Selamat Datang di Sistem Kesehatan</title>
</head>

<body class="bg-gray-50 text-gray-800">
    <!-- Header -->
    <header class="bg-slate-900 text-white py-5 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Sistem Kesehatan</h1>
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
            <h2 class="text-4xl font-bold mb-5">Selamat Datang di Sistem Kesehatan</h2>
            <p class="mb-8 text-lg">Kelola interaksi dokter dan pasien dengan sistem yang terintegrasi dan mudah.</p>
            <a href="#login" class="bg-green-500 text-white px-6 py-3 rounded-md text-lg shadow-md hover:bg-green-600">
                Mulai Sekarang
            </a>
        </div>
    </section>

    <!-- Login Options -->
    <section id="login" class="container mx-auto my-20">
        <h2 class="text-center text-3xl font-bold mb-10">Pilihan Login</h2>
        <div class="flex justify-center flex-wrap gap-5">
            <a href="/login-dokter">
                <div
                    class="text-center min-w-52 border p-10 rounded-md bg-white hover:scale-110 transition duration-500 ease-in-out shadow-md">
                    Login Dokter
                </div>
            </a>
            <a href="/login-pasien">
                <div
                    class="text-center min-w-52 border p-10 rounded-md bg-white hover:scale-110 transition duration-500 ease-in-out shadow-md">
                    Login Pasien
                </div>
            </a>
        </div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="py-20 bg-gray-100">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-5">Tentang Kami</h2>
            <p class="max-w-2xl mx-auto">Kami bertujuan untuk menyediakan koneksi yang mulus antara dokter dan pasien.
                Dengan fitur penjadwalan dan pengelolaan data yang canggih, kami membantu tenaga kesehatan untuk fokus
                pada hal yang paling penting: kesehatan pasien mereka.</p>
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
                    class="underline">info@sistemkesehatan.com</a></p>
            <p>&copy; 2024 Sistem Kesehatan. Hak cipta dilindungi.</p>
        </div>
    </footer>
</body>

</html>
