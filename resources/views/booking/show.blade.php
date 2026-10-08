@extends('layouts.app')

@section('title', 'Booking Berhasil - Tanah Salama')

@section('content')

<div class="min-h-screen bg-[#F4F1E9] pt-[120px]">

    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <section class="max-w-6xl mx-auto px-6 lg:px-10 pt-10 pb-14">

        <div class="flex items-center gap-3 text-[10px] uppercase tracking-[0.2em] text-[#8B9189]">
            <a href="{{ url('/') }}" class="hover:text-[#334336] transition">
                Beranda
            </a>

            <span class="text-[#B0B4AD]">/</span>

            <span class="text-[#52634F]">
                Booking
            </span>
        </div>


        <div class="mt-12 grid lg:grid-cols-12 gap-10 items-end">

            <div class="lg:col-span-8">

                {{-- Success indicator --}}
                <div class="inline-flex items-center gap-3">

                    <div class="w-9 h-9 rounded-full bg-[#334336] flex items-center justify-center">

                        <svg
                            class="w-4 h-4 text-white"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            stroke-width="2">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M5 13l4 4L19 7"/>
                        </svg>

                    </div>

                    <span class="text-[10px] uppercase tracking-[0.2em] font-medium text-[#52634F]">
                        Booking berhasil
                    </span>

                </div>


                <h1 class="mt-7 text-4xl sm:text-5xl lg:text-[4.5rem] leading-[0.98] tracking-[-0.055em] font-medium text-[#29352C]">
                    Petak Anda telah
                    <span class="text-[#71816B]">
                        ditahan.
                    </span>
                </h1>

                <p class="mt-7 max-w-2xl text-sm leading-7 text-[#737B72]">
                    Booking berhasil dibuat. Simpan kode booking Anda dan
                    lakukan pembayaran sebelum masa berlaku booking berakhir.
                </p>

            </div>


            {{-- Booking status --}}
            <div class="lg:col-span-4 lg:text-right">

                <p class="text-[10px] uppercase tracking-[0.2em] text-[#969B93]">
                    Status saat ini
                </p>

                @if($booking->status === 'BOOKED')

                    <div class="mt-3 inline-flex items-center gap-2 rounded-full bg-[#E4EBE1] px-5 py-2.5">

                        <span class="w-2 h-2 rounded-full bg-[#71816B]"></span>

                        <span class="text-[10px] uppercase tracking-[0.15em] font-medium text-[#52634F]">
                            Menunggu pembayaran
                        </span>

                    </div>

                @elseif($booking->status === 'CONFIRMED')

                    <div class="mt-3 inline-flex items-center gap-2 rounded-full bg-[#E4EBE1] px-5 py-2.5">

                        <span class="w-2 h-2 rounded-full bg-[#52634F]"></span>

                        <span class="text-[10px] uppercase tracking-[0.15em] font-medium text-[#52634F]">
                            Dikonfirmasi
                        </span>

                    </div>

                @elseif($booking->status === 'EXPIRED')

                    <div class="mt-3 inline-flex items-center gap-2 rounded-full bg-[#F1E4E0] px-5 py-2.5">

                        <span class="w-2 h-2 rounded-full bg-[#8A5A50]"></span>

                        <span class="text-[10px] uppercase tracking-[0.15em] font-medium text-[#8A5A50]">
                            Kedaluwarsa
                        </span>

                    </div>

                @else

                    <div class="mt-3 inline-flex items-center gap-2 rounded-full bg-[#E8E7E1] px-5 py-2.5">

                        <span class="text-[10px] uppercase tracking-[0.15em] font-medium text-[#737872]">
                            {{ $booking->status }}
                        </span>

                    </div>

                @endif

            </div>

        </div>

    </section>


    {{-- =========================================================
        BOOKING CODE + TIME
    ========================================================== --}}
    <section class="max-w-6xl mx-auto px-6 lg:px-10 pb-8">

        <div class="grid lg:grid-cols-12 gap-5">

            {{-- KODE BOOKING --}}
            <div class="lg:col-span-5">

                <div class="h-full min-h-[300px] relative overflow-hidden rounded-[2rem] bg-[#334336] p-8 sm:p-10 text-white">

                    {{-- Decorative landscape --}}
                    <div class="absolute -right-24 -bottom-24 w-72 h-72 rounded-full border border-white/10"></div>
                    <div class="absolute -right-10 -bottom-10 w-52 h-52 rounded-full border border-white/10"></div>

                    <div class="relative h-full flex flex-col">

                        <p class="text-[10px] uppercase tracking-[0.25em] text-white/45">
                            Kode booking
                        </p>

                        <p
                            id="bookingCode"
                            class="mt-8 text-3xl sm:text-[2.5rem] leading-tight font-semibold tracking-[0.06em] break-all">
                            {{ $booking->kode_booking }}
                        </p>


                        <button
                            type="button"
                            id="copyBookingCode"
                            class="mt-auto self-start inline-flex items-center gap-3 rounded-full border border-white/15 bg-white/5 px-5 py-3 text-xs text-white hover:bg-white/10 transition">

                            <svg
                                class="w-4 h-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2M16 20h2a2 2 0 002-2v-6a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                            </svg>

                            <span id="copyText">
                                Salin kode
                            </span>

                        </button>

                    </div>

                </div>

            </div>


            {{-- WAKTU BOOKING --}}
            <div class="lg:col-span-7">

                <div class="h-full bg-[#F8F7F3] border border-[#DCDCD4] rounded-[2rem] p-8 sm:p-10">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-[10px] uppercase tracking-[0.22em] text-[#8B9189]">
                                Masa berlaku booking
                            </p>

                            <h2 class="mt-2 text-2xl font-medium tracking-[-0.03em] text-[#334336]">
                                Waktu pemesanan
                            </h2>
                        </div>

                        <div class="w-10 h-10 rounded-full bg-[#EDE9DE] flex items-center justify-center">

                            <svg
                                class="w-5 h-5 text-[#60705C]"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.7"
                                    d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>

                        </div>

                    </div>


                    {{-- TIMELINE --}}
                    <div class="mt-9">

                        {{-- WAKTU BOOKING --}}
                        <div class="flex gap-5">

                            <div class="flex flex-col items-center">

                                <div class="w-3 h-3 rounded-full bg-[#52634F] ring-4 ring-[#E4EBE1]"></div>

                                <div class="w-px flex-1 bg-[#D7D8D1] mt-2"></div>

                            </div>

                            <div class="pb-8">

                                <p class="text-[10px] uppercase tracking-[0.16em] text-[#969B93]">
                                    Waktu booking
                                </p>

                                <p class="mt-2 text-lg font-medium text-[#4F5A50]">
                                    {{ $booking->booked_at->format('d F Y') }}
                                </p>

                                <p class="mt-1 text-sm text-[#71816B]">
                                    {{ $booking->booked_at->format('H:i') }}
                                    WITA
                                </p>

                            </div>

                        </div>


                        {{-- BATAS --}}
                        <div class="flex gap-5">

                            <div class="flex flex-col items-center">

                                <div class="w-3 h-3 rounded-full bg-[#B58B52] ring-4 ring-[#F1E9DC]"></div>

                            </div>

                            <div>

                                <p class="text-[10px] uppercase tracking-[0.16em] text-[#969B93]">
                                    Berlaku sampai
                                </p>

                                <p class="mt-2 text-lg font-medium text-[#4F5A50]">
                                    {{ $booking->expires_at->format('d F Y') }}
                                </p>

                                <p class="mt-1 text-sm text-[#8A775D]">
                                    {{ $booking->expires_at->format('H:i') }}
                                    WITA
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- DURATION --}}
                    <div class="mt-9 pt-6 border-t border-[#DDDCD4] flex items-center justify-between">

                        <span class="text-xs text-[#8A9088]">
                            Durasi penahanan petak
                        </span>

                        <span class="text-sm font-medium text-[#52634F]">
                            1 × 24 jam
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
        DETAIL PETAK + PEMESAN
    ========================================================== --}}
    <section class="max-w-6xl mx-auto px-6 lg:px-10 py-8">

        <div class="grid lg:grid-cols-2 gap-5">


            {{-- PETAK --}}
            <div class="bg-[#EDE9DE] rounded-[2rem] p-8 sm:p-10">

                <p class="text-[10px] uppercase tracking-[0.22em] text-[#8B9189]">
                    Petak yang dipilih
                </p>

                <div class="mt-7 flex items-end justify-between gap-5">

                    <div>

                        <p class="text-3xl sm:text-4xl font-semibold tracking-[-0.04em] text-[#334336]">
                            {{ $booking->plot->kode_plot }}
                        </p>

                        <p class="mt-2 text-sm text-[#71816B]">
                            {{ $booking->plot->category->nama_kategori }}
                        </p>

                    </div>

                    <div class="text-right">

                        <p class="text-[10px] uppercase tracking-[0.15em] text-[#969B93]">
                            Harga
                        </p>

                        <p class="mt-2 text-lg font-semibold text-[#52634F]">
                            Rp {{ number_format($booking->plot->harga, 0, ',', '.') }}
                        </p>

                    </div>

                </div>


                <div class="mt-8 pt-6 border-t border-[#D7D4C9] grid grid-cols-2 gap-6">

                    <div>

                        <p class="text-[10px] uppercase tracking-[0.15em] text-[#969B93]">
                            Jenis lahan
                        </p>

                        <p class="mt-2 text-sm font-medium text-[#52634F]">
                            {{ $booking->plot->jenis_lahan }}
                        </p>

                    </div>

                    <div>

                        <p class="text-[10px] uppercase tracking-[0.15em] text-[#969B93]">
                            Status petak
                        </p>

                        <p class="mt-2 text-sm font-medium text-[#52634F]">
                            {{ $booking->plot->status }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- DATA PEMESAN --}}
            <div class="bg-[#F8F7F3] border border-[#DCDCD4] rounded-[2rem] p-8 sm:p-10">

                <p class="text-[10px] uppercase tracking-[0.22em] text-[#8B9189]">
                    Informasi pemesan
                </p>

                <h2 class="mt-2 text-2xl font-medium tracking-[-0.03em] text-[#334336]">
                    Data Anda
                </h2>


                <div class="mt-8 space-y-6">

                    <div class="flex justify-between gap-5 border-b border-[#E0DFD8] pb-5">

                        <span class="text-xs text-[#969B93]">
                            Nama
                        </span>

                        <span class="text-sm font-medium text-[#4F5A50] text-right">
                            {{ $booking->nama_pemesan }}
                        </span>

                    </div>


                    <div class="flex justify-between gap-5 border-b border-[#E0DFD8] pb-5">

                        <span class="text-xs text-[#969B93]">
                            Nomor HP
                        </span>

                        <span class="text-sm font-medium text-[#4F5A50] text-right">
                            {{ $booking->no_hp }}
                        </span>

                    </div>


                    @if($booking->email)

                        <div class="flex justify-between gap-5 border-b border-[#E0DFD8] pb-5">

                            <span class="text-xs text-[#969B93]">
                                Email
                            </span>

                            <span class="text-sm font-medium text-[#4F5A50] text-right break-all">
                                {{ $booking->email }}
                            </span>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
        PAYMENT ACTION
    ========================================================== --}}
    <section class="max-w-6xl mx-auto px-6 lg:px-10 py-8 pb-20">

        @if($booking->status === 'BOOKED')

            <div class="rounded-[2rem] bg-[#334336] text-white p-8 sm:p-10">

                <div class="grid lg:grid-cols-12 gap-8 items-center">

                    <div class="lg:col-span-8">

                        <p class="text-[10px] uppercase tracking-[0.22em] text-white/40">
                            Langkah berikutnya
                        </p>

                        <h2 class="mt-3 text-2xl sm:text-3xl font-medium tracking-[-0.03em]">
                            Selesaikan pembayaran Anda.
                        </h2>

                        <p class="mt-3 max-w-xl text-sm leading-6 text-white/55">
                            Petak masih ditahan untuk Anda.
                            Lakukan pembayaran sebelum
                            {{ $booking->expires_at->format('d F Y, H:i') }} WITA
                            agar booking tetap berlaku.
                        </p>

                    </div>


                    <div class="lg:col-span-4 lg:text-right">

                        <a
                            href="{{ route('payment.create', $booking) }}"
                            class="inline-flex items-center justify-center gap-4 rounded-full bg-[#F4F1E9] px-7 py-4 text-sm font-medium text-[#334336] hover:bg-white transition">

                            Lanjutkan pembayaran

                            <span class="text-[#71816B]">
                                →
                            </span>

                        </a>

                    </div>

                </div>

            </div>


        @elseif($booking->status === 'CONFIRMED')

            <div class="rounded-[2rem] bg-[#E4EBE1] p-8 sm:p-10">

                <div class="flex items-start gap-5">

                    <div class="w-10 h-10 shrink-0 rounded-full bg-[#334336] flex items-center justify-center">

                        <svg
                            class="w-5 h-5 text-white"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 13l4 4L19 7"/>

                        </svg>

                    </div>

                    <div>

                        <p class="text-lg font-medium text-[#52634F]">
                            Booking telah dikonfirmasi
                        </p>

                        <p class="mt-2 text-sm leading-6 text-[#71816B]">
                            Pembayaran Anda telah diverifikasi oleh pengelola
                            Tanah Salama.
                        </p>

                    </div>

                </div>

            </div>


        @elseif($booking->status === 'EXPIRED')

            <div class="rounded-[2rem] bg-[#F1E4E0] p-8 sm:p-10">

                <p class="text-lg font-medium text-[#8A5A50]">
                    Masa booking telah berakhir
                </p>

                <p class="mt-2 text-sm leading-6 text-[#9B746D]">
                    Booking ini sudah melewati batas waktu pembayaran
                    dan petak telah dikembalikan menjadi tersedia.
                </p>

            </div>

        @endif

    </section>


    {{-- =========================================================
        BOTTOM NAVIGATION
    ========================================================== --}}
    <section class="border-t border-[#D8D6CE] bg-[#EDE9DE]">

        <div class="max-w-6xl mx-auto px-6 lg:px-10 py-12">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">

                <div>

                    <p class="text-[10px] uppercase tracking-[0.2em] text-[#8B9189]">
                        Tanah Salama
                    </p>

                    <p class="mt-2 text-sm text-[#71816B]">
                        Simpan kode booking Anda untuk kebutuhan selanjutnya.
                    </p>

                </div>


                <div class="flex flex-wrap gap-3">

                    <a
                        href="{{ route('booking.check') }}"
                        class="inline-flex items-center gap-3 rounded-full border border-[#BFC3BA] px-6 py-3.5 text-xs font-medium text-[#52634F] hover:bg-white transition">

                        Cek booking

                        <span>→</span>

                    </a>


                    
                </div>

            </div>

        </div>

    </section>

</div>


{{-- =========================================================
    COPY BOOKING CODE
========================================================= --}}
<script>

document.addEventListener('DOMContentLoaded', function () {

    const button = document.getElementById('copyBookingCode');
    const code = document.getElementById('bookingCode');
    const text = document.getElementById('copyText');

    if (!button || !code || !text) {
        return;
    }

    button.addEventListener('click', async function () {

        try {

            await navigator.clipboard.writeText(
                code.textContent.trim()
            );

            text.textContent = 'Kode berhasil disalin';

            setTimeout(function () {
                text.textContent = 'Salin kode';
            }, 2500);

        } catch (error) {

            text.textContent = 'Gagal menyalin';

            setTimeout(function () {
                text.textContent = 'Salin kode';
            }, 2500);

        }

    });

});

</script>

@endsection