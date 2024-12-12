<!-- Sidebar -->
<aside
    class="bg-slate-900 text-white min-h-screen p-5 fixed lg:relative z-50 transform lg:transform-none -translate-x-full lg:translate-x-0 transition-transform duration-300"
    id="sidebar">
    <h1 class="text-2xl font-bold mb-5">Dashboard Pasien</h1>
    <nav>
        <ul>
            <li class="mb-3 hover:bg-slate-700 rounded-md">
                <a href="/dashboard-pasien/daftar-poli" class="p-2 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" class="fill-current mr-2" viewBox="0 0 448 512">
                        <path
                            d="M152 64c0 8.8-7.2 16-16 16H120V32c0-17.7-14.3-32-32-32s-32 14.3-32 32V80H40c-22.1 0-40 17.9-40 40v352c0 22.1 17.9 40 40 40h368c22.1 0 40-17.9 40-40V120c0-22.1-17.9-40-40-40H360V32c0-17.7-14.3-32-32-32s-32 14.3-32 32V80H168c-8.8 0-16-7.2-16-16V64c0-17.7-14.3-32-32-32s-32 14.3-32 32zM32 192h384v256H32V192z" />
                    </svg>


                    Daftar Ke Poli
                </a>
            </li>
            <li class="mb-3 hover:bg-slate-700 rounded-md">
                <a href="/dashboard-pasien/riwayat-poli" class="flex items-center p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" class="fill-current mr-2"
                        viewBox="0 0 512 512">
                        <path
                            d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm93-156h-85c-9.4 0-17-7.6-17-17V136c0-9.4 7.6-17 17-17h34c9.4 0 17 7.6 17 17v109h51c9.4 0 17 7.6 17 17v34c0 9.4-7.6 17-17 17z" />
                    </svg>

                    Riwayat Daftar Poli
                </a>
            </li>
            <form action="/logout-pasien" method="POST" class="p-2 rounded-md hover:bg-red-500">
                @csrf
                <button type="submit" class="w-full h-full flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" class="fill-current mr-2"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                    </svg>
                    Logout
                </button>
            </form>
        </ul>
    </nav>
</aside>

<!-- Toggle Button -->
<button class="bg-slate-900 text-white p-3 rounded-md fixed top-5 right-5 lg:hidden z-50" id="toggle-sidebar">
    ☰
</button>

<!-- Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButton = document.getElementById('toggle-sidebar');
        const sidebar = document.getElementById('sidebar');

        if (toggleButton && sidebar) {
            toggleButton.addEventListener('click', function() {
                sidebar.classList.toggle('-translate-x-full'); // Tampilkan atau sembunyikan sidebar
            });
        } else {
            console.error("Sidebar or toggle button not found");
        }
    });
</script>
