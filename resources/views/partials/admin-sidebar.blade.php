{{-- =========================================================
     ADMIN SIDEBAR
========================================================= --}}

<style>
    /* =========================================================
       CUSTOM SCROLLBAR SIDEBAR
    ========================================================= */

    #adminSidebarNav {
        scrollbar-width: thin;
        scrollbar-color: #c8a96b transparent;
    }

    #adminSidebarNav::-webkit-scrollbar {
        width: 4px;
    }

    #adminSidebarNav::-webkit-scrollbar-track {
        background: transparent;
    }

    #adminSidebarNav::-webkit-scrollbar-thumb {
        background: #c8a96b;
        border-radius: 9999px;
    }

    #adminSidebarNav::-webkit-scrollbar-thumb:hover {
        background: #d8bd82;
    }
</style>


{{-- =========================================================
     OVERLAY MOBILE
========================================================= --}}

<div
    id="adminSidebarOverlay"
    class="fixed inset-0 z-40 hidden bg-black/50 lg:hidden">
</div>


{{-- =========================================================
     SIDEBAR
========================================================= --}}

<aside
    id="adminSidebar"
    class="fixed left-0 top-0 z-50
           flex h-screen w-72 flex-col
           bg-[#0B2118] text-white
           -translate-x-full
           transition-transform duration-300 ease-in-out
           lg:w-64
           lg:translate-x-0">

    {{-- =====================================================
         HEADER SIDEBAR
    ====================================================== --}}

    <div class="shrink-0 border-b border-white/10 px-5 py-6">

        <div class="flex items-start justify-between">

            <div>

                <p
                    class="text-[10px] font-semibold uppercase
                           tracking-[0.25em] text-[#C8A96B]">
                    Panel Pengelola
                </p>

                <h2 class="mt-1 font-serif text-xl text-white">
                    Tanah Salama
                </h2>

                <p class="mt-1 text-xs text-white/50">
                    Administrator
                </p>

            </div>


            {{-- CLOSE MOBILE --}}

            <button
                id="closeAdminSidebar"
                type="button"
                class="flex h-9 w-9 items-center justify-center
                       rounded-lg text-white/60
                       transition
                       hover:bg-white/10
                       hover:text-white
                       lg:hidden">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M6 18L18 6M6 6l12 12" />

                </svg>

            </button>

        </div>

    </div>


    {{-- =====================================================
         MENU
    ====================================================== --}}

    <nav
        id="adminSidebarNav"
        class="min-h-0 flex-1 overflow-y-auto px-3 py-5">

        {{-- =================================================
             DASHBOARD
        ================================================== --}}

        <a
            href="{{ route('admin.dashboard') }}"
            class="group mb-1 flex items-center gap-3
                   rounded-xl px-4 py-3
                   text-sm text-white/80
                   transition
                   hover:bg-white/10
                   hover:text-[#C8A96B]">

            <span
                class="flex h-5 w-5 items-center justify-center
                       text-base text-white/70
                       group-hover:text-[#C8A96B]">
                ▦
            </span>

            <span>
                Dashboard
            </span>

        </a>


        {{-- =================================================
             DATA MAKAM
        ================================================== --}}

        <div class="px-4 pb-2 pt-6">

            <p
                class="text-[10px] font-semibold uppercase
                       tracking-[0.2em] text-white/40">
                Data Makam
            </p>

        </div>


        {{-- KELOLA PETAK --}}

        <a
            href="{{ route('admin.plots.index') }}"
            class="group mb-1 flex items-center gap-3
                   rounded-xl px-4 py-3
                   text-sm text-white/80
                   transition
                   hover:bg-white/10
                   hover:text-[#C8A96B]">

            <span
                class="flex h-5 w-5 items-center justify-center
                       text-base text-white/70
                       group-hover:text-[#C8A96B]">
                ▤
            </span>

            <span>
                Kelola Petak
            </span>

        </a>


        {{-- KELOLA KATEGORI --}}

        <a
            href="{{ route('admin.categories.index') }}"
            class="group mb-1 flex items-center gap-3
                   rounded-xl px-4 py-3
                   text-sm text-white/80
                   transition
                   hover:bg-white/10
                   hover:text-[#C8A96B]">

            <span
                class="flex h-5 w-5 items-center justify-center
                       text-base text-white/70
                       group-hover:text-[#C8A96B]">
                ◇
            </span>

            <span>
                Kelola Kategori
            </span>

        </a>


        {{-- =================================================
             TRANSAKSI
        ================================================== --}}

        <div class="px-4 pb-2 pt-6">

            <p
                class="text-[10px] font-semibold uppercase
                       tracking-[0.2em] text-white/40">
                Transaksi
            </p>

        </div>


        {{-- KELOLA BOOKING --}}

        <a
            href="{{ route('admin.bookings.index') }}"
            class="group mb-1 flex items-center gap-3
                   rounded-xl px-4 py-3
                   text-sm text-white/80
                   transition
                   hover:bg-white/10
                   hover:text-[#C8A96B]">

            <span
                class="flex h-5 w-5 items-center justify-center
                       text-base text-white/70
                       group-hover:text-[#C8A96B]">
                ◷
            </span>

            <span>
                Kelola Booking
            </span>

        </a>


        {{-- PENGATURAN PEMBAYARAN --}}

        <a
            href="{{ route('admin.payment-settings.edit') }}"
            class="group mb-1 flex items-center gap-3
                   rounded-xl px-4 py-3
                   text-sm text-white/80
                   transition
                   hover:bg-white/10
                   hover:text-[#C8A96B]">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 shrink-0 text-white/70
                       group-hover:text-[#C8A96B]"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.5"
                    d="M12 8c-1.1 0-2 .9-2 2s.9 2 2 2
                       2-.9 2-2-.9-2-2-2zm0-5v2m0 14v2
                       m9-9h-2M5 12H3m15.36-6.36-1.42 1.42
                       M7.06 16.94l-1.42 1.42
                       m12.72 0-1.42-1.42
                       M7.06 7.06 5.64 5.64" />

            </svg>

            <span>
                Pengaturan Pembayaran
            </span>

        </a>


        {{-- =================================================
             KOMUNIKASI
        ================================================== --}}


        {{-- =================================================
             AKUN
        ================================================== --}}

        <div class="px-4 pb-2 pt-6">

            <p
                class="text-[10px] font-semibold uppercase
                       tracking-[0.2em] text-white/40">
                Akun
            </p>

        </div>


        {{-- PENGATURAN AKUN --}}

        <a
            href="{{ route('admin.account.edit') }}"
            class="group mb-1 flex items-center gap-3
                   rounded-xl px-4 py-3
                   text-sm text-white/80
                   transition
                   hover:bg-white/10
                   hover:text-[#C8A96B]">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 shrink-0 text-white/70
                       group-hover:text-[#C8A96B]"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.5"
                    d="M12 15.5a3.5 3.5 0 100-7
                       3.5 3.5 0 000 7z" />

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.5"
                    d="M19.4 15a1.7 1.7 0 00.34 1.88l.06.06
                       a2 2 0 01-2.83 2.83l-.06-.06
                       a1.7 1.7 0 00-1.88-.34
                       1.7 1.7 0 00-1.03 1.56V21
                       a2 2 0 01-4 0v-.09
                       a1.7 1.7 0 00-1.03-1.56
                       1.7 1.7 0 00-1.88.34l-.06.06
                       a2 2 0 01-2.83-2.83l.06-.06
                       A1.7 1.7 0 004.6 15
                       1.7 1.7 0 003 13.97V14
                       a2 2 0 010-4h.09
                       A1.7 1.7 0 004.6 9
                       a1.7 1.7 0 00-.34-1.88L4.2 7.06
                       a2 2 0 012.83-2.83l.06.06
                       A1.7 1.7 0 009 4.6
                       1.7 1.7 0 0010.03 3.04V3
                       a2 2 0 014 0v.09
                       A1.7 1.7 0 0015 4.6
                       a1.7 1.7 0 001.88-.34l.06-.06
                       a2 2 0 012.83 2.83l-.06.06
                       A1.7 1.7 0 0019.4 9
                       1.7 1.7 0 002.56 10.03H22
                       a2 2 0 010 4h-.09
                       A1.7 1.7 0 0019.4 15z" />

            </svg>

            <span>
                Pengaturan Akun
            </span>

        </a>

    </nav>


    {{-- =====================================================
         LOGOUT
    ====================================================== --}}

    <div class="shrink-0 border-t border-white/10 p-3">

        <form
            action="{{ route('admin.logout') }}"
            method="POST">

            @csrf

            <button
                type="submit"
                class="flex w-full items-center gap-3
                       rounded-xl px-4 py-3
                       text-sm text-white/70
                       transition
                       hover:bg-red-500/10
                       hover:text-red-300">

                <span class="text-lg leading-none">
                    ←
                </span>

                <span>
                    Keluar
                </span>

            </button>

        </form>

    </div>

</aside>


{{-- =========================================================
     MOBILE SIDEBAR SCRIPT
========================================================= --}}

<script>
document.addEventListener('DOMContentLoaded', function () {

    const sidebar = document.getElementById('adminSidebar');
    const overlay = document.getElementById('adminSidebarOverlay');
    const closeButton = document.getElementById('closeAdminSidebar');
    const openButton = document.getElementById('openAdminSidebar');


    function openSidebar() {

        if (!sidebar) return;

        sidebar.classList.remove('-translate-x-full');

        if (overlay) {
            overlay.classList.remove('hidden');
        }

        document.body.classList.add('overflow-hidden');
    }


    function closeSidebar() {

        if (!sidebar) return;

        sidebar.classList.add('-translate-x-full');

        if (overlay) {
            overlay.classList.add('hidden');
        }

        document.body.classList.remove('overflow-hidden');
    }


    // OPEN
    if (openButton) {

        openButton.addEventListener('click', function () {
            openSidebar();
        });

    }


    // CLOSE
    if (closeButton) {

        closeButton.addEventListener('click', function () {
            closeSidebar();
        });

    }


    // OVERLAY
    if (overlay) {

        overlay.addEventListener('click', function () {
            closeSidebar();
        });

    }


    // MENU MOBILE
    if (sidebar) {

        sidebar.querySelectorAll('a').forEach(function (link) {

            link.addEventListener('click', function () {

                if (window.innerWidth < 1024) {
                    closeSidebar();
                }

            });

        });

    }


    // RESIZE
    window.addEventListener('resize', function () {

        if (window.innerWidth >= 1024) {

            sidebar.classList.remove('-translate-x-full');

            if (overlay) {
                overlay.classList.add('hidden');
            }

            document.body.classList.remove('overflow-hidden');
        }

    });

});
</script>