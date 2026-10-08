@extends('layouts.app')

@section('title', 'Panduan - Tanah Salama')

@section('content')

<div class="bg-[#F7F5EF] min-h-screen text-[#173528]">

    {{-- =========================================================
    HERO
    ========================================================== --}}

    <section class="relative overflow-hidden pt-32 pb-24 px-6">

        <div class="absolute -top-32 -right-32 w-96 h-96 rounded-full bg-[#C8A96B]/10 blur-3xl"></div>

        <div class="absolute -bottom-32 -left-32 w-96 h-96 rounded-full bg-[#173528]/10 blur-3xl"></div>

        <div class="relative max-w-6xl mx-auto">

            <div class="max-w-3xl">

                <p class="text-xs uppercase tracking-[0.3em] text-[#A0834E] font-semibold">
                    Panduan Tanah Salama
                </p>

                <h1 class="mt-5 font-serif text-5xl md:text-6xl leading-tight">
                    Temukan Petak.
                    <br>
                    <span class="text-[#A0834E]">
                        Pesan dengan tenang.
                    </span>
                </h1>

                <p class="mt-6 max-w-2xl text-gray-600 text-lg leading-relaxed">
                    Kami merancang proses pemesanan agar sederhana dan mudah dipahami.
                    Ikuti perjalanan berikut mulai dari memilih petak hingga pembayaran.
                </p>

            </div>


            {{-- QUICK FLOW --}}

            <div class="mt-14 flex flex-wrap items-center gap-3">

                <div class="rounded-full bg-[#173528] text-white px-5 py-3 text-sm">
                    01 Pilih Petak
                </div>

                <span class="text-[#C8A96B]">→</span>

                <div class="rounded-full bg-white border border-[#DED8CB] px-5 py-3 text-sm">
                    02 Booking
                </div>

                <span class="text-[#C8A96B]">→</span>

                <div class="rounded-full bg-white border border-[#DED8CB] px-5 py-3 text-sm">
                    03 Pembayaran
                </div>

                <span class="text-[#C8A96B]">→</span>

                <div class="rounded-full bg-white border border-[#DED8CB] px-5 py-3 text-sm">
                    04 Verifikasi
                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
    STEP 01 - PILIH PETAK
    ========================================================== --}}

    <section class="px-6 py-24 bg-white">

        <div class="max-w-6xl mx-auto">

            <div class="grid lg:grid-cols-2 gap-16 items-center">

                {{-- TEXT --}}

                <div>

                    <p class="text-xs uppercase tracking-[0.25em] text-[#A0834E]">
                        Langkah 01
                    </p>

                    <h2 class="mt-4 font-serif text-4xl">
                        Pilih petak yang tersedia
                    </h2>

                    <p class="mt-5 text-gray-600 leading-relaxed">
                        Mulailah dengan melihat denah petak yang tersedia.
                        Setiap petak memiliki status yang menunjukkan apakah
                        petak masih dapat dipesan atau sudah digunakan.
                    </p>

                    <div class="mt-7 space-y-4">

                        <div class="flex gap-4">

                            <div class="w-10 h-10 rounded-full bg-[#EAF5ED] flex items-center justify-center shrink-0">
                                ✓
                            </div>

                            <div>

                                <p class="font-medium">
                                    Pilih petak AVAILABLE
                                </p>

                                <p class="mt-1 text-sm text-gray-500">
                                    Petak berstatus tersedia dapat dipilih untuk booking.
                                </p>

                            </div>

                        </div>


                        <div class="flex gap-4">

                            <div class="w-10 h-10 rounded-full bg-[#FFF4D6] flex items-center justify-center shrink-0">
                                !
                            </div>

                            <div>

                                <p class="font-medium">
                                    Periksa detail sebelum memilih
                                </p>

                                <p class="mt-1 text-sm text-gray-500">
                                    Pastikan kategori, jenis lahan dan harga sudah sesuai.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- CONTOH LANGSUNG --}}

                <div class="rounded-[2rem] bg-[#F7F5EF] border border-[#E5E0D5] p-6 shadow-sm">

                    <div class="flex items-center justify-between mb-5">

                        <div>

                            <p class="text-xs text-gray-500">
                                CONTOH TAMPILAN
                            </p>

                            <p class="mt-1 font-serif text-xl">
                                Pilih Petak
                            </p>

                        </div>

                        <span class="text-xs text-[#A0834E]">
                            Denah Petak
                        </span>

                    </div>


                    {{-- MOCK DENAH --}}

                    <div class="rounded-2xl bg-white border border-[#E5E0D5] p-5">

                        <div class="grid grid-cols-4 gap-2">

                            <div class="h-12 rounded-lg bg-[#DDEFE3] border border-[#A9CDB3] flex items-center justify-center text-xs font-medium">
                                A-001
                            </div>

                            <div class="h-12 rounded-lg bg-[#DDEFE3] border border-[#A9CDB3] flex items-center justify-center text-xs font-medium">
                                A-002
                            </div>

                            <div class="h-12 rounded-lg bg-[#DDEFE3] border border-[#A9CDB3] flex items-center justify-center text-xs font-medium">
                                A-003
                            </div>

                            <div class="h-12 rounded-lg bg-[#EBCACA] border border-[#D9A9A9] flex items-center justify-center text-xs text-[#8A3D3D]">
                                A-004
                            </div>

                            <div class="h-12 rounded-lg bg-[#DDEFE3] border border-[#A9CDB3] flex items-center justify-center text-xs font-medium">
                                A-005
                            </div>

                            <div class="h-12 rounded-lg bg-[#FFF3C4] border border-[#E3D18B] flex items-center justify-center text-xs text-[#806A16]">
                                A-006
                            </div>

                            <div class="h-12 rounded-lg bg-[#DDEFE3] border border-[#A9CDB3] flex items-center justify-center text-xs font-medium">
                                A-007
                            </div>

                            <div class="h-12 rounded-lg bg-[#DDEFE3] border border-[#A9CDB3] flex items-center justify-center text-xs font-medium">
                                A-008
                            </div>

                        </div>


                        <div class="mt-5 flex flex-wrap gap-4 text-xs text-gray-500">

                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded bg-[#DDEFE3]"></span>
                                Tersedia
                            </div>

                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded bg-[#FFF3C4]"></span>
                                Booking
                            </div>

                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded bg-[#EBCACA]"></span>
                                Terisi
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
    STEP 02 - DETAIL PETAK
    ========================================================== --}}

    <section class="px-6 py-24 bg-[#F7F5EF]">

        <div class="max-w-6xl mx-auto">

            <div class="grid lg:grid-cols-2 gap-16 items-center">


                {{-- MOCK DETAIL --}}

                <div class="order-2 lg:order-1">

                    <div class="bg-white rounded-[2rem] border border-[#E5E0D5] shadow-sm overflow-hidden">

                        <div class="h-36 bg-[#173528] flex items-end p-6">

                            <div>

                                <p class="text-xs text-[#C8A96B]">
                                    DETAIL PETAK
                                </p>

                                <h3 class="mt-1 font-serif text-3xl text-white">
                                    A-002
                                </h3>

                            </div>

                        </div>


                        <div class="p-6">

                            <div class="grid grid-cols-2 gap-5">

                                <div>

                                    <p class="text-xs text-gray-500">
                                        Kategori
                                    </p>

                                    <p class="mt-1 font-medium">
                                        Single
                                    </p>

                                </div>

                                <div>

                                    <p class="text-xs text-gray-500">
                                        Jenis Lahan
                                    </p>

                                    <p class="mt-1 font-medium">
                                        Rumput
                                    </p>

                                </div>

                                <div>

                                    <p class="text-xs text-gray-500">
                                        Status
                                    </p>

                                    <p class="mt-1 text-[#245B3E] font-medium">
                                        AVAILABLE
                                    </p>

                                </div>

                                <div>

                                    <p class="text-xs text-gray-500">
                                        Luas
                                    </p>

                                    <p class="mt-1 font-medium">
                                        1,5 × 2 Meter
                                    </p>

                                </div>

                            </div>


                            <div class="mt-6 pt-5 border-t border-[#E5E0D5]">

                                <p class="text-xs text-gray-500">
                                    Harga
                                </p>

                                <p class="mt-1 font-serif text-2xl">
                                    Rp 5.000.000
                                </p>

                            </div>


                            <button
                                type="button"
                                class="mt-6 w-full rounded-full bg-[#173528] text-white py-3 text-sm"
                            >
                                Pilih Petak Ini
                            </button>

                        </div>

                    </div>

                </div>


                {{-- TEXT --}}

                <div class="order-1 lg:order-2">

                    <p class="text-xs uppercase tracking-[0.25em] text-[#A0834E]">
                        Langkah 02
                    </p>

                    <h2 class="mt-4 font-serif text-4xl">
                        Kenali petak sebelum memilih
                    </h2>

                    <p class="mt-5 text-gray-600 leading-relaxed">
                        Klik petak untuk melihat informasi lengkapnya.
                        Jangan langsung melakukan booking sebelum memastikan
                        detail petak sesuai dengan kebutuhan Anda.
                    </p>

                    <div class="mt-8 border-l-2 border-[#C8A96B] pl-5">

                        <p class="font-medium">
                            Contoh
                        </p>

                        <p class="mt-2 text-sm text-gray-600 leading-relaxed">
                            Petak A-002 merupakan kategori Single dengan jenis
                            lahan Rumput, luas 1,5 × 2 Meter dan status AVAILABLE.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
    STEP 03 - FORM BOOKING
    ========================================================== --}}

    <section class="px-6 py-24 bg-white">

        <div class="max-w-6xl mx-auto">

            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <div>

                    <p class="text-xs uppercase tracking-[0.25em] text-[#A0834E]">
                        Langkah 03
                    </p>

                    <h2 class="mt-4 font-serif text-4xl">
                        Isi data pemesan
                    </h2>

                    <p class="mt-5 text-gray-600 leading-relaxed">
                        Setelah menentukan petak, Anda akan diarahkan ke formulir
                        booking. Isi data sesuai identitas pemesan.
                    </p>

                    <ul class="mt-7 space-y-3 text-sm text-gray-600">

                        <li>✓ Nama lengkap</li>
                        <li>✓ Nomor HP</li>
                        <li>✓ Email</li>
                        <li>✓ Foto KTP</li>

                    </ul>

                </div>


                {{-- MOCK FORM --}}

                <div class="rounded-[2rem] bg-[#F7F5EF] border border-[#E5E0D5] p-6">

                    <div class="bg-white rounded-2xl border border-[#E5E0D5] p-6">

                        <p class="text-xs text-[#A0834E] uppercase tracking-wider">
                            Form Booking
                        </p>

                        <h3 class="mt-2 font-serif text-2xl">
                            Data Pemesan
                        </h3>


                        <div class="mt-6 space-y-4">

                            <div>

                                <label class="text-xs text-gray-500">
                                    Nama Lengkap
                                </label>

                                <div class="mt-2 h-11 rounded-xl border border-[#D9D4C8] px-4 flex items-center text-sm text-gray-400">
                                    Contoh: Ahmad
                                </div>

                            </div>


                            <div>

                                <label class="text-xs text-gray-500">
                                    Nomor HP
                                </label>

                                <div class="mt-2 h-11 rounded-xl border border-[#D9D4C8] px-4 flex items-center text-sm text-gray-400">
                                    08xxxxxxxxxx
                                </div>

                            </div>


                            <div>

                                <label class="text-xs text-gray-500">
                                    Email
                                </label>

                                <div class="mt-2 h-11 rounded-xl border border-[#D9D4C8] px-4 flex items-center text-sm text-gray-400">
                                    email@example.com
                                </div>

                            </div>


                            <div>

                                <label class="text-xs text-gray-500">
                                    Foto KTP
                                </label>

                                <div class="mt-2 rounded-xl border border-dashed border-[#C8A96B] p-5 text-center text-sm text-gray-400">
                                    Upload Foto KTP
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
    STEP 04 - KODE BOOKING
    ========================================================== --}}

    <section class="px-6 py-24 bg-[#F7F5EF]">

        <div class="max-w-4xl mx-auto text-center">

            <p class="text-xs uppercase tracking-[0.25em] text-[#A0834E]">
                Langkah 04
            </p>

            <h2 class="mt-4 font-serif text-4xl">
                Simpan kode booking Anda
            </h2>

            <p class="mt-5 text-gray-600">
                Setelah booking berhasil, sistem memberikan kode unik.
                Gunakan kode ini untuk melihat kembali transaksi Anda.
            </p>


            {{-- MOCK BOOKING CARD --}}

            <div class="mt-10 bg-[#173528] rounded-[2rem] p-8 md:p-10 text-white shadow-xl">

                <p class="text-xs uppercase tracking-[0.2em] text-[#C8A96B]">
                    Booking Berhasil
                </p>

                <p class="mt-5 text-sm text-white/60">
                    Kode Booking Anda
                </p>

                <p class="mt-2 font-mono text-3xl md:text-4xl text-[#C8A96B] tracking-wider">
                    TS-20260922-ABC123
                </p>

                <div class="mt-7 inline-flex rounded-full bg-white/10 px-5 py-2 text-sm">
                    Simpan kode ini untuk Cek Booking
                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
    STEP 05 - PEMBAYARAN
    ========================================================== --}}

    <section class="px-6 py-24 bg-white">

        <div class="max-w-6xl mx-auto">

            <div class="text-center max-w-3xl mx-auto">

                <p class="text-xs uppercase tracking-[0.25em] text-[#A0834E]">
                    Langkah 05
                </p>

                <h2 class="mt-4 font-serif text-4xl">
                    Pilih cara pembayaran
                </h2>

                <p class="mt-5 text-gray-600">
                    Setelah booking dibuat, pilih metode pembayaran yang sesuai.
                </p>

            </div>


            <div class="mt-12 grid md:grid-cols-3 gap-5">

                {{-- BOOKING FEE --}}
                <div class="rounded-3xl border border-[#E5E0D5] p-7 hover:shadow-md transition">

                    <span class="text-xs uppercase tracking-wider text-[#A0834E]">
                        Pilihan 01
                    </span>

                    <h3 class="mt-3 font-serif text-2xl">
                        Booking Fee
                    </h3>

                    <p class="mt-3 text-sm text-gray-500 leading-relaxed">
                        Bayar booking fee untuk mengamankan pemesanan petak.
                    </p>

                    <div class="mt-6 pt-5 border-t border-[#E5E0D5]">

                        <p class="text-xs text-gray-500">
                            Contoh
                        </p>

                        <p class="mt-1 font-medium">
                            Rp 500.000
                        </p>

                    </div>

                </div>


                {{-- CASH --}}
                <div class="rounded-3xl border border-[#E5E0D5] p-7 hover:shadow-md transition">

                    <span class="text-xs uppercase tracking-wider text-[#A0834E]">
                        Pilihan 02
                    </span>

                    <h3 class="mt-3 font-serif text-2xl">
                        Cash / Lunas
                    </h3>

                    <p class="mt-3 text-sm text-gray-500 leading-relaxed">
                        Melakukan pembayaran penuh sesuai harga petak.
                    </p>

                    <div class="mt-6 pt-5 border-t border-[#E5E0D5]">

                        <p class="text-xs text-gray-500">
                            Status setelah verifikasi
                        </p>

                        <p class="mt-1 font-medium text-[#245B3E]">
                            Lunas
                        </p>

                    </div>

                </div>


                {{-- CICILAN --}}
                <div class="rounded-3xl border border-[#C8A96B] bg-[#FDFBF5] p-7 shadow-sm">

                    <span class="text-xs uppercase tracking-wider text-[#A0834E]">
                        Pilihan 03
                    </span>

                    <h3 class="mt-3 font-serif text-2xl">
                        Cicilan
                    </h3>

                    <p class="mt-3 text-sm text-gray-500 leading-relaxed">
                        Pilih tenor cicilan yang tersedia sesuai kategori petak.
                    </p>

                    <div class="mt-6 pt-5 border-t border-[#E5E0D5]">

                        <p class="text-xs text-gray-500">
                            Contoh tenor
                        </p>

                        <p class="mt-1 font-medium">
                            12 • 24 • 36 Bulan
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
    STEP 06 - UPLOAD BUKTI
    ========================================================== --}}

    <section class="px-6 py-24 bg-[#F7F5EF]">

        <div class="max-w-5xl mx-auto">

            <div class="grid md:grid-cols-2 gap-12 items-center">

                <div>

                    <p class="text-xs uppercase tracking-[0.25em] text-[#A0834E]">
                        Langkah 06
                    </p>

                    <h2 class="mt-4 font-serif text-4xl">
                        Kirim bukti pembayaran
                    </h2>

                    <p class="mt-5 text-gray-600 leading-relaxed">
                        Setelah melakukan transfer, masukkan tanggal pembayaran
                        dan upload bukti transaksi melalui halaman pembayaran.
                    </p>

                    <div class="mt-7 rounded-2xl bg-white border border-[#E5E0D5] p-5">

                        <p class="text-sm font-medium">
                            Pastikan bukti pembayaran:
                        </p>

                        <ul class="mt-3 space-y-2 text-sm text-gray-500">
                            <li>✓ Nominal terlihat jelas</li>
                            <li>✓ Bukti tidak terpotong</li>
                            <li>✓ File dapat dibuka</li>
                        </ul>

                    </div>

                </div>


                {{-- MOCK PAYMENT --}}

                <div class="bg-white rounded-[2rem] border border-[#E5E0D5] p-6 shadow-sm">

                    <p class="text-xs uppercase tracking-wider text-[#A0834E]">
                        Contoh Pembayaran
                    </p>

                    <div class="mt-5 space-y-4">

                        <div>

                            <p class="text-xs text-gray-500">
                                Metode Pembayaran
                            </p>

                            <div class="mt-2 h-11 rounded-xl border border-[#D9D4C8] px-4 flex items-center text-sm">
                                Transfer Bank
                            </div>

                        </div>

                        <div>

                            <p class="text-xs text-gray-500">
                                Jumlah
                            </p>

                            <div class="mt-2 h-11 rounded-xl border border-[#D9D4C8] px-4 flex items-center text-sm font-medium">
                                Rp 500.000
                            </div>

                        </div>

                        <div>

                            <p class="text-xs text-gray-500">
                                Bukti Pembayaran
                            </p>

                            <div class="mt-2 rounded-xl border border-dashed border-[#C8A96B] p-5 text-center">

                                <p class="text-sm text-gray-500">
                                    📎 bukti-transfer.jpg
                                </p>

                            </div>

                        </div>

                        <button
                            type="button"
                            class="w-full rounded-full bg-[#173528] text-white py-3 text-sm"
                        >
                            Kirim Pembayaran
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
    STEP 07 - VERIFIKASI
    ========================================================== --}}

    <section class="px-6 py-24 bg-white">

        <div class="max-w-5xl mx-auto text-center">

            <p class="text-xs uppercase tracking-[0.25em] text-[#A0834E]">
                Langkah 07
            </p>

            <h2 class="mt-4 font-serif text-4xl">
                Tunggu proses verifikasi
            </h2>

            <p class="mt-5 max-w-2xl mx-auto text-gray-600">
                Pembayaran akan diperiksa oleh admin.
                Anda dapat melihat statusnya melalui menu Cek Booking.
            </p>


            {{-- STATUS FLOW --}}

            <div class="mt-12 flex flex-col md:flex-row items-center justify-center gap-4">

                <div class="w-full md:w-48 rounded-2xl bg-[#FFF3C4] p-5">

                    <p class="text-xs text-[#806A16]">
                        STATUS 01
                    </p>

                    <p class="mt-2 font-medium">
                        Menunggu
                    </p>

                </div>

                <div class="text-[#C8A96B] text-xl">
                    →
                </div>

                <div class="w-full md:w-48 rounded-2xl bg-[#DDEFE3] p-5">

                    <p class="text-xs text-[#245B3E]">
                        STATUS 02
                    </p>

                    <p class="mt-2 font-medium">
                        VERIFIED
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
    STEP 08 - CEK BOOKING
    ========================================================== --}}

    <section class="px-6 py-24 bg-[#173528] text-white">

        <div class="max-w-6xl mx-auto">

            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <div>

                    <p class="text-xs uppercase tracking-[0.25em] text-[#C8A96B]">
                        Langkah 08
                    </p>

                    <h2 class="mt-4 font-serif text-4xl md:text-5xl">
                        Pantau booking Anda
                    </h2>

                    <p class="mt-5 text-white/70 leading-relaxed">
                        Tidak perlu khawatir kehilangan informasi.
                        Gunakan kode booking dan nomor HP untuk melihat
                        perkembangan transaksi Anda.
                    </p>

                    <a
                        href="{{ route('booking.check') }}"
                        class="inline-flex mt-8 rounded-full bg-[#C8A96B] px-7 py-3 text-sm font-medium text-[#173528] hover:bg-[#D7BC82] transition"
                    >
                        Cek Booking
                    </a>

                </div>


                {{-- MOCK STATUS --}}

                <div class="bg-white text-[#173528] rounded-[2rem] p-6 shadow-xl">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-xs text-gray-500">
                                KODE BOOKING
                            </p>

                            <p class="mt-1 font-mono font-medium">
                                TS-20260922-ABC123
                            </p>

                        </div>

                        <span class="rounded-full bg-[#DDEFE3] px-3 py-1 text-xs text-[#245B3E]">
                            CONFIRMED
                        </span>

                    </div>


                    <div class="mt-6 pt-6 border-t border-[#E5E0D5]">

                        <div class="flex justify-between text-sm">

                            <span class="text-gray-500">
                                Petak
                            </span>

                            <span class="font-medium">
                                A-002
                            </span>

                        </div>

                        <div class="mt-4 flex justify-between text-sm">

                            <span class="text-gray-500">
                                Cicilan
                            </span>

                            <span class="font-medium">
                                2 / 12
                            </span>

                        </div>


                        <div class="mt-5 h-2 rounded-full bg-gray-100 overflow-hidden">

                            <div
                                class="h-full rounded-full bg-[#173528]"
                                style="width: 16.67%"
                            ></div>

                        </div>


                        <div class="mt-6">

                            <p class="text-xs text-gray-500">
                                Pembayaran terakhir
                            </p>

                            <p class="mt-1 font-medium">
                                Cicilan ke-2
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
    FINAL CTA
    ========================================================== --}}

    <section class="px-6 py-24 bg-[#F7F5EF]">

        <div class="max-w-3xl mx-auto text-center">

            <p class="text-xs uppercase tracking-[0.25em] text-[#A0834E]">
                Tanah Salama
            </p>

            <h2 class="mt-4 font-serif text-4xl md:text-5xl">
                Semua dimulai dari satu pilihan.
            </h2>

            <p class="mt-5 text-gray-600 leading-relaxed">
                Setelah memahami seluruh proses, Anda dapat langsung
                melihat petak yang tersedia dan memulai pemesanan.
            </p>

            <a
                href="{{ route('home') }}"
                class="inline-flex mt-8 rounded-full bg-[#173528] px-8 py-3.5 text-sm font-medium text-white hover:bg-[#0F291F] transition"
            >
                Mulai Pilih Petak
            </a>

        </div>

    </section>

</div>

@endsection