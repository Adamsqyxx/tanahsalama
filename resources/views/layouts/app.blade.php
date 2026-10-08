<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Tanah Salama')
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>


<body class="w-full m-0 p-0 overflow-x-hidden">

    {{-- =====================================================
         ADMIN LAYOUT
    ====================================================== --}}
    @if(request()->routeIs('admin.*') && session()->has('admin_id'))

        <div class="min-h-screen bg-[#F7F5EF]">

            {{-- =============================================
                 SIDEBAR ADMIN
            ============================================== --}}
            @include('partials.admin-sidebar')


            {{-- =============================================
                 KONTEN UTAMA ADMIN
                 
                 Sidebar desktop = 256px (w-64)
                 Maka main diberi margin kiri 256px.
            ============================================== --}}
            <main
                class="min-h-screen min-w-0 lg:ml-64"
            >

                {{-- =========================================
                     MOBILE TOP BAR
                ========================================== --}}
                <div
                    class="sticky top-0 z-30
                           border-b border-[#173528]/10
                           bg-[#F7F5EF]/95
                           px-4 py-3
                           backdrop-blur-md
                           lg:hidden"
                >

                    <div class="flex items-center justify-between">

                        {{-- BUTTON MENU --}}
                        <button
                            id="openAdminSidebar"
                            type="button"
                            class="flex items-center gap-2
                                   rounded-xl
                                   bg-[#173528]
                                   px-3 py-2
                                   text-sm
                                   text-white"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />

                            </svg>

                            <span>
                                Menu
                            </span>

                        </button>


                        {{-- MOBILE BRAND --}}
                        <div class="text-right">

                            <p
                                class="text-sm font-semibold
                                       text-[#173528]"
                            >
                                Tanah Salama
                            </p>

                            <p class="text-[10px] text-gray-500">
                                Panel Pengelola
                            </p>

                        </div>

                    </div>

                </div>


                {{-- =========================================
                     ISI HALAMAN ADMIN
                ========================================== --}}
                @yield('content')

            </main>

        </div>


    {{-- =====================================================
         PUBLIC LAYOUT
    ====================================================== --}}
    @else

        @include('partials.info-bar')

        @include('partials.navbar')

        @yield('content')

        @include('partials.footer')

    @endif


</body>

</html>