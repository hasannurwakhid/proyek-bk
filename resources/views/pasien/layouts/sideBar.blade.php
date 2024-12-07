<aside class="bg-slate-900 text-white min-h-screen p-5">
    <h1 class="text-2xl font-bold mb-5">Dokter Dashboard</h1>
    <nav>
        <ul>
            <li class="mb-3">
                <a href="/dashboard-pasien/daftar-poli" class="block p-2 rounded-md hover:bg-slate-700">
                    Daftar Poli
                </a>
            </li>
            <li class="mb-3">
                <a href="/dashboard-pasien/riwayat-poli" class="block p-2 rounded-md hover:bg-slate-700">
                    Riwayat Daftar Poli
                </a>
            </li>
            <form action="/logout-pasien" method="POST" class="block p-2 rounded-md hover:bg-red-500">
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
