{{-- =========================================================
    NAVBAR — TANAH SALAMA
========================================================= --}}

<nav id="mainNavbar"
     class="fixed top-[42px] left-0 right-0 z-50
            bg-[#F4F1E9]/95
            backdrop-blur-xl
            border-b border-[#D9D8D0]
            transition-all duration-300">

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="h-[78px]
                    flex
                    items-center
                    justify-between">

            {{-- =================================================
                BRAND
            ================================================= --}}
            <a href="{{ url('/') }}"
               class="group flex items-center gap-3 shrink-0">

                {{-- LOGO --}}
                <div class="w-11 h-11 flex items-center justify-center shrink-0">
                    <img
                        src="{{ asset('images/image-removebg-preview (3).png') }}"
                        alt="Logo Tanah Salama"
                        class="w-full h-full object-contain
                               transition-transform duration-300
                               group-hover:scale-105"
                    >
                </div>

                {{-- BRAND TEXT --}}
                <div class="leading-none">

                    <span class="block
                                 text-[#29352C]
                                 text-[17px]
                                 font-semibold
                                 tracking-[-0.02em]">
                        Tanah Salama
                    </span>

                    <span class="block
                                 mt-1
                                 text-[#8A9088]
                                 text-[8px]
                                 uppercase
                                 tracking-[0.22em]">
                        Memorial Estate
                    </span>

                </div>

            </a>


            {{-- =================================================
                DESKTOP NAVIGATION
            ================================================= --}}
            <div class="hidden lg:flex
                        items-center
                        gap-9
                        ml-auto
                        mr-10">

                <a href="{{ url('/') }}"
                   class="nav-link
                          text-[13px]
                          font-medium
                          text-[#4E584F]
                          hover:text-[#26352A]
                          transition">

                    Beranda

                </a>


                <a href="{{ route('booking.check') }}"
                   class="nav-link
                          text-[13px]
                          font-medium
                          text-[#4E584F]
                          hover:text-[#26352A]
                          transition">

                    Cek Booking

                </a>


                <a href="{{ route('panduan') }}"
                   class="nav-link
                          text-[13px]
                          font-medium
                          text-[#4E584F]
                          hover:text-[#26352A]
                          transition">

                    Panduan

                </a>


                <a href="{{ route('petak.saya') }}"
                   class="nav-link
                          text-[13px]
                          font-medium
                          text-[#4E584F]
                          hover:text-[#26352A]
                          transition">

                    Petak Saya

                </a>

            </div>


            {{-- =================================================
                DESKTOP ACTION
            ================================================= --}}
            <div class="hidden lg:block">
                {{-- Kosong, sengaja tidak menampilkan tombol admin --}}
            </div>


            {{-- =================================================
                MOBILE BUTTON
            ================================================= --}}
            <button id="mobileMenuButton"
                    type="button"
                    aria-label="Buka menu"
                    class="lg:hidden
                           w-11 h-11
                           rounded-full
                           border
                           border-[#C9CBC3]
                           text-[#354335]
                           flex
                           items-center
                           justify-center
                           hover:bg-white
                           transition">

                {{-- MENU ICON --}}
                <svg id="menuIcon"
                     xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="1.5">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M4 7h16M4 12h16M4 17h16"/>

                </svg>


                {{-- CLOSE ICON --}}
                <svg id="closeIcon"
                     xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5 hidden"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="1.5">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M6 6l12 12M18 6L6 18"/>

                </svg>

            </button>

        </div>


        {{-- =====================================================
            MOBILE MENU
        ====================================================== --}}
        <div id="mobileMenu"
             class="hidden
                    lg:hidden
                    border-t
                    border-[#D9D8D0]
                    py-5">

            <div class="flex flex-col">

                <a href="{{ url('/') }}"
                   class="py-4
                          text-sm
                          font-medium
                          text-[#4E584F]
                          border-b
                          border-[#E7E5DE]
                          hover:text-[#26352A]">

                    Beranda

                </a>


                <a href="{{ route('booking.check') }}"
                   class="py-4
                          text-sm
                          font-medium
                          text-[#4E584F]
                          border-b
                          border-[#E7E5DE]
                          hover:text-[#26352A]">

                    Cek Booking

                </a>


                <a href="{{ route('panduan') }}"
                   class="py-4
                          text-sm
                          font-medium
                          text-[#4E584F]
                          border-b
                          border-[#E7E5DE]
                          hover:text-[#26352A]">

                    Panduan

                </a>


                <a href="{{ route('petak.saya') }}"
                   class="py-4
                          text-sm
                          font-medium
                          text-[#4E584F]
                          border-b
                          border-[#E7E5DE]
                          hover:text-[#26352A]">

                    Petak Saya

                </a>

            </div>

        </div>

    </div>

</nav>


{{-- =========================================================
    NAVBAR SCRIPT
========================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const navbar =
        document.getElementById('mainNavbar');

    const mobileButton =
        document.getElementById('mobileMenuButton');

    const mobileMenu =
        document.getElementById('mobileMenu');

    const menuIcon =
        document.getElementById('menuIcon');

    const closeIcon =
        document.getElementById('closeIcon');


    /* =========================================
       NAVBAR SCROLL
    ========================================= */

    function updateNavbar() {

        if (window.scrollY > 30) {

            navbar.classList.remove('top-[42px]');
            navbar.classList.add('top-0');
            navbar.classList.add('shadow-sm');

        } else {

            navbar.classList.remove('top-0');
            navbar.classList.add('top-[42px]');
            navbar.classList.remove('shadow-sm');

        }

    }


    window.addEventListener(
        'scroll',
        updateNavbar
    );

    updateNavbar();


    /* =========================================
       MOBILE MENU
    ========================================= */

    mobileButton.addEventListener(
        'click',
        function () {

            const closed =
                mobileMenu.classList.contains('hidden');


            if (closed) {

                mobileMenu.classList.remove('hidden');

                menuIcon.classList.add('hidden');

                closeIcon.classList.remove('hidden');

            } else {

                mobileMenu.classList.add('hidden');

                menuIcon.classList.remove('hidden');

                closeIcon.classList.add('hidden');

            }

        }
    );


    /* =========================================
       CLOSE AFTER CLICK
    ========================================= */

    mobileMenu
        .querySelectorAll('a')
        .forEach(function (link) {

            link.addEventListener(
                'click',
                function () {

                    mobileMenu.classList.add('hidden');

                    menuIcon.classList.remove('hidden');

                    closeIcon.classList.add('hidden');

                }
            );

        });

});

</script>