@extends('layouts.app')

@section('title', 'Pembayaran Berhasil - Tanah Salama')

@section('content')

<div class="min-h-screen bg-[#F7F5EF] pt-[120px] pb-20">

    <div class="max-w-4xl mx-auto px-6 lg:px-10">

        {{-- Breadcrumb --}}
        <div class="flex items-center gap-3 text-xs text-[#8A9088] mb-10">
            <a href="{{ url('/') }}"
               class="hover:text-[#334336] transition">
                Beranda
            </a>

            <span>/</span>

            <span class="text-[#52634F]">
                Pembayaran Berhasil
            </span>
        </div>


        {{-- SUCCESS CARD --}}
        <div class="bg-white border border-[#E0DED5] rounded-[28px] overflow-hidden shadow-[0_20px_60px_rgba(47,57,48,0.06)]">

            {{-- TOP SUCCESS --}}
            <div class="px-6 sm:px-10 lg:px-14 pt-12 pb-10 text-center">

                {{-- Icon --}}
                <div class="mx-auto w-20 h-20 rounded-full bg-[#E8EEE5] flex items-center justify-center">

                    <div class="w-12 h-12 rounded-full bg-[#52634F] flex items-center justify-center">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            class="w-6 h-6 text-white">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M5 12l4 4L19 6"
                            />

                        </svg>

                    </div>

                </div>


                {{-- Heading --}}
                <p class="mt-8 text-[10px] uppercase tracking-[0.3em] text-[#8A9088]">
                    Pembayaran Diterima
                </p>

                <h1 class="mt-3 text-3xl sm:text-4xl lg:text-5xl font-medium tracking-[-0.04em] text-[#29352C]">
                    Pembayaran berhasil dikirim.
                </h1>

                <p class="mt-5 max-w-xl mx-auto text-sm leading-7 text-[#7B817A]">
                    Bukti pembayaran Anda telah berhasil diterima oleh sistem
                    Tanah Salama dan sedang menunggu proses verifikasi dari admin.
                </p>

            </div>


            {{-- DIVIDER --}}
            <div class="border-t border-[#E7E5DD]"></div>


            {{-- BOOKING INFORMATION --}}
            <div class="px-6 sm:px-10 lg:px-14 py-10">

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5">

                    <div>

                        <p class="text-[10px] uppercase tracking-[0.25em] text-[#93988F]">
                            Kode Booking
                        </p>

                        <div class="mt-2 flex items-center gap-3">

                            <span
                                id="bookingCode"
                                class="text-xl sm:text-2xl font-semibold tracking-wide text-[#334336]">
                                {{ $booking->kode_booking }}
                            </span>

                            <button
                                type="button"
                                onclick="copyBookingCode()"
                                class="w-9 h-9 rounded-full border border-[#D9D8D0] flex items-center justify-center text-[#657263] hover:bg-[#334336] hover:text-white transition"
                                title="Salin kode booking">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="15"
                                    height="15"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2">

                                    <rect
                                        x="9"
                                        y="9"
                                        width="13"
                                        height="13"
                                        rx="2"
                                        ry="2">
                                    </rect>

                                    <path
                                        d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1">
                                    </path>

                                </svg>

                            </button>

                        </div>

                        <p
                            id="copyMessage"
                            class="hidden mt-2 text-xs text-[#71816B]">
                            Kode booking berhasil disalin.
                        </p>

                    </div>


                    {{-- PAYMENT STATUS --}}
                    <div class="inline-flex items-center gap-2 self-start sm:self-center px-4 py-2 rounded-full bg-[#FFF5D9] border border-[#F0DFAB]">

                        <span class="w-2 h-2 rounded-full bg-[#C9A24D]"></span>

                        <span class="text-xs font-medium text-[#8A6C2E]">
                            Menunggu Verifikasi
                        </span>

                    </div>

                </div>


                {{-- DETAILS --}}
                <div class="mt-10 grid sm:grid-cols-2 gap-px bg-[#E7E5DD] border border-[#E7E5DD] rounded-2xl overflow-hidden">

                    {{-- Plot --}}
                    <div class="bg-[#FAF9F5] p-6">

                        <p class="text-[10px] uppercase tracking-[0.22em] text-[#969B93]">
                            Petak Makam
                        </p>

                        <p class="mt-2 text-lg font-semibold text-[#39463B]">
                            {{ $booking->plot->kode_plot }}
                        </p>

                    </div>


                    {{-- Category --}}
                    <div class="bg-[#FAF9F5] p-6">

                        <p class="text-[10px] uppercase tracking-[0.22em] text-[#969B93]">
                            Kategori
                        </p>

                        <p class="mt-2 text-lg font-semibold text-[#39463B]">
                            {{ $booking->plot->category->nama_kategori ?? '-' }}
                        </p>

                    </div>


                    {{-- Payment Method --}}
                    <div class="bg-[#FAF9F5] p-6">

                        <p class="text-[10px] uppercase tracking-[0.22em] text-[#969B93]">
                            Metode Pembayaran
                        </p>

                        <p class="mt-2 text-lg font-semibold text-[#39463B]">
                            {{ $payment->metode_pembayaran }}
                        </p>

                    </div>


                    {{-- Amount --}}
                    <div class="bg-[#FAF9F5] p-6">

                        <p class="text-[10px] uppercase tracking-[0.22em] text-[#969B93]">
                            Jumlah Pembayaran
                        </p>

                        <p class="mt-2 text-lg font-semibold text-[#39463B]">
                            Rp {{ number_format($payment->jumlah, 0, ',', '.') }}
                        </p>

                    </div>

                </div>


                {{-- INFORMATION --}}
                <div class="mt-8 rounded-2xl bg-[#EEF2EB] border border-[#DCE4D8] p-6 sm:p-7">

                    <div class="flex gap-4">

                        <div class="shrink-0 w-10 h-10 rounded-full bg-white flex items-center justify-center">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="18"
                                height="18"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                class="text-[#52634F]">

                                <circle
                                    cx="12"
                                    cy="12"
                                    r="10">
                                </circle>

                                <path
                                    d="M12 16v-4">
                                </path>

                                <path
                                    d="M12 8h.01">
                                </path>

                            </svg>

                        </div>


                        <div>

                            <h3 class="text-sm font-semibold text-[#3E4C40]">
                                Apa yang terjadi selanjutnya?
                            </h3>

                            <p class="mt-2 text-sm leading-7 text-[#727A71]">
                                Admin Tanah Salama akan memeriksa bukti pembayaran
                                yang Anda kirim. Setelah pembayaran diverifikasi,
                                status booking akan berubah menjadi
                                <strong class="font-semibold text-[#52634F]">
                                    Dikonfirmasi
                                </strong>
                                dan petak makam akan ditetapkan sebagai
                                <strong class="font-semibold text-[#52634F]">
                                    Terisi
                                </strong>.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- IMPORTANT --}}
                <div class="mt-8">

                    <p class="text-[10px] uppercase tracking-[0.25em] text-[#93988F]">
                        Simpan informasi ini
                    </p>

                    <p class="mt-3 text-sm leading-7 text-[#7B817A]">
                        Simpan kode booking
                        <strong class="text-[#52634F]">
                            {{ $booking->kode_booking }}
                        </strong>
                        untuk memantau status booking Anda.
                    </p>

                </div>

            </div>


            {{-- ACTIONS --}}
            <div class="border-t border-[#E7E5DD] px-6 sm:px-10 lg:px-14 py-8 bg-[#FCFBF8]">

                <div class="flex flex-col sm:flex-row gap-3">

                    <a
                        href="{{ route('booking.check') }}"
                        class="flex-1 inline-flex items-center justify-center gap-3 bg-[#334336] text-white rounded-full px-6 py-4 text-sm font-medium hover:bg-[#26352A] transition">

                        Cek Status Booking

                        <span class="text-white/60">
                            →
                        </span>

                    </a>


                   
                </div>


                <div class="mt-5 text-center">

                    <a
                        href="{{ url('/') }}"
                        class="text-xs text-[#8A9088] hover:text-[#52634F] transition">

                        ← Kembali ke Beranda

                    </a>

                </div>

            </div>

        </div>


        {{-- FOOTNOTE --}}
        <div class="mt-8 text-center">

            <p class="text-[11px] leading-6 text-[#A0A39D]">
                Tanah Salama · Sistem Informasi dan Pemesanan Petak Makam
            </p>

        </div>

    </div>

</div>


<script>

function copyBookingCode() {

    const code = document.getElementById('bookingCode').innerText.trim();
    const message = document.getElementById('copyMessage');

    navigator.clipboard.writeText(code)
        .then(function () {

            message.classList.remove('hidden');

            setTimeout(function () {
                message.classList.add('hidden');
            }, 2500);

        })
        .catch(function () {

            const textarea = document.createElement('textarea');

            textarea.value = code;

            document.body.appendChild(textarea);

            textarea.select();

            document.execCommand('copy');

            textarea.remove();

            message.classList.remove('hidden');

            setTimeout(function () {
                message.classList.add('hidden');
            }, 2500);

        });
}

</script>

@endsection