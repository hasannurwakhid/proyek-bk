<aside class="bg-slate-900 text-white min-h-screen p-5">
    <h1 class="text-2xl font-bold mb-5">Admin Dashboard</h1>
    <nav>
        <ul>
            <li class="mb-3">
                <a href="/dashboard-admin/kelola-dokter" class="block p-2 rounded-md hover:bg-slate-700">
                    Mengelola Dokter
                </a>
            </li>
            <li class="mb-3">
                <a href="/dashboard-admin/kelola-pasien" class="block p-2 rounded-md hover:bg-slate-700">
                    Mengelola Pasien
                </a>
            </li>
            <li class="mb-3">
                <a href="/dashboard-admin/kelola-poli" class="block p-2 rounded-md hover:bg-slate-700">
                    Mengelola Poli
                </a>
            </li>
            <li class="mb-3">
                <a href="/dashboard-admin/kelola-obat" class="block p-2 rounded-md hover:bg-slate-700">
                    Mengelola Obat
                </a>
            </li>
            <form action="/logout-admin" method="POST" class="block p-2 rounded-md hover:bg-red-500">
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
