<footer class="bg-[#EDE9DE] text-[#354335]">

    {{-- =====================================================
        MAIN FOOTER
    ====================================================== --}}

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="py-20 lg:py-24">

            {{-- =================================================
                TOP AREA
            ================================================= --}}

            <div class="grid lg:grid-cols-12 gap-12 lg:gap-16">

                {{-- BRAND --}}

                <div class="lg:col-span-6">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11
                                    rounded-full
                                    border
                                    border-[#9DAA98]
                                    flex
                                    items-center
                                    justify-center">

                            <span class="text-xs
                                         font-semibold
                                         text-[#52634F]">
                                TS
                            </span>

                        </div>

                        <div>

                            <p class="text-lg
                                      font-semibold
                                      tracking-[-0.02em]">
                                Tanah Salama
                            </p>

                            <p class="mt-1
                                      text-[8px]
                                      uppercase
                                      tracking-[0.25em]
                                      text-[#858D82]">
                                Memorial Estate
                            </p>

                        </div>

                    </div>


                    <h2 class="mt-10
                               max-w-xl
                               text-3xl
                               sm:text-4xl
                               lg:text-5xl
                               font-medium
                               leading-[1.08]
                               tracking-[-0.035em]">

                        Ruang yang tenang

                        <span class="text-[#71816B]">
                            untuk kenangan yang bermakna.
                        </span>

                    </h2>


                    <p class="mt-6
                              max-w-lg
                              text-sm
                              leading-7
                              text-[#737B72]">

                        Sistem informasi dan pemesanan petak makam
                        yang membantu keluarga menemukan informasi,
                        memilih petak, dan memantau proses booking
                        dengan lebih mudah.

                    </p>

                </div>


                {{-- NAVIGATION --}}

                <div class="lg:col-span-3">

                    <p class="text-[10px]
                              uppercase
                              tracking-[0.25em]
                              text-[#87907F]">

                        Navigasi

                    </p>


                    <div class="mt-6 space-y-4">

                        <a
                            href="{{ url('/') }}"
                            class="block
                                   text-sm
                                   text-[#596359]
                                   hover:text-[#29352C]
                                   transition"
                        >
                            Beranda
                        </a>


                        <a
                            href="{{ route('booking.check') }}"
                            class="block
                                   text-sm
                                   text-[#596359]
                                   hover:text-[#29352C]
                                   transition"
                        >
                            Cek Booking
                        </a>


                        <a
                            href="{{ route('tentang') }}"
                            class="block
                                   text-sm
                                   text-[#596359]
                                   hover:text-[#29352C]
                                   transition"
                        >
                            Tentang Tanah Salama
                        </a>

                    </div>

                </div>


                {{-- CONTACT --}}

                <div class="lg:col-span-3">

                    <p class="text-[10px]
                              uppercase
                              tracking-[0.25em]
                              text-[#87907F]">

                        Bantuan

                    </p>


                    <div class="mt-6 space-y-5">


                        {{-- =================================================
                            WHATSAPP ADMIN
                        ================================================= --}}

                        <a
                            href="https://wa.me/6281234567890?text={{ urlencode('Halo Admin Tanah Salama, saya ingin mendapatkan informasi.') }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="group
                                   flex
                                   items-center
                                   justify-between
                                   pb-4
                                   border-b
                                   border-[#D2D1C8]"
                        >

                            <div>

                                <p class="text-sm
                                          font-medium
                                          text-[#4D594D]">

                                    Chat Admin

                                </p>

                                <p class="mt-1
                                          text-xs
                                          text-[#8A9088]">

                                    Hubungi pengelola melalui WhatsApp

                                </p>

                            </div>


                            <span
                                class="w-8 h-8
                                       rounded-full
                                       bg-white
                                       flex
                                       items-center
                                       justify-center
                                       text-sm
                                       text-[#60725C]
                                       group-hover:bg-[#334336]
                                       group-hover:text-white
                                       transition"
                            >
                                →

                            </span>

                        </a>


                        {{-- LOCATION --}}

                        <div>

                            <p class="text-sm
                                      font-medium
                                      text-[#4D594D]">

                                Tanah Salama

                            </p>

                            <p class="mt-1
                                      text-xs
                                      leading-6
                                      text-[#8A9088]">

                                Kota Parepare<br>
                                Sulawesi Selatan

                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                LARGE BRAND TEXT
            ================================================= --}}

            <div class="mt-20
                        pt-10
                        border-t
                        border-[#D2D1C8]
                        overflow-hidden">

                <p class="text-[14vw]
                          sm:text-[12vw]
                          lg:text-[10vw]
                          leading-none
                          font-semibold
                          tracking-[-0.07em]
                          text-[#D8D5C9]
                          whitespace-nowrap">

                    TANAH SALAMA

                </p>

            </div>


            {{-- =================================================
                BOTTOM BAR
            ================================================= --}}

            <div class="mt-8
                        flex
                        flex-col
                        md:flex-row
                        md:items-center
                        md:justify-between
                        gap-5">

                <p class="text-xs
                          text-[#8B9189]">

                    © {{ date('Y') }} Tanah Salama.
                    All rights reserved.

                </p>


                <p class="text-xs
                          text-[#8B9189]">

                    Sistem Informasi Pemakaman

                </p>

            </div>


            {{-- =================================================
                ADMIN
            ================================================= --}}

            <div class="mt-8
                        text-center">

                <a
                    href="{{ route('admin.login') }}"
                    class="text-[9px]
                           uppercase
                           tracking-[0.3em]
                           text-[#B0B1A8]
                           hover:text-[#71816B]
                           transition"
                >

                    Administrator

                </a>

            </div>

        </div>

    </div>

</footer>