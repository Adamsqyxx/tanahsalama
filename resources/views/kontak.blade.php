@extends('layouts.app')

@section('title', 'Kontak Pengelola - Tanah Salama')

@section('content')

<div class="min-h-screen bg-[#F7F5EF] pt-32 pb-20">

    <div class="max-w-6xl mx-auto px-6 lg:px-8">

        {{-- ===================================================== --}}
        {{-- HEADER --}}
        {{-- ===================================================== --}}

        <div class="max-w-3xl mb-12">

            <p
                class="text-[10px]
                       uppercase
                       tracking-[0.28em]
                       text-[#C8A96B]
                       font-semibold"
            >
                Bantuan & Informasi
            </p>

            <h1
                class="mt-3
                       text-4xl
                       md:text-5xl
                       font-serif
                       text-[#173528]"
            >
                Butuh Bantuan?
            </h1>

            <p
                class="mt-5
                       text-gray-500
                       leading-relaxed
                       max-w-2xl"
            >
                Jika Anda memiliki pertanyaan mengenai petak makam,
                proses booking, pembayaran, atau informasi lainnya,
                silakan hubungi pengelola Tanah Salama melalui kontak
                yang tersedia.
            </p>

        </div>



        {{-- ===================================================== --}}
        {{-- KONTAK + FORM INFORMASI --}}
        {{-- ===================================================== --}}

        <div class="grid lg:grid-cols-3 gap-6 items-start">


            {{-- ================================================= --}}
            {{-- KONTAK UTAMA --}}
            {{-- ================================================= --}}

            <div class="lg:col-span-2">

                <div
                    class="bg-white
                           rounded-3xl
                           border border-gray-200
                           p-6 md:p-8"
                >

                    <div class="flex items-center gap-4">

                        <div
                            class="w-12 h-12
                                   rounded-2xl
                                   bg-[#173528]
                                   text-white
                                   flex items-center
                                   justify-center"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.7"
                                    d="M21 11.5a8.38 8.38 0 01-1.9 5.4 8.5 8.5 0 01-6.6 3.1c-1.55 0-3.01-.41-4.27-1.13L3 20l1.37-4.11A8.45 8.45 0 013 11.5 8.5 8.5 0 1111.5 20"
                                />
                            </svg>

                        </div>


                        <div>

                            <p
                                class="text-[10px]
                                       uppercase
                                       tracking-[0.2em]
                                       text-[#C8A96B]
                                       font-semibold"
                            >
                                Hubungi Pengelola
                            </p>

                            <h2
                                class="mt-1
                                       text-xl
                                       font-semibold
                                       text-[#173528]"
                            >
                                Kami Siap Membantu
                            </h2>

                        </div>

                    </div>



                    {{-- ================================================= --}}
                    {{-- DAFTAR KONTAK --}}
                    {{-- ================================================= --}}

                    <div class="mt-8 grid sm:grid-cols-2 gap-4">


                        {{-- WHATSAPP --}}
                        <a
                            href="https://wa.me/6281234567890"
                            target="_blank"
                            class="group
                                   rounded-2xl
                                   border border-gray-200
                                   p-5
                                   hover:border-[#173528]/40
                                   hover:bg-[#F8FAF8]
                                   transition"
                        >

                            <div class="flex items-start gap-4">

                                <div
                                    class="w-10 h-10
                                           rounded-xl
                                           bg-[#F4F8F5]
                                           text-[#173528]
                                           flex items-center
                                           justify-center
                                           shrink-0"
                                >

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.7"
                                            d="M21 11.5a8.38 8.38 0 01-1.9 5.4 8.5 8.5 0 01-6.6 3.1c-1.55 0-3.01-.41-4.27-1.13L3 20l1.37-4.11A8.45 8.45 0 013 11.5 8.5 8.5 0 0111.5 3 8.5 8.5 0 0121 11.5z"
                                        />
                                    </svg>

                                </div>


                                <div>

                                    <p class="text-xs text-gray-400">
                                        WhatsApp
                                    </p>

                                    <p
                                        class="mt-1
                                               font-semibold
                                               text-[#173528]
                                               group-hover:text-[#C8A96B]
                                               transition"
                                    >
                                        +62 812-3456-7890
                                    </p>

                                    <p class="mt-1 text-xs text-gray-500">
                                        Chat dengan pengelola
                                    </p>

                                </div>

                            </div>

                        </a>



                        {{-- TELEPON --}}
                        <a
                            href="tel:+6281234567890"
                            class="group
                                   rounded-2xl
                                   border border-gray-200
                                   p-5
                                   hover:border-[#173528]/40
                                   hover:bg-[#F8FAF8]
                                   transition"
                        >

                            <div class="flex items-start gap-4">

                                <div
                                    class="w-10 h-10
                                           rounded-xl
                                           bg-[#F4F8F5]
                                           text-[#173528]
                                           flex items-center
                                           justify-center
                                           shrink-0"
                                >

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.7"
                                            d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6A19.79 19.79 0 012.12 4.18 2 2 0 014.11 2h3a2 2 0 012 1.72c.12.9.33 1.78.62 2.63a2 2 0 01-.45 2.11L8 9.73a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.85.29 1.73.5 2.63.62A2 2 0 0122 16.92z"
                                        />
                                    </svg>

                                </div>


                                <div>

                                    <p class="text-xs text-gray-400">
                                        Telepon
                                    </p>

                                    <p
                                        class="mt-1
                                               font-semibold
                                               text-[#173528]
                                               group-hover:text-[#C8A96B]
                                               transition"
                                    >
                                        +62 812-3456-7890
                                    </p>

                                    <p class="mt-1 text-xs text-gray-500">
                                        Hubungi pengelola
                                    </p>

                                </div>

                            </div>

                        </a>



                        {{-- EMAIL --}}
                        <a
                            href="mailto:info@tanahsalama.id"
                            class="group
                                   rounded-2xl
                                   border border-gray-200
                                   p-5
                                   hover:border-[#173528]/40
                                   hover:bg-[#F8FAF8]
                                   transition"
                        >

                            <div class="flex items-start gap-4">

                                <div
                                    class="w-10 h-10
                                           rounded-xl
                                           bg-[#F4F8F5]
                                           text-[#173528]
                                           flex items-center
                                           justify-center
                                           shrink-0"
                                >

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.7"
                                            d="M3 7.5A2.5 2.5 0 015.5 5h13A2.5 2.5 0 0121 7.5v9a2.5 2.5 0 01-2.5 2.5h-13A2.5 2.5 0 013 16.5v-9z"
                                        />
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.7"
                                            d="M3.5 7l8.5 6 8.5-6"
                                        />
                                    </svg>

                                </div>


                                <div>

                                    <p class="text-xs text-gray-400">
                                        Email
                                    </p>

                                    <p
                                        class="mt-1
                                               font-semibold
                                               text-[#173528]
                                               break-all
                                               group-hover:text-[#C8A96B]
                                               transition"
                                    >
                                        info@tanahsalama.id
                                    </p>

                                    <p class="mt-1 text-xs text-gray-500">
                                        Pertanyaan dan informasi
                                    </p>

                                </div>

                            </div>

                        </a>



                        {{-- ALAMAT --}}
                        <div
                            class="rounded-2xl
                                   border border-gray-200
                                   p-5"
                        >

                            <div class="flex items-start gap-4">

                                <div
                                    class="w-10 h-10
                                           rounded-xl
                                           bg-[#F4F8F5]
                                           text-[#173528]
                                           flex items-center
                                           justify-center
                                           shrink-0"
                                >

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.7"
                                            d="M12 21s7-6.1 7-12a7 7 0 10-14 0c0 5.9 7 12 7 12z"
                                        />
                                        <circle
                                            cx="12"
                                            cy="9"
                                            r="2.2"
                                            stroke-width="1.7"
                                        />
                                    </svg>

                                </div>


                                <div>

                                    <p class="text-xs text-gray-400">
                                        Alamat
                                    </p>

                                    <p
                                        class="mt-1
                                               font-semibold
                                               text-[#173528]"
                                    >
                                        Tanah Salama
                                    </p>

                                    <p class="mt-1 text-xs text-gray-500">
                                        Kota Parepare, Sulawesi Selatan
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



            {{-- ================================================= --}}
            {{-- SISI KANAN --}}
            {{-- ================================================= --}}

            <div>

                <div
                    class="bg-[#173528]
                           rounded-3xl
                           text-white
                           p-6 md:p-7
                           lg:sticky
                           lg:top-28"
                >

                    <p
                        class="text-[10px]
                               uppercase
                               tracking-[0.2em]
                               text-[#C8A96B]"
                    >
                        Jam Layanan
                    </p>


                    <h2
                        class="mt-3
                               text-2xl
                               font-serif"
                    >
                        Waktu Pelayanan
                    </h2>


                    <div class="mt-7 space-y-4">


                        <div
                            class="flex items-center
                                   justify-between
                                   gap-4
                                   border-b
                                   border-white/10
                                   pb-4"
                        >

                            <span class="text-sm text-white/60">
                                Senin – Jumat
                            </span>

                            <span class="text-sm font-semibold">
                                08.00 – 17.00
                            </span>

                        </div>


                        <div
                            class="flex items-center
                                   justify-between
                                   gap-4
                                   border-b
                                   border-white/10
                                   pb-4"
                        >

                            <span class="text-sm text-white/60">
                                Sabtu
                            </span>

                            <span class="text-sm font-semibold">
                                08.00 – 15.00
                            </span>

                        </div>


                        <div
                            class="flex items-center
                                   justify-between
                                   gap-4"
                        >

                            <span class="text-sm text-white/60">
                                Minggu
                            </span>

                            <span class="text-sm font-semibold">
                                Tutup
                            </span>

                        </div>

                    </div>


                    {{-- WHATSAPP BUTTON --}}

                    <a
                        href="https://wa.me/6281234567890"
                        target="_blank"
                        class="mt-8
                               flex
                               items-center
                               justify-center
                               gap-2
                               w-full
                               min-h-[52px]
                               rounded-full
                               bg-[#C8A96B]
                               text-[#173528]
                               font-semibold
                               text-sm
                               hover:bg-[#D8BD85]
                               transition"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M21 11.5a8.38 8.38 0 01-1.9 5.4 8.5 8.5 0 01-6.6 3.1c-1.55 0-3.01-.41-4.27-1.13L3 20l1.37-4.11A8.45 8.45 0 013 11.5 8.5 8.5 0 0111.5 3 8.5 8.5 0 0121 11.5z"
                            />
                        </svg>

                        Hubungi via WhatsApp

                    </a>

                </div>

            </div>

        </div>



        {{-- ===================================================== --}}
        {{-- BANTUAN CEPAT --}}
        {{-- ===================================================== --}}

        <div class="mt-12">

            <div class="mb-6">

                <p
                    class="text-[10px]
                           uppercase
                           tracking-[0.2em]
                           text-[#C8A96B]
                           font-semibold"
                >
                    Bantuan Cepat
                </p>

                <h2
                    class="mt-2
                           text-2xl
                           font-serif
                           text-[#173528]"
                >
                    Pertanyaan yang Sering Dibutuhkan
                </h2>

            </div>


            <div class="grid md:grid-cols-3 gap-5">


                {{-- BOOKING --}}
                <a
                    href="{{ route('booking.check') }}"
                    class="group
                           bg-white
                           rounded-3xl
                           border border-gray-200
                           p-6
                           hover:border-[#173528]/40
                           transition"
                >

                    <p class="text-xs text-gray-400">
                        Booking
                    </p>

                    <h3
                        class="mt-2
                               font-semibold
                               text-[#173528]
                               group-hover:text-[#C8A96B]
                               transition"
                    >
                        Cek Status Booking
                    </h3>

                    <p
                        class="mt-2
                               text-sm
                               text-gray-500
                               leading-relaxed"
                    >
                        Periksa status booking menggunakan kode booking Anda.
                    </p>

                    <p
                        class="mt-4
                               text-xs
                               font-semibold
                               text-[#173528]"
                    >
                        Cek Booking →
                    </p>

                </a>



               
                    <p class="text-xs text-gray-400">
                        Petak Makam
                    </p>

                    <h3
                        class="mt-2
                               font-semibold
                               text-[#173528]
                               group-hover:text-[#C8A96B]
                               transition"
                    >
                        Lihat Ketersediaan Petak
                    </h3>

                    <p
                        class="mt-2
                               text-sm
                               text-gray-500
                               leading-relaxed"
                    >
                        Lihat kategori dan status petak makam yang tersedia.
                    </p>

                    <p
                        class="mt-4
                               text-xs
                               font-semibold
                               text-[#173528]"
                    >
                        Lihat Petak →
                    </p>

                </a>



                {{-- PEMBAYARAN --}}
                <div
                    class="bg-white
                           rounded-3xl
                           border border-gray-200
                           p-6"
                >

                    <p class="text-xs text-gray-400">
                        Pembayaran
                    </p>

                    <h3
                        class="mt-2
                               font-semibold
                               text-[#173528]"
                    >
                        Butuh Bantuan Pembayaran?
                    </h3>

                    <p
                        class="mt-2
                               text-sm
                               text-gray-500
                               leading-relaxed"
                    >
                        Hubungi pengelola jika mengalami kendala
                        saat melakukan pembayaran atau mengunggah bukti.
                    </p>

                    <a
                        href="https://wa.me/6281234567890"
                        target="_blank"
                        class="inline-block
                               mt-4
                               text-xs
                               font-semibold
                               text-[#173528]
                               hover:text-[#C8A96B]
                               transition"
                    >
                        Hubungi Pengelola →
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection