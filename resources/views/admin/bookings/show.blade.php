@extends('layouts.app')

@section('title', 'Detail Booking - Admin Tanah Salama')

@section('content')

@php
    /*
    |--------------------------------------------------------------------------
    | DATA PEMBAYARAN
    |--------------------------------------------------------------------------
    */

    $payments = $booking->payments->sortByDesc('created_at');

    $cicilanPayments = $booking->payments
        ->where('jenis_pembayaran', 'CICILAN')
        ->sortBy('cicilan_ke');

    $cicilanVerified = $cicilanPayments
        ->where('status', 'VERIFIED');

    $cicilanSubmitted = $cicilanPayments
        ->where('status', 'SUBMITTED');

    $tenorCicilan = $cicilanPayments->first()?->tenor;

    $jumlahCicilanVerified = $cicilanVerified->count();

    $totalCicilanDibayar = $cicilanVerified->sum('jumlah');

    $cicilanBerikutnya = $jumlahCicilanVerified + 1;

    $progressCicilan = $tenorCicilan && $tenorCicilan > 0
        ? min(($jumlahCicilanVerified / $tenorCicilan) * 100, 100)
        : 0;

    /*
    |--------------------------------------------------------------------------
    | HARGA PETAK
    |--------------------------------------------------------------------------
    | Harga petak mengikuti harga Cash / Lunas dari kategori.
    */

    $hargaPetak = (float) (
        $booking->plot->category->harga_cash ?? 0
    );
@endphp

