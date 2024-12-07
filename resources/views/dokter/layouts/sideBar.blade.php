<aside class="bg-slate-900 text-white min-h-screen p-5">
    <h1 class="text-2xl font-bold mb-5">Dokter Dashboard</h1>
    <nav>
        <ul>
            <li class="mb-3">
                <a href="/dashboard-dokter/jadwal-periksa" class="block p-2 rounded-md hover:bg-slate-700">
                    Jadwal Periksa
                </a>
            </li>
            <li class="mb-3">
                <a href="/dashboard-dokter/memeriksa-pasien" class="block p-2 rounded-md hover:bg-slate-700">
                    Memeriksa Pasien
                </a>
            </li>
            <li class="mb-3">
                <a href="/dashboard-dokter/riwayat-pasien" class="block p-2 rounded-md hover:bg-slate-700">
                    Riwayat Pasien
                </a>
            </li>
            <li class="mb-3">
                <a href="/dashboard-dokter/profil" class="block p-2 rounded-md hover:bg-slate-700">
                    Profil
                </a>
            </li>
            <form action="/logout-dokter" method="POST" class="block p-2 rounded-md hover:bg-red-500">
                @csrf
                <li>
                    <button type="submit" class="w-full text-left">
                        Logout
                    </button>

                </li>
            </form>

        </ul>
    </nav>
</aside>
