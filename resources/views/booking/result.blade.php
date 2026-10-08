@extends('layouts.app')

@section('title', 'Detail Booking')

@section('content')

<div class="min-h-screen bg-gray-50 py-10">

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- ========================================================= --}}
        {{-- HEADER --}}
        {{-- ========================================================= --}}
        <div class="mb-6">
            <a href="{{ route('home') }}"
               class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-gray-900 transition">

                <svg class="w-4 h-4"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M15 19l-7-7 7-7"/>
                </svg>

                Kembali ke Beranda
            </a>
        </div>


        {{-- ========================================================= --}}
        {{-- ALERT SUCCESS --}}
        {{-- ========================================================= --}}
        @if(session('success'))
            <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-4">
                <div class="flex items-start gap-3">

                    <svg class="w-6 h-6 text-emerald-600 flex-shrink-0"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M5 13l4 4L19 7"/>
                    </svg>

                    <div>
                        <p class="font-semibold text-emerald-800">
                            Berhasil
                        </p>

                        <p class="text-sm text-emerald-700 mt-1">
                            {{ session('success') }}
                        </p>
                    </div>

                </div>
            </div>
        @endif


        {{-- ========================================================= --}}
        {{-- ALERT ERROR --}}
        {{-- ========================================================= --}}
        @if(session('error'))
            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4">
                <div class="flex items-start gap-3">

                    <svg class="w-6 h-6 text-red-600 flex-shrink-0"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>

                    <div>
                        <p class="font-semibold text-red-800">
                            Terjadi Kesalahan
                        </p>

                        <p class="text-sm text-red-700 mt-1">
                            {{ session('error') }}
                        </p>
                    </div>

                </div>
            </div>
        @endif


        {{-- ========================================================= --}}
        {{-- DATA PERHITUNGAN PEMBAYARAN --}}
        {{-- ========================================================= --}}
        @php

            /*
            |--------------------------------------------------------------------------
            | TOTAL PEMBAYARAN YANG SUDAH DIVERIFIKASI
            |--------------------------------------------------------------------------
            */

            $totalPembayaranVerified = 0;

            if (isset($booking->payments)) {
                $totalPembayaranVerified = $booking->payments
                    ->where('status', 'VERIFIED')
                    ->sum('jumlah');
            }


            /*
            |--------------------------------------------------------------------------
            | HARGA PETAK DARI KATEGORI
            |--------------------------------------------------------------------------
            |
            | Harga tidak lagi diambil dari plot.harga.
            | Semua petak dalam kategori memiliki harga yang sama.
            |
            */

            $hargaCash = (float) (
                $booking->plot->category->harga_cash ?? 0
            );


            /*
            |--------------------------------------------------------------------------
            | SISA PEMBAYARAN
            |--------------------------------------------------------------------------
            */

            $sisaPembayaran = max(
                0,
                $hargaCash - (float) $totalPembayaranVerified
            );


            /*
            |--------------------------------------------------------------------------
            | STATUS LUNAS
            |--------------------------------------------------------------------------
            */

            $sudahLunas = $sisaPembayaran <= 0;


            /*
            |--------------------------------------------------------------------------
            | STATUS BOOKING
            |--------------------------------------------------------------------------
            */

            $status = strtoupper($booking->status ?? '');


            $statusClass = match ($status) {

                'BOOKED'
                    => 'bg-amber-100 text-amber-700',

                'CONFIRMED'
                    => 'bg-blue-100 text-blue-700',

                'EXPIRED'
                    => 'bg-gray-100 text-gray-600',

                'CANCELLED'
                    => 'bg-red-100 text-red-700',

                default
                    => 'bg-gray-100 text-gray-600',
            };


            $statusText = match ($status) {

                'BOOKED'
                    => 'Menunggu Pembayaran',

                'CONFIRMED'
                    => 'Booking Dikonfirmasi',

                'EXPIRED'
                    => 'Booking Kedaluwarsa',

                'CANCELLED'
                    => 'Booking Dibatalkan',

                default
                    => $status ?: 'Tidak Diketahui',
            };

        @endphp


        {{-- ========================================================= --}}
        {{-- JUDUL --}}
        {{-- ========================================================= --}}
        <div class="mb-6">

            <p class="text-sm font-semibold uppercase tracking-wider text-emerald-600">
                Tanah Salama
            </p>

            <h1 class="mt-1 text-3xl font-bold text-gray-900">
                Detail Booking
            </h1>

            <p class="mt-2 text-gray-500">
                Simpan kode booking Anda untuk mengecek status pemesanan dan pembayaran.
            </p>

        </div>


        {{-- ========================================================= --}}
        {{-- STATUS BOOKING --}}
        {{-- ========================================================= --}}
        <div class="rounded-3xl bg-white shadow-sm border border-gray-100 overflow-hidden mb-6">

            <div class="p-6 sm:p-8">

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

                    <div>

                        <p class="text-sm text-gray-500">
                            Kode Booking
                        </p>

                        <div class="flex items-center gap-3 mt-2">

                            <h2 id="kodeBooking"
                                class="text-2xl sm:text-3xl font-bold tracking-wide text-gray-900">

                                {{ $booking->kode_booking }}

                            </h2>


                            <button type="button"
                                    onclick="copyBookingCode()"
                                    class="inline-flex items-center justify-center rounded-xl border border-gray-200 bg-white p-2.5 text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition"
                                    title="Salin kode booking">

                                <svg class="w-5 h-5"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <rect x="9"
                                          y="9"
                                          width="11"
                                          height="11"
                                          rx="2"
                                          stroke-width="2"/>

                                    <path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"
                                          stroke-width="2"
                                          stroke-linecap="round"/>

                                </svg>

                            </button>

                        </div>


                        <p id="copyMessage"
                           class="hidden mt-2 text-xs font-medium text-emerald-600">

                            Kode booking berhasil disalin.

                        </p>

                    </div>


                    {{-- STATUS --}}
                    <div>

                        <span class="inline-flex items-center rounded-full px-4 py-2 text-sm font-bold {{ $statusClass }}">
                            {{ $statusText }}
                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- COUNTDOWN BOOKING --}}
        {{-- ========================================================= --}}
        @if($booking->status === 'BOOKED')

            <div class="rounded-3xl border border-amber-200 bg-amber-50 p-6 mb-6">

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

                    <div>

                        <p class="font-bold text-amber-900">
                            Batas Waktu Booking
                        </p>

                        <p class="text-sm text-amber-700 mt-1">
                            Segera lakukan pembayaran sebelum waktu booking berakhir.
                        </p>

                    </div>


                    <div id="countdown"
                         class="text-2xl font-bold text-amber-900">

                        Memuat...

                    </div>

                </div>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- INFORMASI PETAK --}}
        {{-- ========================================================= --}}
        <div class="rounded-3xl bg-white border border-gray-100 shadow-sm p-6 sm:p-8 mb-6">

            <div class="flex items-center justify-between mb-6">

                <div>

                    <p class="text-sm font-semibold text-emerald-600">
                        Informasi Pemakaman
                    </p>

                    <h2 class="text-xl font-bold text-gray-900 mt-1">
                        Detail Petak
                    </h2>

                </div>

            </div>


            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                {{-- KODE PETAK --}}
                <div class="rounded-2xl bg-gray-50 p-4">

                    <p class="text-xs text-gray-500">
                        Kode Petak
                    </p>

                    <p class="mt-1 text-lg font-bold text-gray-900">
                        {{ $booking->plot->kode_plot ?? '-' }}
                    </p>

                </div>


                {{-- KATEGORI --}}
                <div class="rounded-2xl bg-gray-50 p-4">

                    <p class="text-xs text-gray-500">
                        Kategori
                    </p>

                    <p class="mt-1 text-lg font-bold text-gray-900">
                        {{ $booking->plot->category->nama_kategori ?? '-' }}
                    </p>

                </div>


                {{-- JENIS LAHAN --}}
                <div class="rounded-2xl bg-gray-50 p-4">

                    <p class="text-xs text-gray-500">
                        Jenis Lahan
                    </p>

                    <p class="mt-1 text-lg font-bold text-gray-900">
                        {{ $booking->plot->jenis_lahan ?? '-' }}
                    </p>

                </div>


                {{-- STATUS PETAK --}}
                <div class="rounded-2xl bg-gray-50 p-4">

                    <p class="text-xs text-gray-500">
                        Status Petak
                    </p>

                    <p class="mt-1 text-lg font-bold text-gray-900">
                        {{ $booking->plot->status ?? '-' }}
                    </p>

                </div>

            </div>


            {{-- DESKRIPSI --}}
            @if($booking->plot->deskripsi)

                <div class="mt-5 rounded-2xl bg-gray-50 p-4">

                    <p class="text-xs text-gray-500">
                        Deskripsi
                    </p>

                    <p class="mt-1 text-sm text-gray-700 leading-relaxed">
                        {{ $booking->plot->deskripsi }}
                    </p>

                </div>

            @endif

        </div>


        {{-- ========================================================= --}}
        {{-- INFORMASI CUSTOMER --}}
        {{-- ========================================================= --}}
        <div class="rounded-3xl bg-white border border-gray-100 shadow-sm p-6 sm:p-8 mb-6">

            <div class="mb-6">

                <p class="text-sm font-semibold text-emerald-600">
                    Data Pemesan
                </p>

                <h2 class="text-xl font-bold text-gray-900 mt-1">
                    Informasi Customer
                </h2>

            </div>


            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                {{-- NAMA --}}
                <div>

                    <p class="text-xs text-gray-500">
                        Nama
                    </p>

                    <p class="mt-1 font-semibold text-gray-900">
                        {{ $booking->nama_pemesan ?? '-' }}
                    </p>

                </div>


                {{-- NOMOR HP --}}
                <div>

                    <p class="text-xs text-gray-500">
                        Nomor HP
                    </p>

                    <p class="mt-1 font-semibold text-gray-900">
                        {{ $booking->no_hp ?? '-' }}
                    </p>

                </div>


                {{-- EMAIL --}}
                <div>

                    <p class="text-xs text-gray-500">
                        Email
                    </p>

                    <p class="mt-1 font-semibold text-gray-900">
                        {{ $booking->email ?? '-' }}
                    </p>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- RINGKASAN PEMBAYARAN --}}
        {{-- ========================================================= --}}
        @if($booking->status === 'CONFIRMED')

            <div class="rounded-3xl bg-white border border-gray-100 shadow-sm p-6 sm:p-8 mb-6">

                <div class="mb-6">

                    <p class="text-sm font-semibold text-emerald-600">
                        Informasi Pembayaran
                    </p>

                    <h2 class="text-xl font-bold text-gray-900 mt-1">
                        Ringkasan Pembayaran
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Informasi pembayaran untuk petak yang Anda booking.
                    </p>

                </div>


                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                    {{-- HARGA KATEGORI --}}
                    <div class="rounded-2xl bg-gray-50 p-5">

                        <p class="text-xs text-gray-500">
                            Harga Petak
                        </p>

                        <p class="mt-2 text-xl font-bold text-gray-900">
                            Rp {{ number_format($hargaCash, 0, ',', '.') }}
                        </p>

                        <p class="mt-1 text-xs text-gray-500">
                            Berdasarkan harga kategori
                        </p>

                    </div>


                    {{-- SUDAH DIBAYAR --}}
                    <div class="rounded-2xl bg-gray-50 p-5">

                        <p class="text-xs text-gray-500">
                            Sudah Dibayar
                        </p>

                        <p class="mt-2 text-xl font-bold text-emerald-600">
                            Rp {{ number_format($totalPembayaranVerified, 0, ',', '.') }}
                        </p>

                    </div>


                    {{-- SISA --}}
                    <div class="rounded-2xl {{ $sudahLunas ? 'bg-emerald-50' : 'bg-amber-50' }} p-5">

                        <p class="text-xs {{ $sudahLunas ? 'text-emerald-600' : 'text-amber-600' }}">
                            Sisa Pembayaran
                        </p>

                        <p class="mt-2 text-xl font-bold {{ $sudahLunas ? 'text-emerald-700' : 'text-amber-700' }}">
                            Rp {{ number_format($sisaPembayaran, 0, ',', '.') }}
                        </p>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- TOMBOL PELUNASAN --}}
                {{-- ================================================= --}}
                @if(!$sudahLunas)

                    <div class="mt-6 rounded-2xl border border-amber-200 bg-amber-50 p-5">

                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

                            <div>

                                <p class="font-bold text-amber-900">
                                    Pembayaran Belum Lunas
                                </p>

                                <p class="text-sm text-amber-700 mt-1">
                                    Masih terdapat sisa pembayaran sebesar
                                    <strong>
                                        Rp {{ number_format($sisaPembayaran, 0, ',', '.') }}
                                    </strong>.
                                </p>

                                <p class="text-xs text-amber-600 mt-2">
                                    Silakan lakukan pembayaran pelunasan untuk menyelesaikan transaksi.
                                </p>

                            </div>


                            <a href="{{ route('payment.create', ['booking' => $booking, 'jenis' => 'PELUNASAN']) }}"
                               class="inline-flex items-center justify-center gap-2 rounded-xl bg-amber-600 px-6 py-3 font-bold text-white shadow-sm transition hover:bg-amber-700">

                                <svg class="w-5 h-5"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M12 8v4l3 3m9-3a9 9 0 11-18 0 9 9 0 0118 0z"/>

                                </svg>

                                Bayar Pelunasan

                            </a>

                        </div>

                    </div>

                @else

                    {{-- SUDAH LUNAS --}}
                    <div class="mt-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-5">

                        <div class="flex items-start gap-3">

                            <svg class="w-6 h-6 text-emerald-600 flex-shrink-0"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5 13l4 4L19 7"/>

                            </svg>


                            <div>

                                <p class="font-bold text-emerald-800">
                                    Pembayaran Telah Lunas
                                </p>

                                <p class="text-sm text-emerald-700 mt-1">
                                    Seluruh pembayaran untuk petak ini telah diverifikasi.
                                </p>

                            </div>

                        </div>

                    </div>

                @endif

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- PEMBAYARAN CICILAN --}}
        {{-- ========================================================= --}}
        @if(isset($cicilanPayments) && $cicilanPayments->count() > 0)

            <div class="rounded-3xl bg-white border border-gray-100 shadow-sm p-6 sm:p-8 mb-6">

                {{-- HEADER --}}
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

                    <div>

                        <p class="text-sm font-semibold text-emerald-600">
                            Pembayaran
                        </p>

                        <h2 class="text-xl font-bold text-gray-900 mt-1">
                            Pembayaran Cicilan
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            Kelola pembayaran cicilan untuk petak yang Anda booking.
                        </p>

                    </div>


                    @if($tenor)

                        <div class="rounded-2xl bg-emerald-50 px-5 py-3 text-center">

                            <p class="text-xs text-emerald-600">
                                Progress Cicilan
                            </p>

                            <p class="text-xl font-bold text-emerald-700 mt-1">
                                {{ $jumlahCicilanTerbayar }} / {{ $tenor }}
                            </p>

                        </div>

                    @endif

                </div>


                {{-- PROGRESS BAR --}}
                @if($tenor)

                    @php
                        $progressCicilan = $tenor > 0
                            ? min(100, ($jumlahCicilanTerbayar / $tenor) * 100)
                            : 0;
                    @endphp

                    <div class="mb-7">

                        <div class="h-3 w-full rounded-full bg-gray-100 overflow-hidden">

                            <div class="h-full rounded-full bg-emerald-500 transition-all duration-500"
                                 style="width: {{ $progressCicilan }}%">
                            </div>

                        </div>


                        <div class="flex justify-between mt-2 text-xs text-gray-500">

                            <span>
                                {{ $jumlahCicilanTerbayar }} cicilan terbayar
                            </span>

                            <span>
                                {{ $tenor }} bulan
                            </span>

                        </div>

                    </div>

                @endif


                {{-- INFORMASI CICILAN --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

                    <div class="rounded-2xl bg-gray-50 p-5">

                        <p class="text-xs text-gray-500">
                            Cicilan Terbayar
                        </p>

                        <p class="mt-2 text-2xl font-bold text-gray-900">
                            {{ $jumlahCicilanTerbayar }}
                        </p>

                    </div>


                    <div class="rounded-2xl bg-gray-50 p-5">

                        <p class="text-xs text-gray-500">
                            Tenor
                        </p>

                        <p class="mt-2 text-2xl font-bold text-gray-900">

                            @if($tenor)
                                {{ $tenor }} Bulan
                            @else
                                -
                            @endif

                        </p>

                    </div>


                    <div class="rounded-2xl bg-gray-50 p-5">

                        <p class="text-xs text-gray-500">
                            Cicilan Berikutnya
                        </p>

                        <p class="mt-2 text-2xl font-bold text-gray-900">

                            @if($cicilanBerikutnya)
                                Ke-{{ $cicilanBerikutnya }}
                            @else
                                Lunas
                            @endif

                        </p>

                    </div>

                </div>


                {{-- JATUH TEMPO --}}
                @if($jatuhTempoBerikutnya)

                    <div class="mb-6 rounded-2xl border border-amber-200 bg-amber-50 p-5">

                        <div class="flex items-start gap-3">

                            <svg class="w-6 h-6 text-amber-600 flex-shrink-0"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>

                            </svg>


                            <div>

                                <p class="font-bold text-amber-900">
                                    Jatuh Tempo Berikutnya
                                </p>

                                <p class="text-sm text-amber-700 mt-1">
                                    {{ $jatuhTempoBerikutnya->format('d F Y') }}
                                </p>

                            </div>

                        </div>

                    </div>

                @endif


                {{-- ================================================= --}}
                {{-- TOMBOL PEMBAYARAN CICILAN --}}
                {{-- ================================================= --}}
                @if($jumlahCicilanPending > 0)

                    {{-- MASIH MENUNGGU VERIFIKASI --}}
                    <div class="rounded-2xl border border-blue-200 bg-blue-50 p-5">

                        <div class="flex items-start gap-3">

                            <svg class="w-6 h-6 text-blue-600 flex-shrink-0"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>

                            </svg>


                            <div>

                                <p class="font-bold text-blue-800">
                                    Pembayaran Sedang Diverifikasi
                                </p>

                                <p class="text-sm text-blue-700 mt-1">
                                    Pembayaran cicilan Anda sedang diperiksa oleh admin.
                                    Silakan tunggu sampai pembayaran diverifikasi.
                                </p>

                            </div>

                        </div>

                    </div>


                @elseif($cicilanBerikutnya && $booking->status === 'CONFIRMED')

                    {{-- TOMBOL BAYAR CICILAN --}}
                    <div class="rounded-2xl border border-emerald-200 bg-emerald-50 p-5">

                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5">

                            <div>

                                <p class="font-bold text-emerald-900">
                                    Cicilan ke-{{ $cicilanBerikutnya }} Sudah Dapat Dibayar
                                </p>

                                <p class="text-sm text-emerald-700 mt-1">
                                    Silakan lakukan pembayaran cicilan berikutnya.
                                </p>

                            </div>


                            <a href="{{ route('payment.installment', $booking) }}"
                               class="inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-6 py-3 font-bold text-white shadow-sm transition hover:bg-emerald-700">

                                <svg class="w-5 h-5"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M12 8v4l3 3m9-3a9 9 0 11-18 0 9 9 0 0118 0z"/>

                                </svg>

                                Bayar Cicilan ke-{{ $cicilanBerikutnya }}

                            </a>

                        </div>

                    </div>


                @elseif(!$cicilanBerikutnya)

                    {{-- LUNAS --}}
                    <div class="rounded-2xl border border-emerald-200 bg-emerald-50 p-5">

                        <div class="flex items-start gap-3">

                            <svg class="w-6 h-6 text-emerald-600 flex-shrink-0"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5 13l4 4L19 7"/>

                            </svg>


                            <div>

                                <p class="font-bold text-emerald-800">
                                    Cicilan Telah Lunas
                                </p>

                                <p class="text-sm text-emerald-700 mt-1">
                                    Seluruh cicilan untuk booking ini telah dibayar.
                                </p>

                            </div>

                        </div>

                    </div>

                @endif


                {{-- ================================================= --}}
                {{-- RIWAYAT CICILAN --}}
                {{-- ================================================= --}}
                <div class="mt-8">

                    <div class="flex items-center justify-between mb-4">

                        <h3 class="text-lg font-bold text-gray-900">
                            Riwayat Pembayaran Cicilan
                        </h3>

                    </div>


                    <div class="space-y-3">

                        @foreach($cicilanPayments as $payment)

                            @php

                                $paymentStatus = strtoupper(
                                    $payment->status ?? ''
                                );


                                $paymentStatusClass = match ($paymentStatus) {

                                    'VERIFIED'
                                        => 'bg-emerald-100 text-emerald-700',

                                    'SUBMITTED'
                                        => 'bg-amber-100 text-amber-700',

                                    'REJECTED'
                                        => 'bg-red-100 text-red-700',

                                    default
                                        => 'bg-gray-100 text-gray-600',
                                };


                                $paymentStatusText = match ($paymentStatus) {

                                    'VERIFIED'
                                        => 'Terverifikasi',

                                    'SUBMITTED'
                                        => 'Menunggu Verifikasi',

                                    'REJECTED'
                                        => 'Ditolak',

                                    default
                                        => $paymentStatus ?: 'Tidak Diketahui',
                                };

                            @endphp


                            <div class="rounded-2xl border border-gray-100 bg-gray-50 p-5">

                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                                    <div>

                                        <p class="font-bold text-gray-900">
                                            Cicilan ke-{{ $payment->cicilan_ke ?? 1 }}
                                        </p>

                                        <p class="text-sm text-gray-500 mt-1">

                                            {{ $payment->tanggal_pembayaran
                                                ? $payment->tanggal_pembayaran->format('d F Y')
                                                : '-' }}

                                        </p>


                                        @if($payment->metode_pembayaran)

                                            <p class="text-xs text-gray-500 mt-1">
                                                {{ $payment->metode_pembayaran }}
                                            </p>

                                        @endif

                                    </div>


                                    <div class="sm:text-right">

                                        <p class="text-lg font-bold text-gray-900">
                                            Rp {{ number_format($payment->jumlah, 0, ',', '.') }}
                                        </p>


                                        <span class="inline-flex mt-2 rounded-full px-3 py-1 text-xs font-semibold {{ $paymentStatusClass }}">
                                            {{ $paymentStatusText }}
                                        </span>

                                    </div>

                                </div>


                                @if($payment->status === 'REJECTED' && $payment->catatan_admin)

                                    <div class="mt-4 rounded-xl border border-red-200 bg-red-50 p-4">

                                        <p class="text-xs font-bold text-red-700">
                                            Alasan Penolakan
                                        </p>

                                        <p class="text-sm text-red-700 mt-1">
                                            {{ $payment->catatan_admin }}
                                        </p>

                                    </div>

                                @endif

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- TOMBOL PEMBAYARAN AWAL --}}
        {{-- ========================================================= --}}
        @if($booking->status === 'BOOKED')

            <div class="rounded-3xl bg-white border border-gray-100 shadow-sm p-6 sm:p-8 mb-6">

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

                    <div>

                        <h2 class="text-lg font-bold text-gray-900">
                            Lakukan Pembayaran
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            Selesaikan pembayaran booking Anda untuk mengonfirmasi pemesanan.
                        </p>

                    </div>


                    <a href="{{ route('payment.create', $booking) }}"
                       class="inline-flex items-center justify-center gap-2 rounded-xl bg-gray-900 px-6 py-3 font-bold text-white transition hover:bg-gray-800">

                        <svg class="w-5 h-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 8v4l3 3m9-3a9 9 0 11-18 0 9 9 0 0118 0z"/>

                        </svg>

                        Bayar Sekarang

                    </a>

                </div>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- CHAT ADMIN --}}
        {{-- ========================================================= --}}
        <div class="rounded-3xl bg-gray-900 p-6 sm:p-8 text-white mb-6">

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

                <div>

                    <p class="text-sm font-semibold text-emerald-400">
                        Butuh Bantuan?
                    </p>

                    <h2 class="text-xl font-bold mt-1">
                        Hubungi Admin Tanah Salama
                    </h2>

                    <p class="text-sm text-gray-400 mt-2">
                        Jika ada kendala mengenai booking atau pembayaran,
                        Anda dapat menghubungi admin.
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- JAVASCRIPT --}}
{{-- ========================================================= --}}
<script>

    /*
    |--------------------------------------------------------------------------
    | COPY KODE BOOKING
    |--------------------------------------------------------------------------
    */

    function copyBookingCode() {

        const kodeElement = document.getElementById('kodeBooking');
        const message = document.getElementById('copyMessage');

        if (!kodeElement) {
            return;
        }

        const kode = kodeElement.innerText.trim();


        function showCopyMessage() {

            if (!message) {
                return;
            }

            message.classList.remove('hidden');

            setTimeout(function () {
                message.classList.add('hidden');
            }, 2500);

        }


        if (
            navigator.clipboard &&
            window.isSecureContext
        ) {

            navigator.clipboard
                .writeText(kode)
                .then(function () {

                    showCopyMessage();

                })
                .catch(function () {

                    fallbackCopy(kode);

                });

        } else {

            fallbackCopy(kode);

        }

    }


    /*
    |--------------------------------------------------------------------------
    | FALLBACK COPY
    |--------------------------------------------------------------------------
    */

    function fallbackCopy(kode) {

        const textarea = document.createElement('textarea');

        textarea.value = kode;

        textarea.style.position = 'fixed';
        textarea.style.left = '-9999px';
        textarea.style.top = '0';

        document.body.appendChild(textarea);

        textarea.focus();
        textarea.select();


        try {

            document.execCommand('copy');

            const message = document.getElementById('copyMessage');

            if (message) {

                message.classList.remove('hidden');

                setTimeout(function () {

                    message.classList.add('hidden');

                }, 2500);

            }

        } catch (error) {

            alert('Kode booking: ' + kode);

        }


        document.body.removeChild(textarea);

    }


    /*
    |--------------------------------------------------------------------------
    | COUNTDOWN BOOKING
    |--------------------------------------------------------------------------
    */

    @if($booking->status === 'BOOKED' && $booking->expires_at)

        const expiresAt = new Date(
            "{{ $booking->expires_at->format('Y-m-d\TH:i:s') }}"
        ).getTime();


        const countdownElement =
            document.getElementById('countdown');


        function updateCountdown() {

            if (!countdownElement) {
                return;
            }


            const now = new Date().getTime();

            const distance = expiresAt - now;


            if (distance <= 0) {

                countdownElement.innerHTML =
                    'Booking telah berakhir';

                countdownElement.classList.remove(
                    'text-amber-900'
                );

                countdownElement.classList.add(
                    'text-red-600'
                );

                return;

            }


            const days = Math.floor(
                distance / (1000 * 60 * 60 * 24)
            );


            const hours = Math.floor(
                (distance % (1000 * 60 * 60 * 24))
                / (1000 * 60 * 60)
            );


            const minutes = Math.floor(
                (distance % (1000 * 60 * 60))
                / (1000 * 60)
            );


            const seconds = Math.floor(
                (distance % (1000 * 60))
                / 1000
            );


            countdownElement.innerHTML =
                `${days} Hari ${hours} Jam ${minutes} Menit ${seconds} Detik`;

        }


        updateCountdown();

        setInterval(updateCountdown, 1000);

    @endif

</script>

@endsection