<div class="min-h-screen bg-[#F7F5EF] px-6 py-28">

    <div class="max-w-6xl mx-auto">

        {{-- =========================================================
        HEADER
        ========================================================== --}}

        <div class="mb-8">

            <a
                href="{{ route('admin.bookings.index') }}"
                class="inline-flex items-center text-sm text-gray-500 hover:text-[#173528] transition"
            >
                ← Kembali ke Daftar Booking
            </a>

            <div class="mt-5 flex flex-col md:flex-row md:items-end md:justify-between gap-4">

                <div>

                    <p class="text-sm text-[#A0834E] font-medium uppercase tracking-widest">
                        Detail Booking
                    </p>

                    <h1 class="mt-2 font-serif text-3xl md:text-4xl text-[#173528]">
                        {{ $booking->kode_booking }}
                    </h1>

                    <p class="mt-2 text-gray-500">
                        Informasi lengkap pemesanan petak makam.
                    </p>

                </div>

                {{-- STATUS BOOKING --}}

                <div>

                    @if($booking->status === 'BOOKED')

                        <span class="inline-flex items-center rounded-full bg-[#FFF3C4] px-4 py-2 text-sm font-medium text-[#806A16]">
                            BOOKED
                        </span>

                    @elseif($booking->status === 'CONFIRMED')

                        <span class="inline-flex items-center rounded-full bg-[#DDEFE3] px-4 py-2 text-sm font-medium text-[#245B3E]">
                            CONFIRMED
                        </span>

                    @elseif($booking->status === 'EXPIRED')

                        <span class="inline-flex items-center rounded-full bg-[#F1F1F1] px-4 py-2 text-sm font-medium text-gray-600">
                            EXPIRED
                        </span>

                    @else

                        <span class="inline-flex items-center rounded-full bg-[#EBCACA] px-4 py-2 text-sm font-medium text-[#8A3D3D]">
                            CANCELLED
                        </span>

                    @endif

                </div>

            </div>

        </div>


        {{-- =========================================================
        FLASH MESSAGE
        ========================================================== --}}

        @if(session('success'))

            <div class="mb-6 rounded-2xl bg-green-50 border border-green-200 px-5 py-4 text-sm text-green-700">
                {{ session('success') }}
            </div>

        @endif

        @if(session('error'))

            <div class="mb-6 rounded-2xl bg-red-50 border border-red-200 px-5 py-4 text-sm text-red-700">
                {{ session('error') }}
            </div>

        @endif


        {{-- =========================================================
        MAIN GRID
        ========================================================== --}}

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- =====================================================
            KOLOM UTAMA
            ====================================================== --}}

            <div class="lg:col-span-2 space-y-6">


                {{-- =================================================
                INFORMASI PEMESAN
                ================================================== --}}

                <div class="bg-white border border-[#E5E0D5] rounded-3xl shadow-sm p-6 md:p-8">

                    <div class="mb-6">

                        <p class="text-xs text-[#A0834E] uppercase tracking-widest font-medium">
                            Informasi Pemesan
                        </p>

                        <h2 class="mt-2 font-serif text-2xl text-[#173528]">
                            Data Pelanggan
                        </h2>

                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- NAMA --}}

                        <div>

                            <p class="text-xs text-gray-500">
                                Nama Pemesan
                            </p>

                            <p class="mt-1 font-medium text-gray-800">
                                {{ $booking->nama_pemesan }}
                            </p>

                        </div>


                        {{-- NO HP --}}

                        <div>

                            <p class="text-xs text-gray-500">
                                Nomor HP
                            </p>

                            <p class="mt-1 font-medium text-gray-800">
                                {{ $booking->no_hp }}
                            </p>

                        </div>


                        {{-- EMAIL --}}

                        <div>

                            <p class="text-xs text-gray-500">
                                Email
                            </p>

                            <p class="mt-1 font-medium text-gray-800">
                                {{ $booking->email ?: '-' }}
                            </p>

                        </div>


                        {{-- KODE BOOKING --}}

                        <div>

                            <p class="text-xs text-gray-500">
                                Kode Booking
                            </p>

                            <p class="mt-1 font-medium text-[#173528]">
                                {{ $booking->kode_booking }}
                            </p>

                        </div>


                        {{-- FOTO KTP --}}

                        <div>

                            <p class="text-xs uppercase tracking-wider text-gray-500 mb-1">
                                Foto KTP
                            </p>

                            @if($booking->foto_ktp)

                                <a
                                    href="{{ route('admin.bookings.ktp', $booking) }}"
                                    target="_blank"
                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-[#C8A96B] text-[#A0834E] text-sm font-semibold hover:bg-[#C8A96B] hover:text-white transition"
                                >
                                    Lihat Foto KTP
                                </a>

                            @else

                                <p class="text-sm text-gray-400">
                                    Foto KTP belum tersedia.
                                </p>

                            @endif

                        </div>

                    </div>

                </div>


                {{-- =================================================
                INFORMASI PETAK
                ================================================== --}}

                <div class="bg-white border border-[#E5E0D5] rounded-3xl shadow-sm p-6 md:p-8">

                    <div class="mb-6">

                        <p class="text-xs text-[#A0834E] uppercase tracking-widest font-medium">
                            Informasi Petak
                        </p>

                        <h2 class="mt-2 font-serif text-2xl text-[#173528]">
                            Detail Petak Makam
                        </h2>

                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- KODE PLOT --}}

                        <div>

                            <p class="text-xs text-gray-500">
                                Kode Petak
                            </p>

                            <p class="mt-1 text-lg font-medium text-[#173528]">
                                {{ $booking->plot->kode_plot }}
                            </p>

                        </div>


                        {{-- KATEGORI --}}

                        <div>

                            <p class="text-xs text-gray-500">
                                Kategori
                            </p>

                            <p class="mt-1 font-medium text-gray-800">
                                {{ $booking->plot->category->nama_kategori ?? '-' }}
                            </p>

                        </div>


                        {{-- JENIS LAHAN --}}

                        <div>

                            <p class="text-xs text-gray-500">
                                Jenis Lahan
                            </p>

                            <p class="mt-1 font-medium text-gray-800">
                                {{ $booking->plot->jenis_lahan }}
                            </p>

                        </div>


                        {{-- STATUS PLOT --}}

                        <div>

                            <p class="text-xs text-gray-500">
                                Status Petak Saat Ini
                            </p>

                            @if($booking->plot->status === 'AVAILABLE')

                                <p class="mt-1 font-medium text-[#245B3E]">
                                    AVAILABLE
                                </p>

                            @elseif($booking->plot->status === 'BOOKED')

                                <p class="mt-1 font-medium text-[#806A16]">
                                    BOOKED
                                </p>

                            @else

                                <p class="mt-1 font-medium text-[#8A3D3D]">
                                    OCCUPIED
                                </p>

                            @endif

                        </div>


                        {{-- HARGA PETAK --}}

                        <div class="md:col-span-2">

                            <p class="text-xs text-gray-500">
                                Harga Petak
                            </p>

                            <p class="mt-1 font-serif text-2xl text-[#173528]">
                                Rp {{ number_format($hargaPetak, 0, ',', '.') }}
                            </p>

                            <p class="mt-1 text-xs text-gray-400">
                                Mengikuti harga Cash / Lunas kategori.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                TIMELINE
                ================================================== --}}

                <div class="bg-white border border-[#E5E0D5] rounded-3xl shadow-sm p-6 md:p-8">

                    <div class="mb-6">

                        <p class="text-xs text-[#A0834E] uppercase tracking-widest font-medium">
                            Waktu Pemesanan
                        </p>

                        <h2 class="mt-2 font-serif text-2xl text-[#173528]">
                            Timeline Booking
                        </h2>

                    </div>

                    <div class="space-y-5">

                        {{-- BOOKED --}}

                        <div class="flex items-start gap-4">

                            <div class="w-10 h-10 shrink-0 rounded-xl bg-[#F7F5EF] flex items-center justify-center text-[#A0834E] font-medium">
                                01
                            </div>

                            <div>

                                <p class="text-xs text-gray-500">
                                    Booking Dibuat
                                </p>

                                <p class="mt-1 font-medium text-gray-800">
                                    {{ $booking->booked_at?->format('d M Y, H:i') }}
                                </p>

                            </div>

                        </div>


                        {{-- EXPIRES --}}

                        <div class="flex items-start gap-4">

                            <div class="w-10 h-10 shrink-0 rounded-xl bg-[#F7F5EF] flex items-center justify-center text-[#A0834E] font-medium">
                                02
                            </div>

                            <div>

                                <p class="text-xs text-gray-500">
                                    Batas Pembayaran
                                </p>

                                <p class="mt-1 font-medium text-gray-800">
                                    {{ $booking->expires_at?->format('d M Y, H:i') }}
                                </p>

                            </div>

                        </div>


                        {{-- CONFIRMED --}}

                        @if($booking->confirmed_at)

                            <div class="flex items-start gap-4">

                                <div class="w-10 h-10 shrink-0 rounded-xl bg-[#DDEFE3] flex items-center justify-center text-[#245B3E] font-medium">
                                    03
                                </div>

                                <div>

                                    <p class="text-xs text-gray-500">
                                        Booking Dikonfirmasi
                                    </p>

                                    <p class="mt-1 font-medium text-gray-800">
                                        {{ $booking->confirmed_at?->format('d M Y, H:i') }}
                                    </p>

                                </div>

                            </div>

                        @endif

                    </div>

                </div>


                {{-- =================================================
                PEMBAYARAN
                ================================================== --}}

                <div class="bg-white border border-[#E5E0D5] rounded-3xl shadow-sm p-6 md:p-8">

                    <div class="mb-6">

                        <p class="text-xs text-[#A0834E] uppercase tracking-widest font-medium">
                            Informasi Pembayaran
                        </p>

                        <h2 class="mt-2 font-serif text-2xl text-[#173528]">
                            Riwayat Pembayaran
                        </h2>

                    </div>


                    {{-- =================================================
                    RINGKASAN CICILAN
                    ================================================== --}}

                    @if($cicilanPayments->count() > 0)

                        <div class="mb-6 rounded-2xl border border-[#E5E0D5] bg-[#F7F5EF] p-5">

                            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                                <div>

                                    <p class="text-xs uppercase tracking-widest text-[#A0834E] font-medium">
                                        Pembayaran Cicilan
                                    </p>

                                    <h3 class="mt-1 font-serif text-xl text-[#173528]">
                                        Progress Cicilan
                                    </h3>

                                </div>

                                <div class="text-left md:text-right">

                                    <p class="text-2xl font-serif text-[#173528]">
                                        {{ $jumlahCicilanVerified }} / {{ $tenorCicilan }}
                                    </p>

                                    <p class="text-xs text-gray-500">
                                        Cicilan telah diverifikasi
                                    </p>

                                </div>

                            </div>


                            {{-- PROGRESS BAR --}}

                            <div class="mt-5">

                                <div class="h-2 rounded-full bg-white overflow-hidden">

                                    <div
                                        class="h-full rounded-full bg-[#173528]"
                                        style="width: {{ $progressCicilan }}%"
                                    ></div>

                                </div>

                                <div class="mt-2 flex justify-between text-xs text-gray-500">

                                    <span>
                                        {{ $jumlahCicilanVerified }} cicilan selesai
                                    </span>

                                    <span>
                                        {{ max($tenorCicilan - $jumlahCicilanVerified, 0) }} tersisa
                                    </span>

                                </div>

                            </div>


                            {{-- STATISTIK --}}

                            <div class="mt-5 grid grid-cols-1 sm:grid-cols-3 gap-3">

                                <div class="rounded-xl bg-white border border-[#E5E0D5] p-4">

                                    <p class="text-xs text-gray-500">
                                        Total Dibayar
                                    </p>

                                    <p class="mt-1 font-semibold text-[#173528]">
                                        Rp {{ number_format($totalCicilanDibayar, 0, ',', '.') }}
                                    </p>

                                </div>


                                <div class="rounded-xl bg-white border border-[#E5E0D5] p-4">

                                    <p class="text-xs text-gray-500">
                                        Cicilan Berikutnya
                                    </p>

                                    <p class="mt-1 font-semibold text-[#173528]">

                                        @if($jumlahCicilanVerified < $tenorCicilan)

                                            Ke-{{ $cicilanBerikutnya }}

                                        @else

                                            LUNAS

                                        @endif

                                    </p>

                                </div>


                                <div class="rounded-xl bg-white border border-[#E5E0D5] p-4">

                                    <p class="text-xs text-gray-500">
                                        Status Terakhir
                                    </p>

                                    <p class="mt-1 font-semibold">

                                        @if($cicilanSubmitted->count() > 0)

                                            <span class="text-[#806A16]">
                                                Menunggu Verifikasi
                                            </span>

                                        @elseif($jumlahCicilanVerified >= $tenorCicilan)

                                            <span class="text-[#245B3E]">
                                                LUNAS
                                            </span>

                                        @else

                                            <span class="text-gray-600">
                                                Menunggu Pembayaran
                                            </span>

                                        @endif

                                    </p>

                                </div>

                            </div>

                        </div>

                    @endif


                    {{-- =================================================
                    RIWAYAT SEMUA PAYMENT
                    ================================================== --}}

                    @if($payments->count() > 0)

                        <div class="overflow-x-auto rounded-2xl border border-[#E5E0D5]">

                            <table class="w-full min-w-[900px] text-sm">

                                <thead class="bg-[#F7F5EF] border-b border-[#E5E0D5]">

                                    <tr class="text-left">

                                        <th class="px-4 py-4 font-medium text-[#173528]">
                                            Pembayaran
                                        </th>

                                        <th class="px-4 py-4 font-medium text-[#173528]">
                                            Tenor
                                        </th>

                                        <th class="px-4 py-4 font-medium text-[#173528]">
                                            Metode
                                        </th>

                                        <th class="px-4 py-4 font-medium text-[#173528]">
                                            Jumlah
                                        </th>

                                        <th class="px-4 py-4 font-medium text-[#173528]">
                                            Tanggal
                                        </th>

                                        <th class="px-4 py-4 font-medium text-[#173528]">
                                            Status
                                        </th>

                                        <th class="px-4 py-4 font-medium text-[#173528] text-center">
                                            Aksi
                                        </th>

                                    </tr>

                                </thead>


                                <tbody class="divide-y divide-[#E5E0D5] bg-white">

                                    @foreach($payments as $payment)

                                        <tr class="hover:bg-[#FCFBF8] transition">

                                            {{-- JENIS PEMBAYARAN --}}

                                            <td class="px-4 py-4">

                                                <div class="font-medium text-[#173528]">

                                                    @if($payment->jenis_pembayaran === 'BOOKING_FEE')

                                                        Booking Fee

                                                    @elseif($payment->jenis_pembayaran === 'CASH')

                                                        Cash / Lunas

                                                    @elseif($payment->jenis_pembayaran === 'CICILAN')

                                                        Cicilan ke-{{ $payment->cicilan_ke ?? '-' }}

                                                    @else

                                                        -

                                                    @endif

                                                </div>

                                            </td>


                                            {{-- TENOR --}}

                                            <td class="px-4 py-4 text-gray-700">

                                                @if(
                                                    $payment->jenis_pembayaran === 'CICILAN'
                                                    && $payment->tenor
                                                )

                                                    {{ $payment->tenor }} Bulan

                                                @else

                                                    -

                                                @endif

                                            </td>


                                            {{-- METODE --}}

                                            <td class="px-4 py-4 text-gray-700">
                                                {{ $payment->metode_pembayaran }}
                                            </td>


                                            {{-- JUMLAH --}}

                                            <td class="px-4 py-4">

                                                <span class="font-medium text-[#173528] whitespace-nowrap">
                                                    Rp {{ number_format($payment->jumlah, 0, ',', '.') }}
                                                </span>

                                            </td>


                                            {{-- TANGGAL --}}

                                            <td class="px-4 py-4 text-gray-700 whitespace-nowrap">
                                                {{ $payment->tanggal_pembayaran?->format('d M Y, H:i') }}
                                            </td>


                                            {{-- STATUS --}}

                                            <td class="px-4 py-4">

                                                @if($payment->status === 'PENDING')

                                                    <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">
                                                        PENDING
                                                    </span>

                                                @elseif($payment->status === 'SUBMITTED')

                                                    <span class="inline-flex rounded-full bg-[#FFF3C4] px-3 py-1 text-xs font-medium text-[#806A16]">
                                                        MENUNGGU
                                                    </span>

                                                @elseif($payment->status === 'VERIFIED')

                                                    <span class="inline-flex rounded-full bg-[#DDEFE3] px-3 py-1 text-xs font-medium text-[#245B3E]">
                                                        VERIFIED
                                                    </span>

                                                @elseif($payment->status === 'REJECTED')

                                                    <span class="inline-flex rounded-full bg-[#EBCACA] px-3 py-1 text-xs font-medium text-[#8A3D3D]">
                                                        REJECTED
                                                    </span>

                                                @endif

                                            </td>


                                            {{-- AKSI --}}

                                            <td class="px-4 py-4">

                                                <div class="flex items-center justify-center gap-2">

                                                    {{-- LIHAT BUKTI --}}

                                                    @if($payment->bukti_pembayaran)

                                                        <a
                                                            href="{{ asset('storage/' . $payment->bukti_pembayaran) }}"
                                                            target="_blank"
                                                            class="inline-flex items-center rounded-full border border-[#173528] px-3 py-1.5 text-xs font-medium text-[#173528] hover:bg-[#173528] hover:text-white transition"
                                                        >
                                                            Bukti
                                                        </a>

                                                    @endif


                                                    {{-- VERIFIKASI --}}

                                                    @if($payment->status === 'SUBMITTED')

                                                        <form
                                                            action="{{ route('admin.payments.verify', $payment) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Yakin ingin memverifikasi pembayaran ini?');"
                                                        >

                                                            @csrf

                                                            <button
                                                                type="submit"
                                                                class="inline-flex items-center rounded-full bg-[#173528] px-3 py-1.5 text-xs font-medium text-white hover:bg-[#0F291F] transition"
                                                            >
                                                                Verifikasi
                                                            </button>

                                                        </form>


                                                        {{-- TOLAK --}}

                                                        <button
                                                            type="button"
                                                            onclick="document.getElementById('reject-payment-{{ $payment->id }}').classList.toggle('hidden')"
                                                            class="inline-flex items-center rounded-full border border-[#D9A9A9] px-3 py-1.5 text-xs font-medium text-[#8A3D3D] hover:bg-[#EBCACA] transition"
                                                        >
                                                            Tolak
                                                        </button>

                                                    @endif

                                                </div>

                                            </td>

                                        </tr>


                                        {{-- FORM PENOLAKAN --}}

                                        @if($payment->status === 'SUBMITTED')

                                            <tr
                                                id="reject-payment-{{ $payment->id }}"
                                                class="hidden bg-[#FDF7F7]"
                                            >

                                                <td colspan="7" class="px-5 py-5">

                                                    <form
                                                        action="{{ route('admin.payments.reject', $payment) }}"
                                                        method="POST"
                                                        class="max-w-2xl"
                                                    >

                                                        @csrf

                                                        <label
                                                            for="catatan_admin_{{ $payment->id }}"
                                                            class="block text-sm font-medium text-[#173528] mb-2"
                                                        >
                                                            Alasan Penolakan
                                                        </label>

                                                        <textarea
                                                            id="catatan_admin_{{ $payment->id }}"
                                                            name="catatan_admin"
                                                            rows="3"
                                                            required
                                                            placeholder="Contoh: Bukti pembayaran tidak sesuai."
                                                            class="w-full rounded-xl border border-[#D9D4C8] bg-white px-4 py-3 text-sm outline-none focus:border-[#173528] focus:ring-2 focus:ring-[#173528]/10"
                                                        ></textarea>

                                                        <button
                                                            type="submit"
                                                            class="mt-3 rounded-full bg-[#8A3D3D] px-5 py-2.5 text-sm font-medium text-white hover:bg-[#713131] transition"
                                                        >
                                                            Tolak Pembayaran
                                                        </button>

                                                    </form>

                                                </td>

                                            </tr>

                                        @endif


                                        {{-- CATATAN ADMIN --}}

                                        @if($payment->catatan_admin)

                                            <tr>

                                                <td colspan="7" class="px-5 py-3 bg-[#FCFBF8]">

                                                    <div class="text-xs text-gray-500">
                                                        Catatan Admin
                                                    </div>

                                                    <div class="mt-1 text-sm text-gray-700">
                                                        {{ $payment->catatan_admin }}
                                                    </div>

                                                </td>

                                            </tr>

                                        @endif

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                    @else

                        <div class="rounded-2xl bg-[#F7F5EF] border border-[#E5E0D5] px-5 py-8 text-center">

                            <p class="font-serif text-lg text-[#173528]">
                                Belum ada pembayaran
                            </p>

                            <p class="mt-2 text-sm text-gray-500">
                                Pelanggan belum mengirimkan pembayaran untuk booking ini.
                            </p>

                        </div>

                    @endif

                </div>

            </div>


            {{-- =====================================================
            SIDEBAR
            ====================================================== --}}

            <div class="space-y-6">


                {{-- RINGKASAN --}}

                <div class="bg-[#173528] rounded-3xl shadow-sm p-6 text-white">

                    <p class="text-xs text-[#C8A96B] uppercase tracking-widest font-medium">
                        Ringkasan
                    </p>

                    <h2 class="mt-2 font-serif text-2xl">
                        {{ $booking->plot->kode_plot }}
                    </h2>

                    <div class="mt-6 pt-6 border-t border-white/10">

                        <p class="text-sm text-white/60">
                            Total Harga
                        </p>

                        <p class="mt-1 font-serif text-2xl text-[#C8A96B]">
                            Rp {{ number_format($hargaPetak, 0, ',', '.') }}
                        </p>

                        <p class="mt-1 text-xs text-white/50">
                            Harga Cash / Lunas kategori
                        </p>

                    </div>

                </div>


                {{-- RINGKASAN CICILAN SIDEBAR --}}

                @if($cicilanPayments->count() > 0)

                    <div class="bg-white border border-[#E5E0D5] rounded-3xl shadow-sm p-6">

                        <p class="text-xs text-[#A0834E] uppercase tracking-widest font-medium">
                            Cicilan
                        </p>

                        <h3 class="mt-2 font-serif text-2xl text-[#173528]">
                            {{ $jumlahCicilanVerified }} / {{ $tenorCicilan }}
                        </h3>

                        <p class="mt-1 text-sm text-gray-500">
                            Cicilan telah diverifikasi
                        </p>

                        <div class="mt-5 h-2 rounded-full bg-[#F1F1F1] overflow-hidden">

                            <div
                                class="h-full bg-[#173528] rounded-full"
                                style="width: {{ $progressCicilan }}%"
                            ></div>

                        </div>

                        <div class="mt-4 space-y-2 text-sm">

                            <div class="flex justify-between gap-3">

                                <span class="text-gray-500">
                                    Total dibayar
                                </span>

                                <span class="font-medium text-[#173528]">
                                    Rp {{ number_format($totalCicilanDibayar, 0, ',', '.') }}
                                </span>

                            </div>

                            <div class="flex justify-between gap-3">

                                <span class="text-gray-500">
                                    Berikutnya
                                </span>

                                <span class="font-medium text-[#173528]">

                                    @if($jumlahCicilanVerified < $tenorCicilan)

                                        Ke-{{ $cicilanBerikutnya }}

                                    @else

                                        Lunas

                                    @endif

                                </span>

                            </div>

                        </div>

                    </div>

                @endif


                {{-- STATUS --}}

                <div class="bg-white border border-[#E5E0D5] rounded-3xl shadow-sm p-6">

                    <p class="text-xs text-[#A0834E] uppercase tracking-widest font-medium">
                        Status Sistem
                    </p>

                    <div class="mt-5 space-y-4">

                        <div class="flex items-center justify-between gap-4">

                            <span class="text-sm text-gray-500">
                                Booking
                            </span>

                            <span class="text-sm font-medium text-[#173528]">
                                {{ $booking->status }}
                            </span>

                        </div>

                        <div class="flex items-center justify-between gap-4">

                            <span class="text-sm text-gray-500">
                                Plot
                            </span>

                            <span class="text-sm font-medium text-[#173528]">
                                {{ $booking->plot->status }}
                            </span>

                        </div>

                    </div>

                </div>


                {{-- AKSI --}}

                <div class="bg-white border border-[#E5E0D5] rounded-3xl shadow-sm p-6">

                    <p class="text-xs text-[#A0834E] uppercase tracking-widest font-medium">
                        Aksi
                    </p>

                    <div class="mt-5">

                        <a
                            href="{{ route('admin.bookings.index') }}"
                            class="flex items-center justify-center w-full rounded-full border border-[#D9D4C8] text-[#173528] px-5 py-3 text-sm font-medium hover:bg-gray-50 transition"
                        >
                            ← Kembali ke Booking
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection