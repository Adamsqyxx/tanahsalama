@extends('layouts.app')

@section('title', 'Booking - Admin Tanah Salama')

@section('content')

<div class="min-h-screen bg-[#F7F5EF] px-6 py-28">

    <div class="max-w-7xl mx-auto">

        {{-- HEADER --}}
        <div class="mb-8">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-5">

                <div>
                    <p class="text-sm text-[#A0834E] font-medium uppercase tracking-widest">
                        Panel Admin
                    </p>

                    <h1 class="mt-2 font-serif text-3xl md:text-4xl text-[#173528]">
                        Data Booking
                    </h1>

                    <p class="mt-2 text-gray-500">
                        Kelola dan pantau seluruh pemesanan petak makam.
                    </p>
                </div>

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="inline-flex items-center justify-center
                           px-5 py-3 rounded-full
                           border border-[#D9D4C8]
                           bg-white text-[#173528]
                           text-sm font-medium
                           hover:bg-[#173528] hover:text-white
                           transition"
                >
                    ← Kembali ke Dashboard
                </a>

            </div>
        </div>


        {{-- FLASH MESSAGE --}}
        @if(session('success'))
            <div class="mb-6 rounded-2xl
                        bg-green-50 border border-green-200
                        px-5 py-4 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 rounded-2xl
                        bg-red-50 border border-red-200
                        px-5 py-4 text-sm text-red-700">
                {{ session('error') }}
            </div>
        @endif


        {{-- FILTER & SEARCH --}}
        <div class="bg-white border border-[#E5E0D5]
                    rounded-3xl p-5 md:p-6 shadow-sm mb-6">

            <form
                action="{{ route('admin.bookings.index') }}"
                method="GET"
                class="grid grid-cols-1 md:grid-cols-4 gap-4"
            >

                {{-- SEARCH --}}
                <div class="md:col-span-2">

                    <label
                        for="search"
                        class="block text-sm font-medium text-[#173528] mb-2"
                    >
                        Cari Booking
                    </label>

                    <input
                        type="text"
                        id="search"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Kode booking, nama, atau nomor HP"
                        class="w-full rounded-xl
                               border border-[#D9D4C8]
                               bg-white px-4 py-3
                               text-sm
                               outline-none
                               focus:border-[#173528]
                               focus:ring-2 focus:ring-[#173528]/10"
                    >

                </div>


                {{-- STATUS --}}
                <div>

                    <label
                        for="status"
                        class="block text-sm font-medium text-[#173528] mb-2"
                    >
                        Status Booking
                    </label>

                    <select
                        id="status"
                        name="status"
                        class="w-full rounded-xl
                               border border-[#D9D4C8]
                               bg-white px-4 py-3
                               text-sm
                               outline-none
                               focus:border-[#173528]
                               focus:ring-2 focus:ring-[#173528]/10"
                    >

                        <option value="">
                            Semua Status
                        </option>

                        <option
                            value="BOOKED"
                            {{ request('status') === 'BOOKED' ? 'selected' : '' }}
                        >
                            BOOKED
                        </option>

                        <option
                            value="CONFIRMED"
                            {{ request('status') === 'CONFIRMED' ? 'selected' : '' }}
                        >
                            CONFIRMED
                        </option>

                        <option
                            value="EXPIRED"
                            {{ request('status') === 'EXPIRED' ? 'selected' : '' }}
                        >
                            EXPIRED
                        </option>

                        <option
                            value="CANCELLED"
                            {{ request('status') === 'CANCELLED' ? 'selected' : '' }}
                        >
                            CANCELLED
                        </option>

                    </select>

                </div>


                {{-- BUTTON --}}
                <div class="flex items-end gap-2">

                    <button
                        type="submit"
                        class="flex-1 rounded-xl
                               bg-[#173528] text-white
                               px-5 py-3
                               text-sm font-medium
                               hover:bg-[#0F291F]
                               transition"
                    >
                        Cari
                    </button>

                    <a
                        href="{{ route('admin.bookings.index') }}"
                        class="inline-flex items-center justify-center
                               px-5 py-3 rounded-xl
                               border border-[#D9D4C8]
                               text-[#173528]
                               text-sm font-medium
                               hover:bg-gray-50
                               transition"
                    >
                        Reset
                    </a>

                </div>

            </form>

        </div>


        {{-- TABLE --}}
        <div class="bg-white border border-[#E5E0D5]
                    rounded-3xl shadow-sm overflow-hidden">

            {{-- TABLE HEADER --}}
            <div class="px-6 py-5 border-b border-[#E5E0D5]">

                <div class="flex flex-col sm:flex-row
                            sm:items-center sm:justify-between gap-2">

                    <div>

                        <h2 class="font-serif text-xl text-[#173528]">
                            Daftar Booking
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            Menampilkan
                            {{ $bookings->firstItem() ?? 0 }}
                            -
                            {{ $bookings->lastItem() ?? 0 }}
                            dari
                            {{ $bookings->total() }}
                            booking
                        </p>

                    </div>

                </div>

            </div>


            {{-- DESKTOP TABLE --}}
            <div class="hidden md:block overflow-x-auto">

                <table class="w-full text-sm">

                    <thead class="bg-[#F7F5EF]">

                        <tr class="text-left text-[#173528]">

                            <th class="px-6 py-4 font-semibold">
                                Booking
                            </th>

                            <th class="px-6 py-4 font-semibold">
                                Pemesan
                            </th>

                            <th class="px-6 py-4 font-semibold">
                                Petak
                            </th>

                            <th class="px-6 py-4 font-semibold">
                                Harga
                            </th>

                            <th class="px-6 py-4 font-semibold">
                                Status
                            </th>

                            <th class="px-6 py-4 font-semibold">
                                Batas Pembayaran
                            </th>

                            <th class="px-6 py-4 font-semibold text-right">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-[#E5E0D5]">

                        @forelse($bookings as $booking)

                            <tr class="hover:bg-[#FAF9F5] transition">

                                {{-- BOOKING --}}
                                <td class="px-6 py-5">

                                    <div class="font-medium text-[#173528]">
                                        {{ $booking->kode_booking }}
                                    </div>

                                    <div class="text-xs text-gray-500 mt-1">
                                        {{ $booking->booked_at?->format('d M Y, H:i') }}
                                    </div>

                                </td>


                                {{-- PEMESAN --}}
                                <td class="px-6 py-5">

                                    <div class="font-medium text-gray-800">
                                        {{ $booking->nama_pemesan }}
                                    </div>

                                    <div class="text-xs text-gray-500 mt-1">
                                        {{ $booking->no_hp }}
                                    </div>

                                    @if($booking->email)

                                        <div class="text-xs text-gray-500">
                                            {{ $booking->email }}
                                        </div>

                                    @endif

                                </td>


                                {{-- PETAK --}}
                                <td class="px-6 py-5">

                                    <div class="font-medium text-[#173528]">
                                        {{ $booking->plot->kode_plot }}
                                    </div>

                                    <div class="text-xs text-gray-500 mt-1">
                                        {{ $booking->plot->category->nama_kategori ?? '-' }}
                                    </div>

                                </td>


                                {{-- HARGA --}}
                                <td class="px-6 py-5">

                                    <div class="font-medium text-[#173528]">

                                        Rp
                                        {{ number_format(
                                            $booking->plot->category->harga_cash ?? 0,
                                            0,
                                            ',',
                                            '.'
                                        ) }}

                                    </div>

                                </td>


                                {{-- STATUS --}}
                                <td class="px-6 py-5">

                                    @if($booking->status === 'BOOKED')

                                        <span class="inline-flex items-center
                                                     rounded-full
                                                     bg-[#FFF3C4]
                                                     px-3 py-1
                                                     text-xs font-medium
                                                     text-[#806A16]">
                                            BOOKED
                                        </span>

                                    @elseif($booking->status === 'CONFIRMED')

                                        <span class="inline-flex items-center
                                                     rounded-full
                                                     bg-[#DDEFE3]
                                                     px-3 py-1
                                                     text-xs font-medium
                                                     text-[#245B3E]">
                                            CONFIRMED
                                        </span>

                                    @elseif($booking->status === 'EXPIRED')

                                        <span class="inline-flex items-center
                                                     rounded-full
                                                     bg-[#F1F1F1]
                                                     px-3 py-1
                                                     text-xs font-medium
                                                     text-gray-600">
                                            EXPIRED
                                        </span>

                                    @elseif($booking->status === 'CANCELLED')

                                        <span class="inline-flex items-center
                                                     rounded-full
                                                     bg-[#EBCACA]
                                                     px-3 py-1
                                                     text-xs font-medium
                                                     text-[#8A3D3D]">
                                            CANCELLED
                                        </span>

                                    @endif

                                </td>


                                {{-- EXPIRES --}}
                                <td class="px-6 py-5">

                                    @if($booking->status === 'BOOKED')

                                        <div class="text-sm text-gray-700">
                                            {{ $booking->expires_at?->format('d M Y') }}
                                        </div>

                                        <div class="text-xs text-gray-500 mt-1">
                                            {{ $booking->expires_at?->format('H:i') }}
                                        </div>

                                    @else

                                        <span class="text-gray-400">
                                            —
                                        </span>

                                    @endif

                                </td>


                                {{-- AKSI --}}
                                <td class="px-6 py-5 text-right">

                                    <a
                                        href="{{ route('admin.bookings.show', $booking) }}"
                                        class="inline-flex items-center justify-center
                                               rounded-full
                                               bg-[#173528]
                                               text-white
                                               px-4 py-2
                                               text-xs font-medium
                                               hover:bg-[#0F291F]
                                               transition"
                                    >
                                        Detail
                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="7"
                                    class="px-6 py-16 text-center"
                                >

                                    <div class="max-w-sm mx-auto">

                                        <div class="w-14 h-14 mx-auto
                                                    rounded-2xl
                                                    bg-[#F7F5EF]
                                                    flex items-center
                                                    justify-center
                                                    text-[#A0834E]
                                                    font-serif text-xl">
                                            —
                                        </div>

                                        <h3 class="mt-4
                                                   font-serif text-xl
                                                   text-[#173528]">
                                            Belum ada booking
                                        </h3>

                                        <p class="mt-2 text-sm text-gray-500">
                                            Data booking pelanggan akan muncul
                                            di halaman ini.
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- MOBILE CARD --}}
            <div class="md:hidden divide-y divide-[#E5E0D5]">

                @forelse($bookings as $booking)

                    <div class="p-5">

                        <div class="flex items-start
                                    justify-between gap-4">

                            <div>

                                <p class="text-xs text-gray-500">
                                    Kode Booking
                                </p>

                                <p class="mt-1 font-medium text-[#173528]">
                                    {{ $booking->kode_booking }}
                                </p>

                            </div>


                            @if($booking->status === 'BOOKED')

                                <span class="shrink-0
                                             rounded-full
                                             bg-[#FFF3C4]
                                             px-3 py-1
                                             text-xs font-medium
                                             text-[#806A16]">
                                    BOOKED
                                </span>

                            @elseif($booking->status === 'CONFIRMED')

                                <span class="shrink-0
                                             rounded-full
                                             bg-[#DDEFE3]
                                             px-3 py-1
                                             text-xs font-medium
                                             text-[#245B3E]">
                                    CONFIRMED
                                </span>

                            @elseif($booking->status === 'EXPIRED')

                                <span class="shrink-0
                                             rounded-full
                                             bg-[#F1F1F1]
                                             px-3 py-1
                                             text-xs font-medium
                                             text-gray-600">
                                    EXPIRED
                                </span>

                            @else

                                <span class="shrink-0
                                             rounded-full
                                             bg-[#EBCACA]
                                             px-3 py-1
                                             text-xs font-medium
                                             text-[#8A3D3D]">
                                    CANCELLED
                                </span>

                            @endif

                        </div>


                        <div class="mt-5 space-y-3">

                            {{-- PEMESAN --}}
                            <div class="flex justify-between gap-4">

                                <span class="text-sm text-gray-500">
                                    Pemesan
                                </span>

                                <span class="text-sm font-medium
                                             text-gray-800 text-right">
                                    {{ $booking->nama_pemesan }}
                                </span>

                            </div>


                            {{-- PETAK --}}
                            <div class="flex justify-between gap-4">

                                <span class="text-sm text-gray-500">
                                    Petak
                                </span>

                                <span class="text-sm font-medium
                                             text-[#173528]">
                                    {{ $booking->plot->kode_plot }}
                                </span>

                            </div>


                            {{-- KATEGORI --}}
                            <div class="flex justify-between gap-4">

                                <span class="text-sm text-gray-500">
                                    Kategori
                                </span>

                                <span class="text-sm text-gray-800">
                                    {{ $booking->plot->category->nama_kategori ?? '-' }}
                                </span>

                            </div>


                            {{-- HARGA --}}
                            <div class="flex justify-between gap-4">

                                <span class="text-sm text-gray-500">
                                    Harga
                                </span>

                                <span class="text-sm font-medium text-[#173528]">

                                    Rp
                                    {{ number_format(
                                        $booking->plot->category->harga_cash ?? 0,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </span>

                            </div>


                            {{-- BATAS PEMBAYARAN --}}
                            @if($booking->status === 'BOOKED')

                                <div class="flex justify-between gap-4">

                                    <span class="text-sm text-gray-500">
                                        Batas pembayaran
                                    </span>

                                    <span class="text-sm text-gray-800 text-right">
                                        {{ $booking->expires_at?->format('d M Y H:i') }}
                                    </span>

                                </div>

                            @endif

                        </div>


                        {{-- DETAIL --}}
                        <a
                            href="{{ route('admin.bookings.show', $booking) }}"
                            class="mt-5 flex items-center justify-center
                                   w-full rounded-full
                                   bg-[#173528]
                                   text-white
                                   px-5 py-3
                                   text-sm font-medium
                                   hover:bg-[#0F291F]
                                   transition"
                        >
                            Lihat Detail
                        </a>

                    </div>

                @empty

                    <div class="px-6 py-16 text-center">

                        <h3 class="font-serif text-xl text-[#173528]">
                            Belum ada booking
                        </h3>

                        <p class="mt-2 text-sm text-gray-500">
                            Data booking pelanggan akan muncul di sini.
                        </p>

                    </div>

                @endforelse

            </div>


            {{-- PAGINATION --}}
            @if($bookings->hasPages())

                <div class="px-6 py-5 border-t border-[#E5E0D5]">
                    {{ $bookings->links() }}
                </div>

            @endif

        </div>

    </div>

</div>

@endsection