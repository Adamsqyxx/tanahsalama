@extends('layouts.app')

@section('title', 'Bayar Cicilan')

@section('content')

<div class="min-h-screen bg-gray-50 py-10">

    <div class="mx-auto max-w-3xl px-4">

        {{-- HEADER --}}
        <div class="mb-6">
            <p class="text-sm font-medium text-[#a67c37]">
                TANAH SALAMA
            </p>

            <h1 class="mt-1 text-2xl font-bold text-[#173528]">
                Bayar Cicilan Berikutnya
            </h1>

            <p class="mt-2 text-sm text-gray-500">
                Silakan lakukan pembayaran dan upload bukti pembayaran
                untuk melanjutkan cicilan Anda.
            </p>
        </div>


        {{-- ERROR --}}
        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">
                <ul class="space-y-1 text-sm text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{-- INFO CICILAN --}}
        <div class="rounded-2xl bg-white p-6 shadow-sm">

            <div class="grid gap-5 sm:grid-cols-2">

                <div>
                    <p class="text-xs text-gray-500">
                        Kode Booking
                    </p>

                    <p class="mt-1 font-semibold text-[#173528]">
                        {{ $booking->kode_booking }}
                    </p>
                </div>

                <div>
                    <p class="text-xs text-gray-500">
                        Petak
                    </p>

                    <p class="mt-1 font-semibold text-[#173528]">
                        {{ $booking->plot->kode_plot }}
                    </p>
                </div>

                <div>
                    <p class="text-xs text-gray-500">
                        Kategori
                    </p>

                    <p class="mt-1 font-semibold text-[#173528]">
                        {{ $booking->plot->category->nama_kategori }}
                    </p>
                </div>

                <div>
                    <p class="text-xs text-gray-500">
                        Tenor
                    </p>

                    <p class="mt-1 font-semibold text-[#173528]">
                        {{ $tenor }} Bulan
                    </p>
                </div>

            </div>


            <div class="my-6 border-t"></div>


            {{-- CICILAN --}}
            <div class="rounded-xl bg-[#f5f1e8] p-5">

                <p class="text-sm text-gray-600">
                    Pembayaran berikutnya
                </p>

                <div class="mt-2 flex items-end justify-between gap-4">

                    <div>
                        <p class="text-2xl font-bold text-[#173528]">
                            Cicilan ke-{{ $cicilanBerikutnya }}
                        </p>

                        <p class="mt-1 text-sm text-gray-500">
                            dari {{ $tenor }} cicilan
                        </p>
                    </div>

                    <div class="text-right">
                        <p class="text-xs text-gray-500">
                            Nominal
                        </p>

                        <p class="text-xl font-bold text-[#a67c37]">
                            Rp {{ number_format($jumlah, 0, ',', '.') }}
                        </p>
                    </div>

                </div>

            </div>


            {{-- FORM --}}
            <form
                action="{{ route('payment.installment.store', $booking) }}"
                method="POST"
                enctype="multipart/form-data"
                class="mt-8 space-y-6"
            >

                @csrf


                {{-- METODE --}}
                <div>

                    <label class="mb-2 block text-sm font-semibold text-gray-700">
                        Metode Pembayaran
                    </label>

                    <div class="grid gap-3 sm:grid-cols-2">

                        <label class="cursor-pointer">

                            <input
                                type="radio"
                                name="metode_pembayaran"
                                value="Transfer Bank"
                                class="peer sr-only"
                                {{ old('metode_pembayaran') === 'Transfer Bank' ? 'checked' : '' }}
                            >

                            <div class="rounded-xl border border-gray-200 p-4 transition peer-checked:border-[#a67c37] peer-checked:bg-[#faf7ef]">

                                <p class="font-semibold text-[#173528]">
                                    Transfer Bank
                                </p>

                                <p class="mt-1 text-xs text-gray-500">
                                    Transfer ke rekening Tanah Salama
                                </p>

                            </div>

                        </label>


                        <label class="cursor-pointer">

                            <input
                                type="radio"
                                name="metode_pembayaran"
                                value="QRIS"
                                class="peer sr-only"
                                {{ old('metode_pembayaran') === 'QRIS' ? 'checked' : '' }}
                            >

                            <div class="rounded-xl border border-gray-200 p-4 transition peer-checked:border-[#a67c37] peer-checked:bg-[#faf7ef]">

                                <p class="font-semibold text-[#173528]">
                                    QRIS
                                </p>

                                <p class="mt-1 text-xs text-gray-500">
                                    Pembayaran melalui QRIS
                                </p>

                            </div>

                        </label>

                    </div>

                </div>


                {{-- TANGGAL --}}
                <div>

                    <label
                        for="tanggal_pembayaran"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Tanggal Pembayaran
                    </label>

                    <input
                        type="date"
                        name="tanggal_pembayaran"
                        id="tanggal_pembayaran"
                        value="{{ old('tanggal_pembayaran', now()->format('Y-m-d')) }}"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none focus:border-[#a67c37] focus:ring-1 focus:ring-[#a67c37]"
                    >

                </div>


                {{-- BUKTI --}}
                <div>

                    <label
                        for="bukti_pembayaran"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Bukti Pembayaran
                    </label>

                    <input
                        type="file"
                        name="bukti_pembayaran"
                        id="bukti_pembayaran"
                        accept=".jpg,.jpeg,.png,.pdf"
                        class="block w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm"
                    >

                    <p class="mt-2 text-xs text-gray-500">
                        Format JPG, JPEG, PNG, atau PDF. Maksimal 5 MB.
                    </p>

                </div>


                {{-- BUTTON --}}
                <div class="flex flex-col gap-3 pt-2 sm:flex-row">

                    <a
                        href="{{ route('booking.show', $booking) }}"
                        class="rounded-xl border border-gray-300 px-5 py-3 text-center text-sm font-semibold text-gray-700 hover:bg-gray-50"
                    >
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="rounded-xl bg-[#173528] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#214b38]"
                    >
                        Kirim Bukti Pembayaran
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection