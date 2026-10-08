@extends('layouts.app')

@section('title', 'Cek Booking - Tanah Salama')

@section('content')

<div class="min-h-screen bg-[#F4F1E9] pt-[120px]">

    {{-- HERO --}}
    <section class="relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 py-16 sm:py-20 lg:py-24">

            <div class="grid lg:grid-cols-12 gap-12 lg:gap-20 items-center">

                {{-- TEXT --}}
                <div class="lg:col-span-7">

                    <div class="flex items-center gap-3 mb-7">
                        <span class="w-10 h-px bg-[#7D8B75]"></span>

                        <span class="text-[10px] sm:text-xs uppercase tracking-[0.28em] text-[#7D867B]">
                            Booking Tanah Salama
                        </span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-medium
                               tracking-[-0.045em] leading-[1.02] text-[#29352C]">
                        Cek status
                        <span class="block text-[#71816B]">
                            booking Anda.
                        </span>
                    </h1>

                    <p class="mt-7 max-w-xl text-sm sm:text-base leading-7 sm:leading-8 text-[#737B72]">
                        Masukkan kode booking yang Anda terima saat melakukan pemesanan
                        untuk melihat detail petak, status pembayaran, dan masa berlaku booking.
                    </p>

                </div>

                {{-- ABSTRACT VISUAL --}}
                <div class="lg:col-span-5">

                    <div class="relative h-[280px] sm:h-[340px] overflow-hidden rounded-[2rem] bg-[#DDE2D7]">

                        {{-- SKY --}}
                        <div class="absolute inset-0 bg-gradient-to-b from-[#E9E8DF] to-[#D6DDD0]"></div>

                        {{-- BACKGROUND HILLS --}}
                        <div class="absolute -bottom-10 -left-16 w-[380px] h-[190px]
                                    rounded-[50%] bg-[#AAB6A2]"></div>

                        <div class="absolute -bottom-20 right-[-80px] w-[420px] h-[220px]
                                    rounded-[50%] bg-[#8C9A82]"></div>

                        <div class="absolute bottom-[-80px] left-[30%] w-[350px] h-[190px]
                                    rounded-[50%] bg-[#6F8069]"></div>

                        {{-- PATH --}}
                        <div class="absolute bottom-0 left-1/2 -translate-x-1/2
                                    w-28 h-52 bg-[#E5E0D4]
                                    rounded-t-[50%] opacity-80"></div>

                        {{-- CARD --}}
                        <div class="absolute top-7 right-7 sm:top-9 sm:right-9
                                    bg-white/90 backdrop-blur-md
                                    border border-white
                                    px-5 py-4 rounded-2xl shadow-sm">

                            <p class="text-[9px] uppercase tracking-[0.22em] text-[#899187]">
                                Booking
                            </p>

                            <p class="mt-1 text-sm font-semibold text-[#39453A]">
                                1 × 24 Jam
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>


    {{-- FORM SECTION --}}
    <section class="bg-[#F8F7F3] border-y border-[#DEDCD3]">

        <div class="max-w-7xl mx-auto px-6 lg:px-10 py-14 sm:py-18 lg:py-20">

            <div class="grid lg:grid-cols-12 gap-10 lg:gap-20">

                {{-- LEFT INFO --}}
                <div class="lg:col-span-4">

                    <p class="text-[10px] uppercase tracking-[0.25em] text-[#87907F]">
                        01 — Identifikasi
                    </p>

                    <h2 class="mt-4 text-2xl sm:text-3xl font-medium
                               tracking-[-0.03em] text-[#29352C]">
                        Temukan booking Anda.
                    </h2>

                    <p class="mt-5 text-sm leading-7 text-[#777E76]">
                        Gunakan kode booking yang diberikan setelah Anda berhasil
                        memilih petak makam.
                    </p>

                    <div class="mt-8 space-y-5">

                        <div class="flex gap-4">
                            <div class="shrink-0 w-9 h-9 rounded-full
                                        bg-[#E5E9E0]
                                        flex items-center justify-center">
                                <span class="text-xs text-[#596A55]">01</span>
                            </div>

                            <div>
                                <p class="text-sm font-medium text-[#465146]">
                                    Siapkan kode booking
                                </p>

                                <p class="mt-1 text-xs leading-5 text-[#8A9088]">
                                    Contoh: TS-20260915-AB12CD
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="shrink-0 w-9 h-9 rounded-full
                                        bg-[#E5E9E0]
                                        flex items-center justify-center">
                                <span class="text-xs text-[#596A55]">02</span>
                            </div>

                            <div>
                                <p class="text-sm font-medium text-[#465146]">
                                    Masukkan kode
                                </p>

                                <p class="mt-1 text-xs leading-5 text-[#8A9088]">
                                    Pastikan kode ditulis dengan benar.
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="shrink-0 w-9 h-9 rounded-full
                                        bg-[#E5E9E0]
                                        flex items-center justify-center">
                                <span class="text-xs text-[#596A55]">03</span>
                            </div>

                            <div>
                                <p class="text-sm font-medium text-[#465146]">
                                    Lihat status
                                </p>

                                <p class="mt-1 text-xs leading-5 text-[#8A9088]">
                                    Detail booking akan ditampilkan setelah ditemukan.
                                </p>
                            </div>
                        </div>

                    </div>

                </div>


                {{-- FORM --}}
                <div class="lg:col-span-8">

                    <div class="bg-white border border-[#DDDCD4]
                                p-6 sm:p-8 lg:p-10">

                        <div class="flex flex-col sm:flex-row sm:items-start
                                    sm:justify-between gap-5">

                            <div>
                                <p class="text-[10px] uppercase tracking-[0.25em]
                                          text-[#87907F]">
                                    Cek booking
                                </p>

                                <h3 class="mt-2 text-xl sm:text-2xl font-medium
                                           tracking-[-0.025em] text-[#303B32]">
                                    Masukkan kode booking
                                </h3>
                            </div>

                            <div class="w-11 h-11 shrink-0 rounded-full
                                        bg-[#EEF0E9]
                                        flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-5 h-5 text-[#65745F]"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="1.5">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M9 12h6m-6 4h4m5-10v12a2 2 0 01-2 2H8a2 2 0 01-2-2V6a2 2 0 012-2h5l5 5z"/>
                                </svg>
                            </div>

                        </div>


                        {{-- ERROR --}}
                        @if(session('error'))

                            <div class="mt-7 flex gap-3
                                        border border-red-200
                                        bg-red-50
                                        px-4 py-4">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-5 h-5 shrink-0 text-red-500 mt-0.5"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="1.5"
                                          d="M12 9v3.75m0 3h.008M10.29 3.86l-7.18 12a2 2 0 001.72 3h14.34a2 2 0 001.72-3l-7.18-12a2 2 0 00-3.42 0z"/>
                                </svg>

                                <p class="text-sm text-red-700">
                                    {{ session('error') }}
                                </p>

                            </div>

                        @endif


                        {{-- VALIDATION --}}
                        @if($errors->any())

                            <div class="mt-7 border border-red-200
                                        bg-red-50 px-4 py-4">

                                <ul class="space-y-1 text-sm text-red-700">

                                    @foreach($errors->all() as $error)

                                        <li>
                                            {{ $error }}
                                        </li>

                                    @endforeach

                                </ul>

                            </div>

                        @endif


                        <form action="{{ route('booking.check.process') }}"
                              method="POST"
                              class="mt-8">

                            @csrf

                            <label for="kode_booking"
                                   class="block text-[11px] uppercase
                                          tracking-[0.18em] font-medium
                                          text-[#687168]">
                                Kode Booking
                            </label>

                            <div class="relative mt-3">

                                <input
                                    type="text"
                                    id="kode_booking"
                                    name="kode_booking"
                                    value="{{ old('kode_booking') }}"
                                    placeholder="TS-20260915-AB12CD"
                                    autocomplete="off"
                                    required
                                    class="w-full h-14 sm:h-16
                                           border border-[#D6D6CE]
                                           bg-[#FAFAF7]
                                           px-4 sm:px-5 pr-12
                                           text-sm sm:text-base
                                           text-[#354036]
                                           placeholder:text-[#B3B6AE]
                                           outline-none
                                           focus:border-[#788772]
                                           focus:bg-white
                                           transition
                                           uppercase">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="absolute right-4 top-1/2
                                            -translate-y-1/2
                                            w-5 h-5 text-[#9AA198]"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="1.5">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M9 12h6m-6 4h4m5-10v12a2 2 0 012 2v12a2 2 0 01-2 2H8a2 2 0 01-2-2V6a2 2 0 012-2h5l5 5z"/>
                                </svg>

                            </div>

                            <p class="mt-3 text-xs text-[#90968E]">
                                Masukkan kode booking tanpa spasi.
                            </p>


                            {{-- BUTTON --}}
                            <button
                                type="submit"
                                class="mt-7 w-full sm:w-auto
                                       inline-flex items-center justify-center
                                       gap-4
                                       bg-[#334336]
                                       text-white
                                       px-7 py-4
                                       text-sm font-medium
                                       hover:bg-[#26352A]
                                       transition">

                                Cek Status Booking

                                <span class="text-white/60 text-lg">
                                    →
                                </span>

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- STATUS INFO --}}
    <section class="bg-[#F4F1E9]">

        <div class="max-w-7xl mx-auto px-6 lg:px-10 py-14 sm:py-16 lg:py-20">

            <div class="flex flex-col lg:flex-row
                        lg:items-end lg:justify-between
                        gap-8">

                <div>

                    <p class="text-[10px] uppercase tracking-[0.25em]
                              text-[#87907F]">
                        Status booking
                    </p>

                    <h2 class="mt-3 text-2xl sm:text-3xl
                               font-medium tracking-[-0.03em]
                               text-[#29352C]">
                        Pahami status pemesanan Anda.
                    </h2>

                </div>

                <p class="max-w-xl text-sm leading-7 text-[#777E76]">
                    Setiap booking memiliki status yang menunjukkan proses
                    pemesanan dan pembayaran petak makam.
                </p>

            </div>


            <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4
                        border-t border-l border-[#D8D7CE]">

                {{-- BOOKED --}}
                <div class="border-r border-b border-[#D8D7CE]
                            p-6 sm:p-7 bg-[#F7F6F1]">

                    <div class="flex items-center gap-3">

                        <span class="w-2.5 h-2.5 rounded-full bg-[#C79A3B]"></span>

                        <span class="text-xs font-semibold tracking-wide
                                     text-[#566054]">
                            BOOKED
                        </span>

                    </div>

                    <p class="mt-5 text-sm leading-6 text-[#858B84]">
                        Petak telah dipesan dan masih menunggu pembayaran.
                    </p>

                </div>


                {{-- CONFIRMED --}}
                <div class="border-r border-b border-[#D8D7CE]
                            p-6 sm:p-7 bg-[#F7F6F1]">

                    <div class="flex items-center gap-3">

                        <span class="w-2.5 h-2.5 rounded-full bg-[#657D61]"></span>

                        <span class="text-xs font-semibold tracking-wide
                                     text-[#566054]">
                            CONFIRMED
                        </span>

                    </div>

                    <p class="mt-5 text-sm leading-6 text-[#858B84]">
                        Pembayaran telah diverifikasi oleh pengelola.
                    </p>

                </div>


                {{-- EXPIRED --}}
                <div class="border-r border-b border-[#D8D7CE]
                            p-6 sm:p-7 bg-[#F7F6F1]">

                    <div class="flex items-center gap-3">

                        <span class="w-2.5 h-2.5 rounded-full bg-[#9B8170]"></span>

                        <span class="text-xs font-semibold tracking-wide
                                     text-[#566054]">
                            EXPIRED
                        </span>

                    </div>

                    <p class="mt-5 text-sm leading-6 text-[#858B84]">
                        Masa booking berakhir sebelum pembayaran dikonfirmasi.
                    </p>

                </div>


                {{-- CANCELLED --}}
                <div class="border-r border-b border-[#D8D7CE]
                            p-6 sm:p-7 bg-[#F7F6F1]">

                    <div class="flex items-center gap-3">

                        <span class="w-2.5 h-2.5 rounded-full bg-[#A96B64]"></span>

                        <span class="text-xs font-semibold tracking-wide
                                     text-[#566054]">
                            CANCELLED
                        </span>

                    </div>

                    <p class="mt-5 text-sm leading-6 text-[#858B84]">
                        Booking dibatalkan dan tidak lagi berlaku.
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- CTA --}}
    <section class="bg-[#334336] text-white">

        <div class="max-w-7xl mx-auto px-6 lg:px-10 py-14 sm:py-16 lg:py-20">

            <div class="flex flex-col lg:flex-row
                        lg:items-center lg:justify-between
                        gap-8">

                <div>

                    <p class="text-[10px] uppercase tracking-[0.25em]
                              text-white/40">
                        Butuh bantuan?
                    </p>

                    <h2 class="mt-3 text-2xl sm:text-3xl
                               font-medium tracking-[-0.03em]">
                        Kami siap membantu Anda.
                    </h2>

                    <p class="mt-3 max-w-xl text-sm leading-7 text-white/55">
                        Jika mengalami kendala saat mengecek booking,
                        silakan hubungi pengelola Tanah Salama.
                    </p>

                </div>

                

            </div>

        </div>

    </section>

</div>

@endsection