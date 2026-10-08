@extends('layouts.app')

@section('title', 'Konfirmasi Pembayaran - Tanah Salama')

@section('content')

<div class="min-h-screen bg-[#F4F1E9] pt-[120px]">

    {{-- HEADER --}}
    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-10 pt-8 sm:pt-10 pb-10 sm:pb-14">

        <div class="flex flex-wrap items-center gap-2 text-[9px] sm:text-[10px] uppercase tracking-[0.16em] text-[#8B9189]">

            <a href="{{ url('/') }}" class="hover:text-[#334336] transition">
                Beranda
            </a>

            <span>/</span>

            <a href="{{ route('booking.show', $booking) }}" class="hover:text-[#334336] transition">
                Booking
            </a>

            <span>/</span>

            <span class="text-[#52634F]">
                Pembayaran
            </span>

        </div>


        <div class="mt-8 sm:mt-12">

            <div class="flex items-center gap-3">

                <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-[#334336] flex items-center justify-center shrink-0">
                    <span class="text-[10px] sm:text-xs text-white font-medium">
                        03
                    </span>
                </div>

                <span class="text-[9px] sm:text-[10px] uppercase tracking-[0.18em] font-medium text-[#52634F]">
                    Konfirmasi pembayaran
                </span>

            </div>


            <h1 class="mt-6 sm:mt-7 max-w-3xl text-[2.5rem] sm:text-5xl lg:text-[4.5rem]
                       leading-[0.98] tracking-[-0.055em]
                       font-medium text-[#29352C]">

                Selesaikan

                <span class="text-[#71816B]">
                    pembayaran.
                </span>

            </h1>


            <p class="mt-5 sm:mt-7 max-w-2xl text-xs sm:text-sm leading-6 sm:leading-7 text-[#737B72]">

                Pilih jenis pembayaran sesuai kebutuhan Anda,
                lakukan pembayaran sesuai nominal yang tertera,
                kemudian unggah bukti pembayaran untuk diverifikasi
                oleh pengelola Tanah Salama.

            </p>

        </div>

    </section>


    {{-- MAIN --}}
    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-10 pb-16 sm:pb-20">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 sm:gap-6">


            {{-- =========================================================
                LEFT / SUMMARY
            ========================================================== --}}

            <div class="lg:col-span-5 space-y-5">


                {{-- BOOKING SUMMARY --}}
                <div class="rounded-[1.5rem] sm:rounded-[2rem] bg-[#334336] text-white p-6 sm:p-8 lg:p-10">

                    <p class="text-[9px] sm:text-[10px] uppercase tracking-[0.22em] text-white/40">
                        Ringkasan booking
                    </p>


                    {{-- KODE BOOKING --}}
                    <div class="mt-5 sm:mt-7">

                        <p class="text-[9px] sm:text-[10px] uppercase tracking-[0.18em] text-white/40">
                            Kode booking
                        </p>

                        <div class="mt-2 flex items-start gap-3">

                            <p class="min-w-0 break-all text-xl sm:text-2xl font-semibold tracking-[0.04em]">
                                {{ $booking->kode_booking }}
                            </p>

                        </div>

                    </div>


                    {{-- PLOT --}}
                    <div class="mt-7 sm:mt-8 pt-6 sm:pt-7 border-t border-white/10">

                        <p class="text-[9px] sm:text-[10px] uppercase tracking-[0.18em] text-white/40">
                            Petak makam
                        </p>

                        <div class="mt-3">

                            <p class="text-3xl sm:text-4xl font-semibold tracking-[-0.04em]">
                                {{ $booking->plot->kode_plot }}
                            </p>

                            <p class="mt-1 text-xs sm:text-sm text-white/50">
                                {{ $booking->plot->category->nama_kategori ?? '-' }}
                            </p>

                        </div>

                    </div>


                    {{-- LUAS --}}
                    @if($booking->plot->category->luas ?? false)

                        <div class="mt-5">

                            <p class="text-[9px] uppercase tracking-[0.15em] text-white/35">
                                Luas petak
                            </p>

                            <p class="mt-1 text-sm font-medium text-white/80">
                                {{ $booking->plot->category->luas }}
                            </p>

                        </div>

                    @endif


                    {{-- HARGA --}}
                    <div class="mt-7 pt-6 border-t border-white/10">

                        <p class="text-[9px] uppercase tracking-[0.15em] text-white/35">
                            Harga tunai
                        </p>

                        <p class="mt-2 text-lg sm:text-xl font-semibold">
                            Rp {{ number_format($booking->plot->category->harga_cash ?? 0, 0, ',', '.') }}
                        </p>

                    </div>


                    {{-- =====================================================
                        SISA PEMBAYARAN
                    ====================================================== --}}

                    @if(($jenisPembayaran ?? '') === 'PELUNASAN')

                        <div class="mt-6 rounded-xl sm:rounded-2xl bg-[#71816B]/20 border border-white/10 p-4 sm:p-5">

                            <p class="text-[9px] uppercase tracking-[0.16em] text-white/40">
                                Sisa pembayaran
                            </p>

                            <p class="mt-2 text-2xl sm:text-3xl font-semibold tracking-[-0.03em]">

                                Rp {{ number_format($sisaPembayaran ?? 0, 0, ',', '.') }}

                            </p>

                            <p class="mt-2 text-xs leading-5 text-white/50">

                                Nominal ini merupakan sisa pembayaran
                                berdasarkan pembayaran yang telah diverifikasi.

                            </p>

                        </div>

                    @endif


                    {{-- EXPIRY --}}

                    @if($booking->status === 'BOOKED')

                        <div class="mt-7 sm:mt-8 rounded-xl sm:rounded-2xl bg-white/5 border border-white/10 p-4 sm:p-5">

                            <div class="flex items-start gap-3 sm:gap-4">

                                <div class="w-8 h-8 sm:w-9 sm:h-9 shrink-0 rounded-full bg-white/10 flex items-center justify-center">

                                    <svg
                                        class="w-4 h-4 text-white/70"
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


                                <div class="min-w-0">

                                    <p class="text-[9px] uppercase tracking-[0.16em] text-white/35">
                                        Batas pembayaran
                                    </p>

                                    <p class="mt-2 text-sm font-medium leading-5">
                                        {{ $booking->expires_at->format('d F Y') }}
                                    </p>

                                    <p class="mt-1 text-xs text-white/50">
                                        {{ $booking->expires_at->format('H:i') }} WITA
                                    </p>

                                </div>

                            </div>

                        </div>

                    @else

                        <div class="mt-7 sm:mt-8 rounded-xl sm:rounded-2xl bg-white/5 border border-white/10 p-4 sm:p-5">

                            <p class="text-[9px] uppercase tracking-[0.16em] text-white/35">
                                Status booking
                            </p>

                            <p class="mt-2 text-sm font-medium text-white">
                                Booking telah dikonfirmasi
                            </p>

                            <p class="mt-1 text-xs leading-5 text-white/50">
                                Pembayaran dapat dilanjutkan sesuai transaksi yang tersedia.
                            </p>

                        </div>

                    @endif

                </div>


                {{-- IMPORTANT --}}
                <div class="rounded-[1.5rem] sm:rounded-[2rem] bg-[#EDE9DE] p-6 sm:p-8">

                    <p class="text-[9px] sm:text-[10px] uppercase tracking-[0.2em] text-[#8B9189]">
                        Penting
                    </p>


                    <div class="mt-5 space-y-4">

                        <div class="flex gap-3">

                            <span class="shrink-0 text-xs text-[#71816B]">
                                01
                            </span>

                            <p class="text-xs leading-5 sm:leading-6 text-[#737B72]">

                                Pastikan jenis pembayaran dan nominal
                                yang ditampilkan sudah sesuai.

                            </p>

                        </div>


                        <div class="flex gap-3">

                            <span class="shrink-0 text-xs text-[#71816B]">
                                02
                            </span>

                            <p class="text-xs leading-5 sm:leading-6 text-[#737B72]">

                                Simpan bukti pembayaran sampai proses verifikasi selesai.

                            </p>

                        </div>


                        <div class="flex gap-3">

                            <span class="shrink-0 text-xs text-[#71816B]">
                                03
                            </span>

                            <p class="text-xs leading-5 sm:leading-6 text-[#737B72]">

                                Pembayaran akan diperiksa oleh pengelola
                                sebelum transaksi diproses lebih lanjut.

                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =========================================================
                RIGHT / FORM
            ========================================================== --}}

            <div class="lg:col-span-7">

                <form
                    action="{{ route('payment.store', $booking) }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="bg-[#F8F7F3] border border-[#DCDCD4]
                           rounded-[1.5rem] sm:rounded-[2rem]
                           p-5 sm:p-8 lg:p-10">

                    @csrf


                    {{-- TITLE --}}
                    <div>

                        <p class="text-[9px] sm:text-[10px] uppercase tracking-[0.22em] text-[#8B9189]">
                            Langkah pembayaran
                        </p>

                        <h2 class="mt-2 text-xl sm:text-2xl font-medium tracking-[-0.03em] text-[#334336]">
                            Pilih jenis pembayaran
                        </h2>

                    </div>


                    {{-- ERRORS --}}
                    @if($errors->any())

                        <div class="mt-6 rounded-xl sm:rounded-2xl bg-[#F1E4E0] border border-[#E4CDC7] p-4 sm:p-5">

                            <p class="text-sm font-medium text-[#8A5A50]">
                                Data belum lengkap.
                            </p>

                            <ul class="mt-2 space-y-1">

                                @foreach($errors->all() as $error)

                                    <li class="text-xs leading-5 text-[#9B746D]">
                                        • {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    {{-- =====================================================
                        JENIS PEMBAYARAN
                    ====================================================== --}}

                    <div class="mt-7 sm:mt-9">

                        <label
                            for="jenis_pembayaran"
                            class="block text-[9px] sm:text-[10px] uppercase tracking-[0.18em] text-[#8B9189]">

                            Jenis pembayaran

                        </label>


                        @if(($jenisPembayaran ?? '') === 'PELUNASAN')

                            {{-- MODE PELUNASAN --}}
                            <div class="mt-3 rounded-xl border-2 border-[#52634F] bg-[#F0F3ED] px-4 py-4">

                                <div class="flex items-center justify-between gap-4">

                                    <div>

                                        <p class="text-sm font-semibold text-[#52634F]">
                                            Pelunasan
                                        </p>

                                        <p class="mt-1 text-[11px] leading-5 text-[#92978F]">
                                            Pembayaran seluruh sisa kewajiban booking.
                                        </p>

                                    </div>

                                    <div class="w-9 h-9 rounded-full bg-[#DDE4D8] flex items-center justify-center shrink-0">

                                        <svg
                                            class="w-4 h-4 text-[#52634F]"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.7"
                                                d="M5 12l4 4L19 6"/>

                                        </svg>

                                    </div>

                                </div>

                            </div>


                            <input
                                type="hidden"
                                name="jenis_pembayaran"
                                value="PELUNASAN">


                        @else

                            {{-- MODE PEMBAYARAN AWAL --}}
                            <select
                                id="jenis_pembayaran"
                                name="jenis_pembayaran"
                                required
                                class="mt-3 w-full rounded-xl border border-[#D5D6D0]
                                       bg-white px-4 py-3.5
                                       text-sm text-[#52634F]
                                       outline-none
                                       focus:border-[#71816B]
                                       focus:ring-4 focus:ring-[#71816B]/10
                                       transition">

                                <option value="">
                                    Pilih jenis pembayaran
                                </option>

                                <option
                                    value="BOOKING_FEE"
                                    {{ old('jenis_pembayaran') === 'BOOKING_FEE' ? 'selected' : '' }}>

                                    Booking Fee

                                </option>

                                <option
                                    value="CASH"
                                    {{ old('jenis_pembayaran') === 'CASH' ? 'selected' : '' }}>

                                    Cash / Tunai

                                </option>

                                <option
                                    value="CICILAN"
                                    {{ old('jenis_pembayaran') === 'CICILAN' ? 'selected' : '' }}>

                                    Cicilan

                                </option>

                            </select>

                        @endif

                    </div>


                    {{-- =====================================================
                        TENOR
                    ====================================================== --}}

                    <div
                        id="tenorWrapper"
                        class="mt-5 hidden">

                        <label
                            for="tenor"
                            class="block text-[9px] sm:text-[10px] uppercase tracking-[0.18em] text-[#8B9189]">

                            Pilihan tenor

                        </label>


                        <select
                            id="tenor"
                            name="tenor"
                            class="mt-3 w-full rounded-xl border border-[#D5D6D0]
                                   bg-white px-4 py-3.5
                                   text-sm text-[#52634F]
                                   outline-none
                                   focus:border-[#71816B]
                                   focus:ring-4 focus:ring-[#71816B]/10
                                   transition">

                            <option value="">
                                Pilih tenor cicilan
                            </option>

                            <option
                                value="12"
                                {{ old('tenor') == '12' ? 'selected' : '' }}>
                                12 Bulan
                            </option>

                            <option
                                value="24"
                                {{ old('tenor') == '24' ? 'selected' : '' }}>
                                24 Bulan
                            </option>

                            <option
                                value="36"
                                {{ old('tenor') == '36' ? 'selected' : '' }}>
                                36 Bulan
                            </option>

                        </select>

                    </div>


                    {{-- =====================================================
                        PAYMENT SUMMARY
                    ====================================================== --}}

                    <div class="mt-6 sm:mt-8 rounded-xl sm:rounded-2xl border border-[#DDDCD4] bg-white p-5 sm:p-6">

                        <p class="text-[9px] uppercase tracking-[0.18em] text-[#969B93]">
                            Jumlah pembayaran
                        </p>


                        <p
                            id="paymentDescription"
                            class="mt-2 text-xs text-[#92978F]">

                            Silakan pilih jenis pembayaran.

                        </p>


                        <p
                            id="paymentAmount"
                            class="mt-4 text-2xl sm:text-3xl font-semibold tracking-[-0.03em] text-[#334336] break-words">

                            Rp 0

                        </p>

                    </div>


                    {{-- =====================================================
                        PAYMENT METHOD
                    ====================================================== --}}

                    <div class="mt-7 sm:mt-9">

                        <p class="text-[9px] sm:text-[10px] uppercase tracking-[0.18em] text-[#8B9189]">
                            Metode pembayaran
                        </p>


                        <div class="mt-3 grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">


                            {{-- BANK --}}
                            <label class="block cursor-pointer">

                                <input
                                    type="radio"
                                    name="metode_pembayaran"
                                    value="Transfer Bank"
                                    class="peer sr-only"
                                    required
                                    {{ old('metode_pembayaran') === 'Transfer Bank' ? 'checked' : '' }}>


                                <div class="h-full rounded-xl sm:rounded-2xl border-2 border-[#DDDCD4]
                                            bg-white p-4 sm:p-5
                                            peer-checked:border-[#52634F]
                                            peer-checked:bg-[#F0F3ED]
                                            transition">

                                    <div class="flex items-center justify-between">

                                        <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-[#EDE9DE]
                                                    flex items-center justify-center">

                                            <svg
                                                class="w-4 h-4 sm:w-5 sm:h-5 text-[#60705C]"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.7"
                                                    d="M3 10l9-6 9 6M5 10v8m4-8v8m6-8v8m4-8v8M3 20h18"/>

                                            </svg>

                                        </div>

                                    </div>


                                    <p class="mt-4 text-sm font-medium text-[#52634F]">
                                        Transfer Bank
                                    </p>

                                    <p class="mt-1 text-[11px] sm:text-xs leading-5 text-[#92978F]">
                                        Transfer ke rekening Tanah Salama.
                                    </p>

                                </div>

                            </label>


                            {{-- QRIS --}}
                            <label class="block cursor-pointer">

                                <input
                                    type="radio"
                                    name="metode_pembayaran"
                                    value="QRIS"
                                    class="peer sr-only"
                                    {{ old('metode_pembayaran') === 'QRIS' ? 'checked' : '' }}>


                                <div class="h-full rounded-xl sm:rounded-2xl border-2 border-[#DDDCD4]
                                            bg-white p-4 sm:p-5
                                            peer-checked:border-[#52634F]
                                            peer-checked:bg-[#F0F3ED]
                                            transition">

                                    <div class="flex items-center justify-between">

                                        <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-[#EDE9DE]
                                                    flex items-center justify-center">

                                            <svg
                                                class="w-4 h-4 sm:w-5 sm:h-5 text-[#60705C]"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.7"
                                                    d="M4 4h6v6H4zM14 4h6v6h-6zM4 14h6v6H4zM14 14h3v3h-3zM19 17h1v3h-3"/>

                                            </svg>

                                        </div>

                                    </div>


                                    <p class="mt-4 text-sm font-medium text-[#52634F]">
                                        QRIS
                                    </p>

                                    <p class="mt-1 text-[11px] sm:text-xs leading-5 text-[#92978F]">
                                        Bayar menggunakan aplikasi digital.
                                    </p>

                                </div>

                            </label>

                        </div>

                    </div>


                    {{-- =====================================================
                        BANK INFORMATION
                    ====================================================== --}}

                    <div
                        id="bankInformation"
                        class="mt-5 rounded-xl sm:rounded-2xl bg-[#EDE9DE] p-5 sm:p-6">

                        <div class="flex flex-col gap-1">

                            <p class="text-[9px] sm:text-[10px] uppercase tracking-[0.18em] text-[#8B9189]">
                                Transfer ke
                            </p>

                            <p class="text-base sm:text-lg font-semibold text-[#52634F]">
                                {{ $paymentSetting->nama_bank ?? 'Bank' }}
                            </p>

                        </div>


                        <div class="mt-5 pt-5 border-t border-[#D7D4C9]">

                            <p class="text-[9px] uppercase tracking-[0.16em] text-[#969B93]">
                                Nomor rekening
                            </p>

                            <div class="mt-2 flex items-center gap-3">

                                <p class="min-w-0 flex-1 break-all text-lg sm:text-xl font-semibold tracking-[0.03em] text-[#334336]">
                                    {{ $paymentSetting->nomor_rekening ?? '-' }}
                                </p>

                                <button
                                    type="button"
                                    id="copyRekening"
                                    class="shrink-0 rounded-full bg-white px-3 sm:px-4 py-2 text-[10px] sm:text-xs font-medium text-[#71816B] hover:text-[#334336] transition">

                                    <span id="copyRekeningText">
                                        Salin
                                    </span>

                                </button>

                            </div>

                        </div>


                        <div class="mt-5">

                            <p class="text-[9px] uppercase tracking-[0.16em] text-[#969B93]">
                                Atas nama
                            </p>

                            <p class="mt-1 text-sm font-medium text-[#52634F]">
                                {{ $paymentSetting->nama_rekening ?? '-' }}
                            </p>

                        </div>

                    </div>


                    {{-- =====================================================
                        QRIS INFORMATION
                    ====================================================== --}}

                    <div
                        id="qrisInformation"
                        class="hidden mt-5 rounded-xl sm:rounded-2xl bg-[#EDE9DE] p-5 sm:p-6">

                        <div class="text-center">

                            <p class="text-[9px] sm:text-[10px] uppercase tracking-[0.18em] text-[#8B9189]">
                                Scan QRIS
                            </p>


                            @if($paymentSetting && $paymentSetting->qris)

                                <div class="mt-5 inline-flex bg-white p-3 sm:p-4 rounded-xl sm:rounded-2xl">

                                    <img
                                        src="{{ asset('storage/' . $paymentSetting->qris) }}"
                                        alt="QRIS Tanah Salama"
                                        class="w-44 h-44 sm:w-52 sm:h-52 object-contain">

                                </div>

                            @else

                                <div class="mt-5 bg-white rounded-xl p-8">

                                    <p class="text-xs text-[#8A9088]">
                                        QRIS belum tersedia.
                                    </p>

                                </div>

                            @endif

                        </div>

                    </div>


                    {{-- =====================================================
                        DATE
                    ====================================================== --}}

                    <div class="mt-6 sm:mt-8">

                        <label
                            for="tanggal_pembayaran"
                            class="block text-[9px] sm:text-[10px] uppercase tracking-[0.18em] text-[#8B9189]">

                            Tanggal pembayaran

                        </label>


                        <input
                            type="datetime-local"
                            id="tanggal_pembayaran"
                            name="tanggal_pembayaran"
                            value="{{ old('tanggal_pembayaran') }}"
                            required
                            class="mt-3 w-full min-w-0 rounded-xl border border-[#D5D6D0]
                                   bg-white px-4 py-3.5
                                   text-sm text-[#52634F]
                                   outline-none
                                   focus:border-[#71816B]
                                   focus:ring-4 focus:ring-[#71816B]/10
                                   transition">

                    </div>


                    {{-- =====================================================
                        UPLOAD
                    ====================================================== --}}

                    <div class="mt-6 sm:mt-8">

                        <label
                            for="bukti_pembayaran"
                            class="block text-[9px] sm:text-[10px] uppercase tracking-[0.18em] text-[#8B9189]">

                            Bukti pembayaran

                        </label>


                        <label
                            for="bukti_pembayaran"
                            class="block mt-3 cursor-pointer">

                            <div class="rounded-xl sm:rounded-2xl border-2 border-dashed border-[#C9CBC3]
                                        bg-white p-6 sm:p-8 text-center
                                        hover:border-[#8C9A82]
                                        transition">

                                <div class="w-10 h-10 sm:w-11 sm:h-11 mx-auto rounded-full bg-[#EDE9DE]
                                            flex items-center justify-center">

                                    <svg
                                        class="w-5 h-5 text-[#60705C]"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.7"
                                            d="M12 16V4m0 0L8 8m4-4l4 4M5 20h14"/>

                                    </svg>

                                </div>


                                <p class="mt-4 text-sm font-medium text-[#52634F]">
                                    Pilih bukti pembayaran
                                </p>


                                <p
                                    id="fileName"
                                    class="mt-1 text-[10px] sm:text-xs text-[#969B93] break-all">

                                    JPG, PNG atau PDF · maksimal 5 MB

                                </p>

                            </div>


                            <input
                                type="file"
                                id="bukti_pembayaran"
                                name="bukti_pembayaran"
                                accept=".jpg,.jpeg,.png,.pdf"
                                required
                                class="hidden">

                        </label>

                    </div>


                    {{-- =====================================================
                        AGREEMENT
                    ====================================================== --}}

                    <div class="mt-6 sm:mt-8">

                        <label
                            for="paymentAgreement"
                            class="flex items-start gap-3 cursor-pointer select-none">

                            <input
                                type="checkbox"
                                id="paymentAgreement"
                                required
                                class="mt-0.5 w-5 h-5 shrink-0 accent-[#334336]">


                            <span class="text-[11px] sm:text-xs leading-5 sm:leading-6 text-[#737B72]">

                                Saya memastikan bahwa informasi pembayaran
                                yang saya kirim adalah benar dan sesuai dengan
                                transaksi booking

                                <span class="font-medium text-[#52634F] break-all">

                                    {{ $booking->kode_booking }}

                                </span>.

                            </span>

                        </label>

                    </div>


                    {{-- =====================================================
                        SUBMIT
                    ====================================================== --}}

                    <div class="mt-7 sm:mt-9 pt-7 sm:pt-8 border-t border-[#DDDCD4]">

                        <button
                            type="submit"
                            id="submitPayment"
                            disabled
                            class="w-full inline-flex items-center justify-center gap-3
                                   rounded-full
                                   bg-[#C3C7C1]
                                   px-6 py-4
                                   text-sm font-medium text-white
                                   cursor-not-allowed
                                   transition-all duration-300">

                            <span id="submitText">
                                Kirim pembayaran
                            </span>

                            <span class="text-white/50">
                                →
                            </span>

                        </button>


                        <p class="mt-4 text-center text-[9px] sm:text-[10px] leading-5 text-[#969B93]">

                            Pembayaran akan diperiksa oleh pengelola
                            sebelum booking diproses lebih lanjut.

                        </p>

                    </div>

                </form>

            </div>

        </div>

    </section>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | DATA HARGA DARI DATABASE
    |--------------------------------------------------------------------------
    */

    const prices = {

        bookingFee:
            {{ (float) ($booking->plot->category->booking_fee ?? 0) }},

        cash:
            {{ (float) ($booking->plot->category->harga_cash ?? 0) }},

        cicilan12:
            {{ (float) ($booking->plot->category->cicilan_12 ?? 0) }},

        cicilan24:
            {{ (float) ($booking->plot->category->cicilan_24 ?? 0) }},

        cicilan36:
            {{ (float) ($booking->plot->category->cicilan_36 ?? 0) }},

        pelunasan:
            {{ (float) ($sisaPembayaran ?? 0) }}

    };


    /*
    |--------------------------------------------------------------------------
    | MODE PEMBAYARAN
    |--------------------------------------------------------------------------
    */

    const paymentMode =
        @json($jenisPembayaran ?? '');


    /*
    |--------------------------------------------------------------------------
    | ELEMENT
    |--------------------------------------------------------------------------
    */

    const jenisPembayaran =
        document.getElementById('jenis_pembayaran');

    const tenorWrapper =
        document.getElementById('tenorWrapper');

    const tenor =
        document.getElementById('tenor');

    const paymentAmount =
        document.getElementById('paymentAmount');

    const paymentDescription =
        document.getElementById('paymentDescription');

    const fileInput =
        document.getElementById('bukti_pembayaran');

    const fileName =
        document.getElementById('fileName');

    const agreement =
        document.getElementById('paymentAgreement');

    const submitButton =
        document.getElementById('submitPayment');

    const submitText =
        document.getElementById('submitText');


    /*
    |--------------------------------------------------------------------------
    | FORMAT RUPIAH
    |--------------------------------------------------------------------------
    */

    function formatRupiah(number) {

        return new Intl.NumberFormat(
            'id-ID'
        ).format(number);

    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE NOMINAL
    |--------------------------------------------------------------------------
    */

    function updatePaymentAmount() {

        /*
        |--------------------------------------------------------------------------
        | PELUNASAN
        |--------------------------------------------------------------------------
        */

        if (paymentMode === 'PELUNASAN') {

            paymentAmount.textContent =
                'Rp ' + formatRupiah(
                    prices.pelunasan
                );

            paymentDescription.textContent =
                'Pembayaran seluruh sisa kewajiban booking.';

            return;
        }


        const jenis =
            jenisPembayaran
                ? jenisPembayaran.value
                : '';

        const selectedTenor =
            tenor
                ? tenor.value
                : '';


        let amount = 0;

        let description =
            'Silakan pilih jenis pembayaran.';


        /*
        |--------------------------------------------------------------------------
        | BOOKING FEE
        |--------------------------------------------------------------------------
        */

        if (jenis === 'BOOKING_FEE') {

            amount =
                prices.bookingFee;

            description =
                'Biaya booking / administrasi petak.';
        }


        /*
        |--------------------------------------------------------------------------
        | CASH
        |--------------------------------------------------------------------------
        */

        else if (jenis === 'CASH') {

            amount =
                prices.cash;

            description =
                'Pembayaran harga petak secara tunai.';
        }


        /*
        |--------------------------------------------------------------------------
        | CICILAN
        |--------------------------------------------------------------------------
        */

        else if (jenis === 'CICILAN') {

            if (selectedTenor === '12') {

                amount =
                    prices.cicilan12;

                description =
                    'Cicilan per bulan selama 12 bulan.';

            }

            else if (selectedTenor === '24') {

                amount =
                    prices.cicilan24;

                description =
                    'Cicilan per bulan selama 24 bulan.';

            }

            else if (selectedTenor === '36') {

                amount =
                    prices.cicilan36;

                description =
                    'Cicilan per bulan selama 36 bulan.';

            }

            else {

                description =
                    'Silakan pilih tenor cicilan.';
            }
        }


        /*
        |--------------------------------------------------------------------------
        | TAMPILKAN
        |--------------------------------------------------------------------------
        */

        paymentAmount.textContent =
            'Rp ' + formatRupiah(amount);

        paymentDescription.textContent =
            description;
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE TENOR
    |--------------------------------------------------------------------------
    */

    function updateTenor() {

        /*
        |--------------------------------------------------------------------------
        | PELUNASAN
        |--------------------------------------------------------------------------
        */

        if (paymentMode === 'PELUNASAN') {

            if (tenorWrapper) {

                tenorWrapper.classList.add(
                    'hidden'
                );

            }

            if (tenor) {

                tenor.required = false;
                tenor.value = '';

            }

            updatePaymentAmount();

            return;
        }


        /*
        |--------------------------------------------------------------------------
        | CICILAN
        |--------------------------------------------------------------------------
        */

        if (
            jenisPembayaran &&
            jenisPembayaran.value === 'CICILAN'
        ) {

            tenorWrapper.classList.remove(
                'hidden'
            );

            tenor.required = true;

        } else {

            tenorWrapper.classList.add(
                'hidden'
            );

            tenor.required = false;

            tenor.value = '';
        }


        updatePaymentAmount();
    }


    /*
    |--------------------------------------------------------------------------
    | METODE PEMBAYARAN
    |--------------------------------------------------------------------------
    */

    const bankRadio =
        document.querySelector(
            'input[name="metode_pembayaran"][value="Transfer Bank"]'
        );

    const qrisRadio =
        document.querySelector(
            'input[name="metode_pembayaran"][value="QRIS"]'
        );

    const bankInformation =
        document.getElementById(
            'bankInformation'
        );

    const qrisInformation =
        document.getElementById(
            'qrisInformation'
        );


    function updatePaymentMethod() {

        if (
            qrisRadio &&
            qrisRadio.checked
        ) {

            bankInformation.classList.add(
                'hidden'
            );

            qrisInformation.classList.remove(
                'hidden'
            );

        } else {

            bankInformation.classList.remove(
                'hidden'
            );

            qrisInformation.classList.add(
                'hidden'
            );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | CHECK FORM
    |--------------------------------------------------------------------------
    */

    function updateSubmitButton() {

        let jenisValid = false;

        let tenorValid = true;


        /*
        |--------------------------------------------------------------------------
        | PELUNASAN
        |--------------------------------------------------------------------------
        */

        if (paymentMode === 'PELUNASAN') {

            jenisValid = true;

            tenorValid = true;

        } else {

            jenisValid =
                jenisPembayaran &&
                jenisPembayaran.value !== '';

            tenorValid =
                !jenisPembayaran ||
                jenisPembayaran.value !== 'CICILAN' ||
                (tenor && tenor.value !== '');
        }


        const metodeValid =
            document.querySelector(
                'input[name="metode_pembayaran"]:checked'
            ) !== null;


        const fileValid =
            fileInput &&
            fileInput.files.length > 0;


        if (
            agreement &&
            agreement.checked &&
            jenisValid &&
            tenorValid &&
            metodeValid &&
            fileValid
        ) {

            submitButton.disabled = false;


            submitButton.classList.remove(
                'bg-[#C3C7C1]',
                'cursor-not-allowed'
            );


            submitButton.classList.add(
                'bg-[#334336]',
                'hover:bg-[#26352A]',
                'cursor-pointer'
            );


        } else {

            submitButton.disabled = true;


            submitButton.classList.remove(
                'bg-[#334336]',
                'hover:bg-[#26352A]',
                'cursor-pointer'
            );


            submitButton.classList.add(
                'bg-[#C3C7C1]',
                'cursor-not-allowed'
            );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | AGREEMENT
    |--------------------------------------------------------------------------
    */

    if (agreement) {

        agreement.addEventListener(
            'change',
            updateSubmitButton
        );

    }


    /*
    |--------------------------------------------------------------------------
    | FILE
    |--------------------------------------------------------------------------
    */

    if (
        fileInput &&
        fileName
    ) {

        fileInput.addEventListener(
            'change',
            function () {

                if (
                    this.files.length > 0
                ) {

                    fileName.textContent =
                        this.files[0].name;


                    fileName.classList.remove(
                        'text-[#969B93]'
                    );


                    fileName.classList.add(
                        'text-[#52634F]'
                    );

                } else {

                    fileName.textContent =
                        'JPG, PNG atau PDF · maksimal 5 MB';

                }


                updateSubmitButton();
            }
        );
    }


    /*
    |--------------------------------------------------------------------------
    | METODE PEMBAYARAN CHANGE
    |--------------------------------------------------------------------------
    */

    document
        .querySelectorAll(
            'input[name="metode_pembayaran"]'
        )
        .forEach(function (radio) {

            radio.addEventListener(
                'change',
                function () {

                    updatePaymentMethod();

                    updateSubmitButton();

                }
            );

        });


    /*
    |--------------------------------------------------------------------------
    | JENIS PEMBAYARAN CHANGE
    |--------------------------------------------------------------------------
    */

    if (jenisPembayaran) {

        jenisPembayaran.addEventListener(
            'change',
            function () {

                updateTenor();

                updateSubmitButton();

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | TENOR CHANGE
    |--------------------------------------------------------------------------
    */

    if (tenor) {

        tenor.addEventListener(
            'change',
            function () {

                updatePaymentAmount();

                updateSubmitButton();

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | COPY REKENING
    |--------------------------------------------------------------------------
    */

    const copyRekening =
        document.getElementById(
            'copyRekening'
        );

    const copyRekeningText =
        document.getElementById(
            'copyRekeningText'
        );


    if (copyRekening) {

        copyRekening.addEventListener(
            'click',
            async function () {

                const rekening =
                    @json(
                        $paymentSetting->nomor_rekening ?? ''
                    );


                if (!rekening) {
                    return;
                }


                try {

                    await navigator
                        .clipboard
                        .writeText(
                            rekening
                        );


                    copyRekeningText.textContent =
                        'Tersalin';


                    setTimeout(
                        function () {

                            copyRekeningText.textContent =
                                'Salin';

                        },
                        2000
                    );


                } catch (error) {

                    copyRekeningText.textContent =
                        'Gagal';


                    setTimeout(
                        function () {

                            copyRekeningText.textContent =
                                'Salin';

                        },
                        2000
                    );
                }

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | INITIAL STATE
    |--------------------------------------------------------------------------
    */

    updateTenor();

    updatePaymentMethod();

    updatePaymentAmount();

    updateSubmitButton();

});

</script>

@endsection