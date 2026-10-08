@extends('layouts.app')

@section('title', 'Petak Saya')

@section('content')

<div class="min-h-screen bg-[#F7F5EF]">

    {{-- HEADER --}}
    <div class="border-b border-[#173F32]/10 bg-white">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5">

            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#B18A45]">
                    Tanah Salama
                </p>

                <h1 class="mt-1 text-2xl font-semibold text-[#173F32]">
                    Petak Saya
                </h1>
            </div>

            <div class="hidden text-right sm:block">
                <p class="text-xs text-slate-400">
                    Informasi Petak
                </p>

                <p class="text-sm font-medium text-[#173F32]">
                    Cek berdasarkan kode booking
                </p>
            </div>

        </div>
    </div>


    {{-- MAIN --}}
    <main class="mx-auto flex min-h-[calc(100vh-90px)] max-w-7xl items-center px-6 py-8">

        <div class="w-full">

            {{-- FORM KODE BOOKING --}}
            <div class="mx-auto max-w-3xl">

                <div class="rounded-2xl border border-[#173F32]/10 bg-white p-5 shadow-sm">

                    <div class="flex flex-col gap-4">

                        <div>

                            <label
                                for="kode_booking"
                                class="mb-2 block text-sm font-semibold text-[#173F32]"
                            >
                                Masukkan Kode Booking
                            </label>

                            <form
                                action="{{ route('petak.saya.cek') }}"
                                method="POST"
                            >
                                @csrf

                                <div class="flex gap-2">

                                    <input
                                        type="text"
                                        id="kode_booking"
                                        name="kode_booking"
                                        value="{{ old('kode_booking') }}"
                                        placeholder="Contoh: TS-20260926-ABC123"
                                        autocomplete="off"
                                        class="min-w-0 flex-1 rounded-xl border border-slate-200 bg-[#FCFBF8] px-4 py-3 text-sm uppercase tracking-wide text-[#173F32] outline-none transition focus:border-[#B18A45] focus:ring-2 focus:ring-[#D4B675]/20"
                                    >

                                    <button
                                        type="submit"
                                        class="inline-flex shrink-0 items-center gap-2 rounded-xl bg-[#173F32] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#102F26]"
                                    >

                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="1.8"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="m21 21-4.35-4.35m1.35-5.4a6.75 6.75 0 1 1-13.5 0 6.75 6.75 0 0 1 13.5 0Z"
                                            />
                                        </svg>

                                        Cek

                                    </button>

                                </div>

                            </form>

                            @error('kode_booking')
                                <p class="mt-2 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                            @if(session('error'))
                                <p class="mt-2 text-xs text-red-600">
                                    {{ session('error') }}
                                </p>
                            @endif

                        </div>

                    </div>

                </div>

            </div>


            {{-- HASIL --}}
            @if(isset($booking) && $booking)

                <div class="mx-auto mt-6 max-w-6xl">

                    <div class="overflow-hidden rounded-2xl border border-[#173F32]/10 bg-white shadow-sm">


                        {{-- CARD HEADER --}}
                        <div class="flex flex-col gap-4 border-b border-[#173F32]/10 bg-[#173F32] px-6 py-5 md:flex-row md:items-center md:justify-between">

                            <div>

                                <p class="text-xs uppercase tracking-[0.18em] text-[#D4B675]">
                                    Bukti Kepemilikan Petak
                                </p>

                                <h2 class="mt-1 text-2xl font-semibold text-white">
                                    {{ $booking->plot->kode_plot ?? '-' }}
                                </h2>

                            </div>


                            <div class="inline-flex w-fit items-center gap-2 rounded-full bg-emerald-400/10 px-4 py-2 text-sm font-semibold text-emerald-200">

                                <span class="h-2 w-2 rounded-full bg-emerald-400"></span>

                                LUNAS & TERVERIFIKASI

                            </div>

                        </div>


                        {{-- CARD BODY --}}
                        <div class="grid md:grid-cols-2">


                            {{-- KIRI --}}
                            <div class="border-b border-[#173F32]/10 p-6 md:border-b-0 md:border-r">


                                {{-- DATA PEMILIK --}}
                                <div>

                                    <p class="text-xs font-semibold uppercase tracking-[0.15em] text-[#B18A45]">
                                        Data Pemilik
                                    </p>

                                    <div class="mt-4 space-y-3">

                                        {{-- NAMA --}}
                                        <div class="rounded-xl bg-[#F7F5EF] px-4 py-3">

                                            <p class="text-xs text-slate-400">
                                                Nama
                                            </p>

                                            <p class="mt-1 text-sm font-semibold text-[#173F32]">
                                                {{ $booking->nama_pemesan }}
                                            </p>

                                        </div>


                                        {{-- EMAIL --}}
                                        <div class="rounded-xl bg-[#F7F5EF] px-4 py-3">

                                            <p class="text-xs text-slate-400">
                                                Email
                                            </p>

                                            <p class="mt-1 break-all text-sm font-semibold text-[#173F32]">
                                                {{ $booking->email ?? '-' }}
                                            </p>

                                        </div>

                                    </div>

                                </div>


                                {{-- KODE BOOKING --}}
                                <div class="mt-6">

                                    <p class="text-xs font-semibold uppercase tracking-[0.15em] text-[#B18A45]">
                                        Identitas Booking
                                    </p>

                                    <div class="mt-4 rounded-xl border border-[#D4B675]/30 bg-[#FCFBF8] px-4 py-4">

                                        <p class="text-xs text-slate-400">
                                            Kode Booking
                                        </p>

                                        <p class="mt-1 font-mono text-base font-semibold tracking-wide text-[#173F32]">
                                            {{ $booking->kode_booking }}
                                        </p>

                                    </div>

                                </div>

                            </div>


                            {{-- KANAN --}}
                            <div class="p-6">


                                {{-- DETAIL PETAK --}}
                                <div>

                                    <p class="text-xs font-semibold uppercase tracking-[0.15em] text-[#B18A45]">
                                        Detail Petak
                                    </p>

                                    <div class="mt-4 grid grid-cols-2 gap-3">


                                        {{-- KODE PETAK --}}
                                        <div class="rounded-xl bg-[#F7F5EF] px-4 py-3">

                                            <p class="text-xs text-slate-400">
                                                Kode Petak
                                            </p>

                                            <p class="mt-1 text-sm font-semibold text-[#173F32]">
                                                {{ $booking->plot->kode_plot ?? '-' }}
                                            </p>

                                        </div>


                                        {{-- KATEGORI --}}
                                        <div class="rounded-xl bg-[#F7F5EF] px-4 py-3">

                                            <p class="text-xs text-slate-400">
                                                Kategori
                                            </p>

                                            <p class="mt-1 text-sm font-semibold text-[#173F32]">
                                                {{ $booking->plot->category->nama ?? '-' }}
                                            </p>

                                        </div>


                                        {{-- JENIS LAHAN --}}
                                        <div class="rounded-xl bg-[#F7F5EF] px-4 py-3">

                                            <p class="text-xs text-slate-400">
                                                Jenis Lahan
                                            </p>

                                            <p class="mt-1 text-sm font-semibold text-[#173F32]">
                                                {{ $booking->plot->jenis_lahan ?? '-' }}
                                            </p>

                                        </div>


                                        {{-- STATUS --}}
                                        <div class="rounded-xl bg-[#F7F5EF] px-4 py-3">

                                            <p class="text-xs text-slate-400">
                                                Status Petak
                                            </p>

                                            <p class="mt-1 flex items-center gap-2 text-sm font-semibold text-emerald-700">

                                                <span class="h-2 w-2 rounded-full bg-emerald-500"></span>

                                                TERISI

                                            </p>

                                        </div>

                                    </div>

                                </div>


                                {{-- PEMBAYARAN --}}
                                <div class="mt-6">

                                    <p class="text-xs font-semibold uppercase tracking-[0.15em] text-[#B18A45]">
                                        Pembayaran
                                    </p>

                                    <div class="mt-4 grid grid-cols-2 gap-3">


                                        {{-- HARGA --}}
                                        <div class="rounded-xl bg-[#173F32] px-4 py-4">

                                            <p class="text-xs text-white/50">
                                                Harga Petak
                                            </p>

                                            <p class="mt-1 text-base font-semibold text-white">
                                                Rp {{ number_format($hargaPetak, 0, ',', '.') }}
                                            </p>

                                        </div>


                                        {{-- TERBAYAR --}}
                                        <div class="rounded-xl bg-emerald-50 px-4 py-4">

                                            <p class="text-xs text-emerald-600">
                                                Terbayar
                                            </p>

                                            <p class="mt-1 text-base font-semibold text-emerald-700">
                                                Rp {{ number_format($totalPembayaranVerified, 0, ',', '.') }}
                                            </p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- FOOTER CARD --}}
                        <div class="border-t border-[#173F32]/10 bg-[#FCFBF8] px-6 py-5">

                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">


                                {{-- KETERANGAN --}}
                                <p class="max-w-xl text-xs leading-5 text-slate-400">

                                    Data berdasarkan booking dan pembayaran yang telah
                                    diverifikasi oleh pengelola Tanah Salama.

                                </p>


                                {{-- TOMBOL PDF --}}
                                <a
                                    href="{{ route('petak.saya.pdf', $booking->id) }}"
                                    target="_blank"
                                    class="inline-flex shrink-0 items-center justify-center gap-3 rounded-xl bg-[#173F32] px-5 py-3 text-sm font-semibold text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:bg-[#102F26] hover:shadow-md"
                                >

                                    {{-- ICON PDF --}}
                                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/10">

                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="1.8"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M19.5 14.25v-9a1.5 1.5 0 0 0-1.5-1.5h-12a1.5 1.5 0 0 0-1.5 1.5v15a1.5 1.5 0 0 0 1.5 1.5h7.5"
                                            />

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M15 18.75h6m-3-3v6"
                                            />

                                        </svg>

                                    </span>

                                    <span>
                                        Cetak Bukti PDF
                                    </span>

                                </a>

                            </div>

                        </div>

                    </div>

                </div>


            @else

                {{-- EMPTY STATE --}}
                <div class="mx-auto mt-6 max-w-3xl">

                    <div class="rounded-2xl border border-dashed border-[#173F32]/20 bg-white px-6 py-10 text-center">


                        {{-- ICON --}}
                        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-[#F7F5EF] text-[#B18A45]">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.5"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15.75 5.25h-7.5a3 3 0 0 0-3 3v7.5a3 3 0 0 0 3 3h7.5a3 3 0 0 0 3-3v-7.5a3 3 0 0 0-3-3Z"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M9.75 9.75h4.5"
                                />

                            </svg>

                        </div>


                        <h3 class="mt-4 text-lg font-semibold text-[#173F32]">
                            Belum Ada Data Petak
                        </h3>


                        <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500">

                            Masukkan kode booking Anda untuk melihat informasi
                            petak yang telah lunas dan terverifikasi.

                        </p>

                    </div>

                </div>

            @endif

        </div>

    </main>

</div>

@endsection