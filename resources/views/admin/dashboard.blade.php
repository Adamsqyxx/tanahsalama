@extends('layouts.app')

@section('title', 'Dashboard — Tanah Salama')

@section('content')

<div class="min-h-screen bg-[#F2F0E9] text-[#18251E]">

    {{-- =========================================================
        TOP BAR
    ========================================================== --}}

    <header class="border-b border-[#DCD9D0] bg-[#F8F7F2]">

        <div class="max-w-[1600px] mx-auto px-5 sm:px-8 lg:px-12">

            <div class="h-[76px] flex items-center justify-between gap-6">

                {{-- BRAND --}}

                <div class="flex items-center gap-4">

                    <div class="w-10 h-10 rounded-full
                                bg-[#183629]
                                flex items-center justify-center">

                        <span class="text-[10px]
                                     font-semibold
                                     tracking-[0.08em]
                                     text-[#D4BB82]">
                            TS
                        </span>

                    </div>

                    <div class="hidden sm:block">

                        <p class="text-sm
                                  font-semibold
                                  tracking-[-0.01em]
                                  text-[#183629]">

                            Tanah Salama

                        </p>

                        <p class="text-[9px]
                                  uppercase
                                  tracking-[0.24em]
                                  text-[#92958D]">

                            Management Office

                        </p>

                    </div>

                </div>


                {{-- RIGHT --}}

                <div class="flex items-center gap-4 sm:gap-7">

                    <div class="hidden md:block text-right">

                        <p class="text-[10px]
                                  uppercase
                                  tracking-[0.16em]
                                  text-[#9A9B94]">

                            Administrator

                        </p>

                        <p class="mt-1 text-sm font-medium text-[#26372D]">

                            {{ session('admin_name') }}

                        </p>

                    </div>


                    <div class="h-8 w-px bg-[#DCD9D0] hidden sm:block"></div>


                    <form
                        action="{{ route('admin.logout') }}"
                        method="POST"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="group flex items-center gap-2
                                   text-xs
                                   text-[#72776F]
                                   hover:text-[#183629]
                                   transition"
                        >

                            <span class="hidden sm:inline">
                                Keluar
                            </span>

                            <span class="text-lg transition-transform
                                         group-hover:translate-x-1">
                                →
                            </span>

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </header>



    {{-- =========================================================
        MAIN
    ========================================================== --}}

    <main class="max-w-[1600px] mx-auto px-5 sm:px-8 lg:px-12 py-8 lg:py-10">


        {{-- =====================================================
            INTRO
        ====================================================== --}}

        <section class="grid lg:grid-cols-12 gap-8 items-end mb-10">

            <div class="lg:col-span-8">

                <div class="flex items-center gap-3 mb-5">

                    <span class="w-8 h-px bg-[#B39457]"></span>

                    <span class="text-[10px]
                                 uppercase
                                 tracking-[0.25em]
                                 text-[#9A7B3F]">

                        Overview

                    </span>

                </div>


                <h1 class="text-[42px]
                           sm:text-[54px]
                           lg:text-[68px]
                           leading-[0.95]
                           tracking-[-0.055em]
                           font-serif
                           font-medium
                           text-[#183629]">

                    Selamat datang,<br>

                    <span class="text-[#89907F]">
                        {{ session('admin_name') }}.
                    </span>

                </h1>

            </div>


            <div class="lg:col-span-4 lg:text-right">

                <p class="text-sm
                          leading-7
                          text-[#777D74]
                          max-w-md
                          lg:ml-auto">

                    Pantau kondisi petak, booking, dan pembayaran
                    Tanah Salama melalui pusat pengelolaan.

                </p>

                <div class="mt-5 flex lg:justify-end items-center gap-3">

                    <span class="relative flex h-2 w-2">

                        <span class="absolute
                                     inline-flex
                                     h-full
                                     w-full
                                     rounded-full
                                     bg-[#78977C]
                                     opacity-50
                                     animate-ping">
                        </span>

                        <span class="relative
                                     inline-flex
                                     h-2
                                     w-2
                                     rounded-full
                                     bg-[#78977C]">
                        </span>

                    </span>

                    <span class="text-[10px]
                                 uppercase
                                 tracking-[0.18em]
                                 text-[#6D766D]">

                        Sistem berjalan normal

                    </span>

                </div>

            </div>

        </section>



        {{-- =====================================================
            HERO STATISTIC
        ====================================================== --}}

        <section class="grid lg:grid-cols-12 gap-4 mb-4">


            {{-- TOTAL PETAK --}}

            <div class="lg:col-span-5
                        min-h-[260px]
                        rounded-[30px]
                        bg-[#183629]
                        text-white
                        p-7 sm:p-9
                        relative
                        overflow-hidden">

                {{-- Decorative --}}

                <div class="absolute
                            right-[-90px]
                            top-[-90px]
                            w-[280px]
                            h-[280px]
                            rounded-full
                            border
                            border-white/10">
                </div>

                <div class="absolute
                            right-[-40px]
                            bottom-[-150px]
                            w-[340px]
                            h-[340px]
                            rounded-full
                            border
                            border-[#D4BB82]/10">
                </div>


                <div class="relative h-full flex flex-col justify-between">

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-[10px]
                                      uppercase
                                      tracking-[0.22em]
                                      text-[#BDBBA8]">

                                Inventory

                            </p>

                            <p class="mt-2 text-sm text-white/60">

                                Total petak makam

                            </p>

                        </div>


                        <span class="text-[10px]
                                     text-[#D4BB82]
                                     border
                                     border-[#D4BB82]/30
                                     rounded-full
                                     px-3 py-1">

                            01

                        </span>

                    </div>


                    <div class="mt-14">

                        <p class="text-[76px]
                                  sm:text-[92px]
                                  leading-none
                                  tracking-[-0.06em]
                                  font-serif">

                            {{ $totalPlot }}

                        </p>

                        <p class="mt-4 text-xs text-white/45">

                            Seluruh petak yang tercatat dalam sistem

                        </p>

                    </div>

                </div>

            </div>


            {{-- AVAILABLE --}}

            <div class="lg:col-span-3
                        min-h-[260px]
                        rounded-[30px]
                        bg-[#E5E9DF]
                        p-7 sm:p-8
                        border border-[#D6DCD1]
                        flex flex-col justify-between">

                <div class="flex items-center justify-between">

                    <span class="text-[10px]
                                 uppercase
                                 tracking-[0.2em]
                                 text-[#6E796E]">

                        Available

                    </span>

                    <span class="w-9 h-9 rounded-full
                                 bg-white
                                 flex items-center justify-center">

                        <span class="w-2 h-2 rounded-full bg-[#719477]"></span>

                    </span>

                </div>


                <div>

                    <p class="text-[58px]
                              leading-none
                              tracking-[-0.05em]
                              font-serif
                              text-[#183629]">

                        {{ $plotTersedia }}

                    </p>

                    <p class="mt-4 text-xs
                              leading-5
                              text-[#7B847B]">

                        Petak tersedia<br>
                        untuk pemesanan

                    </p>

                </div>

            </div>


            {{-- BOOKED --}}

            <div class="lg:col-span-2
                        min-h-[260px]
                        rounded-[30px]
                        bg-[#EEE7D4]
                        p-7
                        border border-[#E0D5B9]
                        flex flex-col justify-between">

                <div class="flex items-center justify-between">

                    <span class="text-[10px]
                                 uppercase
                                 tracking-[0.2em]
                                 text-[#88754B]">

                        Booked

                    </span>

                    <span class="text-[#AA8B4D]">
                        •
                    </span>

                </div>


                <div>

                    <p class="text-[50px]
                              leading-none
                              tracking-[-0.05em]
                              font-serif
                              text-[#183629]">

                        {{ $plotDipesan }}

                    </p>

                    <p class="mt-4 text-xs
                              leading-5
                              text-[#857C68]">

                        Booking<br>
                        aktif

                    </p>

                </div>

            </div>


            {{-- OCCUPIED --}}

            <div class="lg:col-span-2
                        min-h-[260px]
                        rounded-[30px]
                        bg-[#E8DEDC]
                        p-7
                        border border-[#DCCFCD]
                        flex flex-col justify-between">

                <div class="flex items-center justify-between">

                    <span class="text-[10px]
                                 uppercase
                                 tracking-[0.2em]
                                 text-[#876F6B]">

                        Occupied

                    </span>

                    <span class="text-[#A16F67]">
                        •
                    </span>

                </div>


                <div>

                    <p class="text-[50px]
                              leading-none
                              tracking-[-0.05em]
                              font-serif
                              text-[#183629]">

                        {{ $plotTerisi }}

                    </p>

                    <p class="mt-4 text-xs
                              leading-5
                              text-[#857876]">

                        Petak sudah<br>
                        terisi

                    </p>

                </div>

            </div>

        </section>



        {{-- =====================================================
            OPERATIONAL AREA
        ====================================================== --}}

        <section class="grid lg:grid-cols-12 gap-4">


            {{-- BOOKING --}}

            <div class="lg:col-span-7
                        bg-[#F8F7F2]
                        border border-[#DCD9D0]
                        rounded-[30px]
                        overflow-hidden">

                <div class="p-7 sm:p-8 border-b border-[#E1DED5]">

                    <div class="flex items-start justify-between gap-5">

                        <div>

                            <p class="text-[10px]
                                      uppercase
                                      tracking-[0.22em]
                                      text-[#9A7B3F]">

                                Booking Desk

                            </p>

                            <h2 class="mt-2
                                       text-2xl
                                       sm:text-3xl
                                       font-serif
                                       tracking-[-0.025em]
                                       text-[#183629]">

                                Aktivitas pemesanan

                            </h2>

                        </div>


                        <div class="text-right">

                            <p class="text-3xl
                                      font-serif
                                      text-[#183629]">

                                {{ $bookingAktif }}

                            </p>

                            <p class="mt-1 text-[9px]
                                      uppercase
                                      tracking-[0.15em]
                                      text-[#999C95]">

                                aktif

                            </p>

                        </div>

                    </div>

                </div>


                <div class="p-7 sm:p-8">

                    <div class="relative pl-7 border-l border-[#D7D3C8]">

                        {{-- STEP 1 --}}

                        <div class="relative pb-9">

                            <span class="absolute
                                         -left-[33px]
                                         top-0
                                         w-3
                                         h-3
                                         rounded-full
                                         bg-[#183629]
                                         ring-4
                                         ring-[#F8F7F2]">
                            </span>

                            <p class="text-[10px]
                                      uppercase
                                      tracking-[0.16em]
                                      text-[#9A9B94]">

                                Status saat ini

                            </p>

                            <div class="mt-2 flex flex-wrap
                                        items-center gap-3">

                                <span class="text-3xl
                                             font-serif
                                             text-[#183629]">

                                    {{ $bookingAktif }}

                                </span>

                                <span class="text-sm text-[#777E75]">

                                    booking masih aktif

                                </span>

                            </div>

                        </div>


                        {{-- STEP 2 --}}

                        <div class="relative">

                            <span class="absolute
                                         -left-[33px]
                                         top-0
                                         w-3
                                         h-3
                                         rounded-full
                                         bg-[#D2C9AF]
                                         ring-4
                                         ring-[#F8F7F2]">
                            </span>

                            <p class="text-[10px]
                                      uppercase
                                      tracking-[0.16em]
                                      text-[#9A9B94]">

                                Masa pembayaran

                            </p>

                            <p class="mt-2 text-sm
                                      leading-6
                                      text-[#626A62]">

                                Setiap booking memiliki masa pembayaran
                                selama <strong class="font-medium text-[#39473D]">
                                    1×24 jam
                                </strong>.

                            </p>

                        </div>

                    </div>


                    <div class="mt-9 pt-6 border-t border-[#E1DED5]">

                        <a
                            href="{{ route('admin.bookings.index') }}"
                            class="inline-flex
                                   items-center
                                   gap-4
                                   text-sm
                                   font-medium
                                   text-[#183629]
                                   group"
                        >

                            <span>
                                Buka daftar booking
                            </span>

                            <span class="w-8 h-8 rounded-full
                                         bg-[#E8E5DC]
                                         flex items-center justify-center
                                         transition
                                         group-hover:bg-[#183629]
                                         group-hover:text-white">

                                →

                            </span>

                        </a>

                    </div>

                </div>

            </div>



            {{-- PAYMENT --}}

            <div class="lg:col-span-5
                        rounded-[30px]
                        bg-[#D8C9A7]
                        p-7 sm:p-8
                        relative
                        overflow-hidden">

                <div class="absolute
                            -right-20
                            -top-20
                            w-60
                            h-60
                            rounded-full
                            border
                            border-white/20">
                </div>


                <div class="relative">

                    <p class="text-[10px]
                              uppercase
                              tracking-[0.22em]
                              text-[#695B3F]">

                        Payment Desk

                    </p>


                    <div class="mt-8">

                        <p class="text-[78px]
                                  leading-none
                                  tracking-[-0.06em]
                                  font-serif
                                  text-[#183629]">

                            {{ $menungguVerifikasi }}

                        </p>

                        <p class="mt-3 text-sm
                                  text-[#655A46]">

                            pembayaran menunggu<br>
                            verifikasi admin

                        </p>

                    </div>


                    <div class="mt-10 p-5 rounded-2xl
                                bg-white/35
                                border border-white/30">

                        <div class="flex items-start gap-3">

                            <div class="w-8 h-8
                                        rounded-full
                                        bg-[#183629]
                                        text-white
                                        flex
                                        items-center
                                        justify-center
                                        text-xs">

                                !

                            </div>

                            <div>

                                <p class="text-sm
                                          font-medium
                                          text-[#314035]">

                                    Perlu perhatian

                                </p>

                                <p class="mt-1 text-xs
                                          leading-5
                                          text-[#6D634F]">

                                    Periksa bukti pembayaran pelanggan
                                    sebelum melakukan konfirmasi.

                                </p>

                            </div>

                        </div>

                    </div>


                    <a
                        href="{{ route('admin.bookings.index') }}"
                        class="mt-6
                               w-full
                               flex
                               items-center
                               justify-between
                               rounded-full
                               bg-[#183629]
                               text-white
                               px-5 py-3.5
                               text-sm
                               transition
                               hover:bg-[#0F291F]"
                    >

                        <span>
                            Periksa pembayaran
                        </span>

                        <span>
                            →
                        </span>

                    </a>

                </div>

            </div>

        </section>



        {{-- =====================================================
            MANAGEMENT MENU
        ====================================================== --}}

        <section class="mt-4
                        rounded-[30px]
                        bg-[#183629]
                        text-white
                        p-7 sm:p-9">

            <div class="grid lg:grid-cols-12 gap-8 items-start">


                {{-- TITLE --}}

                <div class="lg:col-span-4">

                    <p class="text-[10px]
                              uppercase
                              tracking-[0.22em]
                              text-[#C5BC9C]">

                        Management

                    </p>

                    <h2 class="mt-3
                               text-3xl
                               sm:text-4xl
                               font-serif
                               tracking-[-0.035em]">

                        Kelola<br>
                        Tanah Salama.

                    </h2>

                    <p class="mt-5 max-w-sm
                              text-sm
                              leading-6
                              text-white/50">

                        Akses langsung ke modul utama
                        yang digunakan dalam operasional harian.

                    </p>

                </div>


                {{-- MENU --}}

                <div class="lg:col-span-8
                            grid sm:grid-cols-2
                            gap-px
                            bg-white/10
                            rounded-2xl
                            overflow-hidden">


                    {{-- PETAK --}}

                    <a
                        href="{{ route('admin.plots.index') }}"
                        class="group bg-[#183629]
                               hover:bg-[#214435]
                               p-6
                               transition"
                    >

                        <div class="flex items-center justify-between">

                            <span class="text-[10px]
                                         text-[#C5BC9C]">
                                01
                            </span>

                            <span class="text-white/30
                                         group-hover:text-[#D4BB82]
                                         transition">
                                →
                            </span>

                        </div>

                        <p class="mt-8 text-base font-medium">
                            Kelola Petak
                        </p>

                        <p class="mt-2 text-xs text-white/40">
                            Status, harga, lahan & data petak
                        </p>

                    </a>


                    {{-- KATEGORI --}}

                    <a
                        href="{{ route('admin.categories.index') }}"
                        class="group bg-[#183629]
                               hover:bg-[#214435]
                               p-6
                               transition"
                    >

                        <div class="flex items-center justify-between">

                            <span class="text-[10px]
                                         text-[#C5BC9C]">
                                02
                            </span>

                            <span class="text-white/30
                                         group-hover:text-[#D4BB82]
                                         transition">
                                →
                            </span>

                        </div>

                        <p class="mt-8 text-base font-medium">
                            Kelola Kategori
                        </p>

                        <p class="mt-2 text-xs text-white/40">
                            Harga dan paket pemakaman
                        </p>

                    </a>


                    {{-- BOOKING --}}

                    <a
                        href="{{ route('admin.bookings.index') }}"
                        class="group bg-[#183629]
                               hover:bg-[#214435]
                               p-6
                               transition"
                    >

                        <div class="flex items-center justify-between">

                            <span class="text-[10px]
                                         text-[#C5BC9C]">
                                03
                            </span>

                            <span class="text-white/30
                                         group-hover:text-[#D4BB82]
                                         transition">
                                →
                            </span>

                        </div>

                        <p class="mt-8 text-base font-medium">
                            Kelola Booking
                        </p>

                        <p class="mt-2 text-xs text-white/40">
                            Pemesanan dan verifikasi pembayaran
                        </p>

                    </a>


                    {{-- PAYMENT SETTINGS --}}

                    <a
                        href="{{ route('admin.payment-settings.edit') }}"
                        class="group bg-[#183629]
                               hover:bg-[#214435]
                               p-6
                               transition"
                    >

                        <div class="flex items-center justify-between">

                            <span class="text-[10px]
                                         text-[#C5BC9C]">
                                04
                            </span>

                            <span class="text-white/30
                                         group-hover:text-[#D4BB82]
                                         transition">
                                →
                            </span>

                        </div>

                        <p class="mt-8 text-base font-medium">
                            Pengaturan Pembayaran
                        </p>

                        <p class="mt-2 text-xs text-white/40">
                            Rekening bank dan QRIS
                        </p>

                    </a>

                </div>

            </div>

        </section>



        {{-- =====================================================
            FOOTER
        ====================================================== --}}

        <div class="mt-7
                    flex flex-col sm:flex-row
                    sm:items-center
                    sm:justify-between
                    gap-3
                    px-1">

            <p class="text-[9px]
                      uppercase
                      tracking-[0.2em]
                      text-[#A0A29B]">

                Tanah Salama · Memorial Estate

            </p>

            <p class="text-xs text-[#A0A29B]">

                Sistem Informasi Pemakaman · {{ date('Y') }}

            </p>

        </div>

    </main>

</div>

@endsection