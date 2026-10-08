@extends('layouts.app')

@section('title', 'Tanah Salama’ — Taman Pemakaman Umum')

@section('content')

{{-- =========================================================
     HERO
========================================================= --}}

<style>
</style>

<section
    class="relative mt-[79px] w-full overflow-hidden bg-[#315B4B]"
>

    {{-- BACKGROUND --}}
    <div
        class="absolute inset-0 bg-gradient-to-br
               from-[#173F32]
               via-[#315B4B]
               to-[#A3ACA6]"
    ></div>

    {{-- CAHAYA LEMBUT --}}
    <div
        class="pointer-events-none absolute
               -right-32
               -top-40
               h-[500px]
               w-[500px]
               rounded-full
               bg-white/[0.06]
               blur-3xl"
    ></div>

    {{-- LINGKARAN KANAN --}}
    <div
        class="pointer-events-none absolute
               right-[-120px]
               top-[-180px]
               h-[520px]
               w-[520px]
               rounded-full
               border border-white/[0.10]"
    ></div>

    <div
        class="pointer-events-none absolute
               right-[-70px]
               top-[-130px]
               h-[420px]
               w-[420px]
               rounded-full
               border border-white/[0.08]"
    ></div>

    <div
        class="pointer-events-none absolute
               right-[-20px]
               top-[-80px]
               h-[320px]
               w-[320px]
               rounded-full
               border border-white/[0.07]"
    ></div>


    {{-- =====================================================
         KONTEN HERO
    ====================================================== --}}

    <div
        class="relative z-10
               mx-auto
               h-[314px]
               max-w-[1500px]
               px-6
               sm:px-10
               lg:px-16
               xl:px-20"
    >

        {{-- TEKS KIRI --}}
        <div
            class="relative z-20
                   pt-5
                   sm:pt-6
                   lg:pt-7"
        >

            {{-- LABEL --}}
            <div class="flex items-center gap-3">

                <span
                    class="h-px
                           w-8
                           shrink-0
                           bg-[#D7C28E]
                           sm:w-10"
                ></span>

                <p
                    class="text-[8px]
                           font-medium
                           uppercase
                           tracking-[0.30em]
                           text-[#E5D7B5]
                           sm:text-[9px]
                           sm:tracking-[0.36em]"
                >
                    Sistem Informasi Pemakaman Umum
                </p>

            </div>


            {{-- JUDUL --}}
            <h1
                class="mt-3
                       whitespace-nowrap
                       font-serif
                       text-[48px]
                       font-normal
                       leading-[0.9]
                       tracking-[-0.025em]
                       text-white
                       sm:text-[64px]
                       md:text-[72px]
                       lg:text-[84px]
                       xl:text-[96px]"
            >
                Tanah Salama’
            </h1>


            {{-- SUBTITLE --}}
            <p
                class="mt-4
                       max-w-[580px]
                       text-[13px]
                       font-light
                       leading-6
                       text-white/75
                       sm:text-base
                       lg:text-lg"
            >
                Taman Pemakaman Umum
                <span class="text-white">
                    Rumah Masa Depan
                </span>
            </p>


            {{-- BUTTON --}}
            <div class="mt-5 sm:mt-6">

                <a
                    href="{{ route('tentang') }}"
                    class="inline-flex
                           items-center
                           gap-4
                           rounded-full
                           border border-white/40
                           px-5
                           py-3
                           text-xs
                           font-semibold
                           text-white
                           transition
                           duration-300
                           hover:border-white
                           hover:bg-white
                           hover:text-[#173F32]
                           sm:px-7
                           sm:py-3.5
                           sm:text-sm"
                >

                    <span>
                        Tentang Kami
                    </span>

                    <span
                        class="flex
                               h-7
                               w-7
                               items-center
                               justify-center
                               rounded-full
                               border border-white/30"
                    >
                        →
                    </span>

                </a>

            </div>

        </div>


        {{-- TS KANAN --}}
        <div
            class="pointer-events-none
                   absolute
                   right-[6%]
                   top-1/2
                   hidden
                   -translate-y-1/2
                   lg:block"
        >

            <div
                class="flex
                       h-[330px]
                       w-[330px]
                       items-center
                       justify-center
                       rounded-full
                       border
                       border-white/10"
            >

                <div
                    class="flex
                           h-[245px]
                           w-[245px]
                           items-center
                           justify-center
                           rounded-full
                           border
                           border-white/10"
                >

                    <div
                        class="flex
                               h-[160px]
                               w-[160px]
                               items-center
                               justify-center
                               rounded-full
                               border
                               border-white/10"
                    >

                        <div class="text-center">

                            <p
                                class="font-serif
                                       text-5xl
                                       italic
                                       text-white/70"
                            >
                                TS
                            </p>

                            <div
                                class="mx-auto
                                       mt-2
                                       h-px
                                       w-8
                                       bg-[#D7C28E]/60"
                            ></div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- BOTTOM BAR --}}
    <div
        class="relative z-20
               h-[38px]
               border-t
               border-white/10"
    >

        <div
            class="mx-auto
                   flex
                   h-full
                   max-w-[1500px]
                   items-center
                   justify-between
                   px-6
                   sm:px-10
                   lg:px-16
                   xl:px-20"
        >

            <p
                class="text-[7px]
                       uppercase
                       tracking-[0.20em]
                       text-white/45
                       sm:text-[8px]"
            >
                Harmoni antara manusia dan alam
            </p>

            <p
                class="hidden
                       text-[8px]
                       uppercase
                       tracking-[0.18em]
                       text-white/45
                       sm:block"
            >
                • Tanah Salama’
            </p>

        </div>

    </div>

</section>

<br>

{{-- =========================================================
     INCLUDE SERVICE / PELAYANAN TERMASUK
========================================================= --}}

<div class="mb-6">

    <div
        class="rounded-2xl
               border
               border-gray-200
               bg-white
               p-5
               shadow-sm"
    >

        <div class="mb-4">

            <h3
                class="text-base
                       font-bold
                       uppercase
                       tracking-wide
                       text-gray-800"
            >
                Include Service / Pelayanan Termasuk
            </h3>

            <div
                class="mt-2
                       h-1
                       w-12
                       rounded-full
                       bg-[#7A8B5A]"
            ></div>

        </div>

        <div
            class="grid
                   grid-cols-1
                   gap-3
                   sm:grid-cols-2
                   lg:grid-cols-3"
        >

            <div class="flex items-start gap-3">

                <span
                    class="flex
                           h-7
                           w-7
                           shrink-0
                           items-center
                           justify-center
                           rounded-full
                           bg-[#7A8B5A]/10
                           text-sm
                           font-bold
                           text-[#7A8B5A]"
                >
                    1
                </span>

                <p class="pt-1 text-sm text-gray-700">
                    Penjemputan Ambulance
                </p>

            </div>


            <div class="flex items-start gap-3">

                <span
                    class="flex
                           h-7
                           w-7
                           shrink-0
                           items-center
                           justify-center
                           rounded-full
                           bg-[#7A8B5A]/10
                           text-sm
                           font-bold
                           text-[#7A8B5A]"
                >
                    2
                </span>

                <p class="pt-1 text-sm text-gray-700">
                    Penggalian + Papan Lahad
                </p>

            </div>


            <div class="flex items-start gap-3">

                <span
                    class="flex
                           h-7
                           w-7
                           shrink-0
                           items-center
                           justify-center
                           rounded-full
                           bg-[#7A8B5A]/10
                           text-sm
                           font-bold
                           text-[#7A8B5A]"
                >
                    3
                </span>

                <p class="pt-1 text-sm text-gray-700">
                    Prasasti / Nisan Nama
                </p>

            </div>


            <div class="flex items-start gap-3">

                <span
                    class="flex
                           h-7
                           w-7
                           shrink-0
                           items-center
                           justify-center
                           rounded-full
                           bg-[#7A8B5A]/10
                           text-sm
                           font-bold
                           text-[#7A8B5A]"
                >
                    4
                </span>

                <p class="pt-1 text-sm text-gray-700">
                    Perawatan Selamanya
                </p>

            </div>


            <div class="flex items-start gap-3">

                <span
                    class="flex
                           h-7
                           w-7
                           shrink-0
                           items-center
                           justify-center
                           rounded-full
                           bg-[#7A8B5A]/10
                           text-sm
                           font-bold
                           text-[#7A8B5A]"
                >
                    5
                </span>

                <p class="pt-1 text-sm text-gray-700">
                    Pembelian Bisa Angsur
                </p>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
     PETAK MAKAM
========================================================= --}}

<section
    id="peta-makam"
    class="bg-[#F5F4EF] py-14 sm:py-20"
>

    <div
        class="mx-auto
               max-w-[1500px]
               px-4
               sm:px-8
               lg:px-12"
    >

        {{-- =================================================
             HEADER
        ================================================== --}}

        <div class="mb-8">

            <p
                class="text-[9px]
                       font-semibold
                       uppercase
                       tracking-[0.28em]
                       text-[#9B7B43]"
            >
                Pemilihan Petak
            </p>

            <div
                class="mt-3
                       flex
                       flex-col
                       gap-3
                       lg:flex-row
                       lg:items-end
                       lg:justify-between"
            >

                <div>

                    <h2
                        class="font-serif
                               text-3xl
                               text-[#173F32]
                               sm:text-4xl"
                    >
                        Pilih Petak Makam
                    </h2>

                    <p
                        class="mt-2
                               max-w-xl
                               text-sm
                               leading-relaxed
                               text-gray-500"
                    >
                        Pilih petak yang tersedia sesuai dengan
                        jenis makam dan kebutuhan Anda.
                    </p>

                </div>

            </div>

        </div>


        {{-- =================================================
             MAIN GRID
        ================================================== --}}

        <div
            id="petakMainGrid"
            class="grid
                   grid-cols-1
                   gap-5
                   lg:grid-cols-[250px_minmax(0,1fr)_300px]
                   lg:gap-6
                   transition-all
                   duration-300"
        >

            {{-- =================================================
                 LEFT : DETAIL MAKAM
            ================================================== --}}

            <aside
                class="h-fit
                       rounded-[24px]
                       bg-[#DEDEDA]
                       p-5
                       sm:p-6"
            >

                <h3
                    class="text-sm
                           font-semibold
                           text-[#173F32]"
                >
                    Detail Makam
                </h3>

                <p
                    class="mt-1
                           text-[11px]
                           leading-relaxed
                           text-gray-500"
                >
                    Gunakan filter untuk menemukan petak
                    yang sesuai.
                </p>


                {{-- CATEGORY --}}
                <div class="mt-5">

                    <p
                        class="mb-2
                               text-[10px]
                               font-medium
                               text-gray-500"
                    >
                        Jenis Makam
                    </p>

                    <div class="space-y-2">

                        {{-- SEMUA --}}
                        <button
                            type="button"
                            class="category-filter
                                   active
                                   flex
                                   w-full
                                   items-center
                                   justify-between
                                   rounded-xl
                                   bg-white
                                   px-4
                                   py-3
                                   text-left
                                   text-xs
                                   text-gray-700
                                   transition
                                   hover:bg-[#173F32]
                                   hover:text-white"
                            data-category="all"
                        >

                            <span>
                                Semua Kategori
                            </span>

                            <span class="category-count">
                                {{ $plots->count() }}
                            </span>

                        </button>


                        {{-- CATEGORY DATABASE --}}
                        @foreach($categories as $category)

                            <button
                                type="button"
                                class="category-filter
                                       flex
                                       w-full
                                       items-center
                                       justify-between
                                       rounded-xl
                                       bg-white
                                       px-4
                                       py-3
                                       text-left
                                       text-xs
                                       text-gray-700
                                       transition
                                       hover:bg-[#173F32]
                                       hover:text-white"
                                data-category="{{ $category->id }}"
                            >

                                <span>
                                    {{ $category->nama_kategori }}
                                </span>

                                <span
                                    class="text-[10px]
                                           opacity-60"
                                >
                                    {{ $category->plots->count() }}
                                </span>

                            </button>

                        @endforeach

                    </div>

                </div>


                {{-- STATUS --}}
                <div class="mt-5">

                    <p
                        class="mb-2
                               text-[10px]
                               font-medium
                               text-gray-500"
                    >
                        Status Petak
                    </p>

                    <select
                        id="statusFilter"
                        class="w-full
                               rounded-xl
                               border-0
                               bg-white
                               px-3
                               py-3
                               text-xs
                               text-gray-700
                               outline-none
                               focus:ring-2
                               focus:ring-[#173F32]/20"
                    >

                        <option value="all">
                            Semua Status
                        </option>

                        <option value="AVAILABLE">
                            Tersedia
                        </option>

                        <option value="BOOKED">
                            Sedang Diproses
                        </option>

                        <option value="OCCUPIED">
                            Terisi
                        </option>

                    </select>

                </div>


                {{-- LEGEND --}}
                <div
                    class="mt-6
                           border-t
                           border-black/10
                           pt-5"
                >

                    <p
                        class="mb-3
                               text-[10px]
                               font-medium
                               text-gray-500"
                    >
                        Keterangan
                    </p>

                    <div class="space-y-3">

                        <div class="flex items-center gap-2">

                            <span
                                class="h-2.5
                                       w-2.5
                                       rounded-full
                                       bg-[#275B49]"
                            ></span>

                            <span
                                class="text-[10px]
                                       text-gray-600"
                            >
                                Tersedia
                            </span>

                        </div>


                        <div class="flex items-center gap-2">

                            <span
                                class="h-2.5
                                       w-2.5
                                       rounded-full
                                       bg-[#C9B83E]"
                            ></span>

                            <span
                                class="text-[10px]
                                       text-gray-600"
                            >
                                Sedang diproses
                            </span>

                        </div>


                        <div class="flex items-center gap-2">

                            <span
                                class="h-2.5
                                       w-2.5
                                       rounded-full
                                       bg-red-500"
                            ></span>

                            <span
                                class="text-[10px]
                                       text-gray-600"
                            >
                                Terisi
                            </span>

                        </div>

                    </div>

                </div>

            </aside>


            {{-- =================================================
                 CENTER
            ================================================== --}}

            <div
                id="petakCenter"
                class="min-w-0 transition-all duration-300"
            >

                {{-- =================================================
                     TABS
                ================================================== --}}

                <div
                    class="mb-4
                           flex
                           max-w-full
                           overflow-x-auto
                           rounded-full
                           bg-[#DCDCD8]
                           p-1"
                >

                    {{-- SEMUA --}}
                    <button
                        type="button"
                        class="map-tab
                               active
                               shrink-0
                               rounded-full
                               bg-[#275B49]
                               px-5
                               py-2.5
                               text-[10px]
                               font-medium
                               text-white"
                        data-view="semua"
                    >
                        Semua
                    </button>


                    {{-- DENAH --}}
                    <button
                        type="button"
                        class="map-tab
                               shrink-0
                               rounded-full
                               px-5
                               py-2.5
                               text-[10px]
                               font-medium
                               text-gray-600
                               transition"
                        data-view="denah"
                    >
                        Denah Makam
                    </button>


                    {{-- PETA --}}
                    <button
                        type="button"
                        class="map-tab
                               shrink-0
                               rounded-full
                               px-5
                               py-2.5
                               text-[10px]
                               font-medium
                               text-gray-600
                               transition"
                        data-view="peta"
                    >
                        Peta Lokasi
                    </button>

                </div>


                {{-- =================================================
                     VIEW SEMUA
                ================================================== --}}

                <div
                    id="viewSemua"
                    class="map-view"
                >

                    {{-- =================================================
                         INFORMASI KATEGORI
                         
                         MUNCUL HANYA KETIKA SINGLE / COUPLE / FAMILY
                         DIPILIH
                    ================================================== --}}

                    <div
                        id="categoryInfoContainer"
                        class="mb-4"
                    >

                        @foreach($categories as $category)

                            <div
                                class="category-info
                                       hidden
                                       overflow-hidden
                                       rounded-[24px]
                                       border
                                       border-[#D4B675]/30
                                       bg-white
                                       shadow-sm"
                                data-category-info="{{ $category->id }}"
                            >

                                {{-- HEADER INFORMASI --}}
                                <div
                                    class="border-b
                                           border-black/5
                                           bg-[#173F32]
                                           px-5
                                           py-4
                                           sm:px-6"
                                >

                                    <div
                                        class="flex
                                               flex-col
                                               gap-2
                                               sm:flex-row
                                               sm:items-center
                                               sm:justify-between"
                                    >

                                        <div>

                                            <p
                                                class="text-[9px]
                                                       font-semibold
                                                       uppercase
                                                       tracking-[0.25em]
                                                       text-[#D4B675]"
                                            >
                                                Informasi Kategori
                                            </p>

                                            <h3
                                                class="mt-1
                                                       font-serif
                                                       text-xl
                                                       text-white
                                                       sm:text-2xl"
                                            >
                                                {{ $category->nama_kategori }}
                                            </h3>

                                        </div>


                                        {{-- JUMLAH PETAK --}}
                                        <div
                                            class="rounded-full
                                                   bg-white/10
                                                   px-4
                                                   py-2"
                                        >

                                            <span
                                                class="text-[10px]
                                                       text-white/70"
                                            >
                                                {{ $category->plots->count() }}
                                                Petak
                                            </span>

                                        </div>

                                    </div>

                                </div>


                                {{-- ISI INFORMASI --}}
                                <div class="p-5 sm:p-6">

                                    <div
                                        class="grid
                                               grid-cols-1
                                               gap-4
                                               sm:grid-cols-3"
                                    >

                                        {{-- LUAS --}}
                                        <div
                                            class="rounded-2xl
                                                   bg-[#F5F4EF]
                                                   p-4"
                                        >

                                            <p
                                                class="text-[9px]
                                                       font-semibold
                                                       uppercase
                                                       tracking-[0.15em]
                                                       text-gray-400"
                                            >
                                                Luas Petak
                                            </p>

                                            <p
                                                class="mt-2
                                                       text-sm
                                                       font-semibold
                                                       text-[#173F32]"
                                            >
                                                {{ $category->luas ?? '-' }}
                                            </p>

                                        </div>


                                        {{-- HARGA --}}
                                        <div
                                            class="rounded-2xl
                                                   bg-[#F5F4EF]
                                                   p-4"
                                        >

                                            <p
                                                class="text-[9px]
                                                       font-semibold
                                                       uppercase
                                                       tracking-[0.15em]
                                                       text-gray-400"
                                            >
                                                Harga Petak
                                            </p>

                                            <p
                                                class="mt-2
                                                       text-sm
                                                       font-semibold
                                                       text-[#173F32]"
                                            >
                                                Rp
                                                {{ number_format($category->harga_cash ?? 0, 0, ',', '.') }}
                                            </p>

                                        </div>


                                        {{-- BOOKING FEE --}}
                                        <div
                                            class="rounded-2xl
                                                   bg-[#F5F4EF]
                                                   p-4"
                                        >

                                            <p
                                                class="text-[9px]
                                                       font-semibold
                                                       uppercase
                                                       tracking-[0.15em]
                                                       text-gray-400"
                                            >
                                                Booking Fee
                                            </p>

                                            <p
                                                class="mt-2
                                                       text-sm
                                                       font-semibold
                                                       text-[#173F32]"
                                            >
                                                Rp
                                                {{ number_format($category->booking_fee ?? 0, 0, ',', '.') }}
                                            </p>

                                        </div>

                                    </div>


                                    {{-- DESKRIPSI --}}
                                    @if(!empty($category->deskripsi))

                                        <div
                                            class="mt-4
                                                   rounded-2xl
                                                   bg-[#F8F7F2]
                                                   p-4"
                                        >

                                            <p
                                                class="text-[9px]
                                                       font-semibold
                                                       uppercase
                                                       tracking-[0.15em]
                                                       text-[#9B7B43]"
                                            >
                                                Tentang {{ $category->nama_kategori }}
                                            </p>

                                            <p
                                                class="mt-2
                                                       text-xs
                                                       leading-relaxed
                                                       text-gray-600"
                                            >
                                                {{ $category->deskripsi }}
                                            </p>

                                        </div>

                                    @endif

                                </div>

                            </div>

                        @endforeach

                    </div>


                    {{-- =================================================
                         KOTAK PETAK
                    ================================================== --}}

                    <div
                        class="rounded-[28px]
                               border
                               border-black/5
                               bg-[#D1D1CC]
                               p-3
                               sm:p-4"
                    >

                        <div
                            id="plotsContainer"
                            class="plots-slider
                                   grid
                                   grid-flow-col
                                   grid-rows-4
                                   auto-cols-[calc((100%-0.5rem*3)/4)]
                                   sm:grid-rows-5
                                   sm:auto-cols-[calc((100%-0.5rem*6)/7)]
                                   gap-2
                                   overflow-x-auto
                                   overscroll-x-contain
                                   scroll-smooth
                                   snap-x
                                   snap-mandatory
                                   pb-2
                                   scrollbar-thin
                                   scrollbar-thumb-[#9B9B95]
                                   scrollbar-track-transparent"
                        >

                            @forelse($plots as $plot)

                                @php

                                    $statusClass = match($plot->status) {

                                        'AVAILABLE'
                                            => 'bg-[#275B49] text-white border-[#275B49]',

                                        'BOOKED'
                                            => 'bg-[#C9B83E] text-[#173F32] border-[#C9B83E]',

                                        'OCCUPIED'
                                            => 'bg-red-500 text-white border-red-500',

                                        default
                                            => 'bg-gray-400 text-white border-gray-400',

                                    };


                                    $statusText = match($plot->status) {

                                        'AVAILABLE'
                                            => 'Tersedia',

                                        'BOOKED'
                                            => 'Sedang Diproses',

                                        'OCCUPIED'
                                            => 'Terisi',

                                        default
                                            => $plot->status,

                                    };

                                @endphp


                                {{-- PETAK --}}
                                <button
                                    type="button"

                                    class="plot-item
                                           aspect-square
                                           snap-start
                                           rounded-xl
                                           border-2
                                           p-2
                                           transition-all
                                           duration-200
                                           hover:-translate-y-0.5
                                           hover:shadow-md
                                           {{ $statusClass }}"

                                    data-id="{{ $plot->id }}"
                                    data-category="{{ $plot->category_id }}"
                                    data-code="{{ $plot->kode_plot }}"
                                    data-type="{{ $plot->category->nama_kategori ?? '-' }}"
                                    data-area="{{ $plot->category->luas ?? '-' }}"
                                    data-land="{{ $plot->jenis_lahan ?? '-' }}"
                                    data-price="{{ number_format($plot->category->harga_cash ?? 0, 0, ',', '.') }}"
                                    data-status="{{ $plot->status }}"
                                    data-status-text="{{ $statusText }}"
                                    data-description="{{ $plot->deskripsi ?? 'Tidak ada deskripsi.' }}"
                                    data-booking-url="{{ $plot->status === 'AVAILABLE' ? route('booking.create', $plot) : '' }}"
                                    data-image="{{ $plot->gambar ? \Illuminate\Support\Facades\Storage::url($plot->gambar) : '' }}"
                                >

                                    <div
                                        class="flex
                                               h-full
                                               flex-col
                                               items-center
                                               justify-center"
                                    >

                                        <span
                                            class="text-[10px]
                                                   font-semibold
                                                   sm:text-xs"
                                        >
                                            {{ $plot->kode_plot }}
                                        </span>

                                        <span
                                            class="mt-1
                                                   text-[7px]
                                                   opacity-70
                                                   sm:text-[8px]"
                                        >
                                            {{ $plot->category->nama_kategori ?? '-' }}
                                        </span>

                                    </div>

                                </button>

                            @empty

                                <div
                                    class="col-span-full
                                           rounded-2xl
                                           bg-white/60
                                           px-5
                                           py-16
                                           text-center"
                                >

                                    <p
                                        class="font-serif
                                               text-xl
                                               text-[#173F32]"
                                    >
                                        Belum ada petak
                                    </p>

                                    <p
                                        class="mt-2
                                               text-xs
                                               text-gray-500"
                                    >
                                        Data petak makam belum tersedia.
                                    </p>

                                </div>

                            @endforelse

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     VIEW DENAH
                ================================================== --}}

                <div
                    id="viewDenah"
                    class="map-view hidden"
                >

                    <div
                        class="overflow-hidden
                               rounded-[28px]
                               border
                               border-black/5
                               bg-white
                               shadow-sm"
                    >

                        {{-- HEADER DENAH --}}
                        <div
                            class="border-b
                                   border-black/5
                                   px-5
                                   py-4"
                        >

                            <p
                                class="text-[10px]
                                       font-semibold
                                       uppercase
                                       tracking-[0.2em]
                                       text-[#173F32]"
                            >
                                Denah Makam
                            </p>

                            <p
                                class="mt-1
                                       text-[10px]
                                       text-gray-500"
                            >
                                Gambaran tata letak petak
                                makam Tanah Salama’
                            </p>

                        </div>


                        {{-- DENAH --}}
                        <div
                            class="bg-[#F5F4EF]
                                   p-3
                                   sm:p-5"
                        >

                            <div
                                class="overflow-auto
                                       rounded-2xl
                                       border
                                       border-black/5
                                       bg-white"
                            >

                                <img
                                    src="{{ asset('images/Screenshot 2026-09-18 164504.png') }}"
                                    alt="Denah Makam Tanah Salama’"

                                    class="block
                                           h-auto
                                           min-w-[900px]
                                           w-full
                                           object-contain"
                                >

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     VIEW PETA
                ================================================== --}}

                <div
                    id="viewPeta"
                    class="map-view hidden"
                >

                    <div
                        class="overflow-hidden
                               rounded-[28px]
                               border
                               border-black/5
                               bg-white
                               shadow-sm"
                    >

                        <div
                            class="flex
                                   flex-col
                                   gap-1
                                   border-b
                                   border-black/5
                                   px-5
                                   py-4
                                   sm:px-6"
                        >

                            <div
                                class="flex
                                       items-center
                                       gap-3"
                            >

                                <span
                                    class="flex
                                           h-9
                                           w-9
                                           shrink-0
                                           items-center
                                           justify-center
                                           rounded-full
                                           bg-[#173F32]"
                                >

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 text-[#D4B675]"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.6"
                                    >

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M12 21s7-4.35 7-10a7 7 0 10-14 0c0 5.65 7 10 7 10z"
                                        />

                                        <circle
                                            cx="12"
                                            cy="11"
                                            r="2"
                                        />

                                    </svg>

                                </span>

                                <div>

                                    <p
                                        class="text-[10px]
                                               font-semibold
                                               uppercase
                                               tracking-[0.2em]
                                               text-[#173F32]"
                                    >
                                        Peta Lokasi
                                    </p>

                                    <p
                                        class="mt-1
                                               text-[10px]
                                               leading-relaxed
                                               text-gray-500"
                                    >
                                        Lokasi TPU Tanah Salama’
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- GOOGLE MAPS --}}
                        <div
                            class="relative
                                   h-[420px]
                                   w-full
                                   bg-[#E8E8E3]
                                   sm:h-[520px]
                                   lg:h-[620px]"
                        >

                            <iframe
                                src="https://www.google.com/maps/embed?pb=GANTI_DENGAN_LINK_EMBED_GOOGLE_MAPS"
                                width="100%"
                                height="100%"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                                title="Peta Lokasi TPU Tanah Salama’"
                                class="absolute inset-0 h-full w-full"
                            ></iframe>

                        </div>


                        <div
                            class="flex
                                   flex-col
                                   gap-3
                                   border-t
                                   border-black/5
                                   bg-[#F8F7F2]
                                   px-5
                                   py-4
                                   sm:flex-row
                                   sm:items-center
                                   sm:justify-between
                                   sm:px-6"
                        >

                            <div>

                                <p
                                    class="text-[10px]
                                           font-medium
                                           text-[#173F32]"
                                >
                                    TPU Tanah Salama’
                                </p>

                                <p
                                    class="mt-1
                                           text-[9px]
                                           text-gray-500"
                                >
                                    Gunakan peta untuk melihat lokasi pemakaman.
                                </p>

                            </div>


                            <a
                                href="https://www.google.com/maps"
                                target="_blank"
                                rel="noopener noreferrer"

                                class="inline-flex
                                       items-center
                                       justify-center
                                       gap-2
                                       rounded-full
                                       bg-[#173F32]
                                       px-4
                                       py-2.5
                                       text-[10px]
                                       font-semibold
                                       text-white
                                       transition
                                       hover:bg-[#275B49]"
                            >

                                Buka Google Maps

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-3.5 w-3.5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.7"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M13 5h6m0 0v6m0-6L10 14"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M19 14v4a1 1 0 01-1 1H6a1 1 0 011-1v-4"
                                    />

                                </svg>

                            </a>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 RIGHT : DETAIL PETAK
            ================================================== --}}

            <aside
                id="desktopDetailPetak"
                class="hidden
                       lg:block
                       h-fit
                       rounded-[24px]
                       bg-[#DEDEDA]
                       p-5
                       sm:p-6
                       lg:sticky
                       lg:top-6
                       transition-all
                       duration-300"
            >

                {{-- FOTO --}}
                <div
                    id="detailPreview"
                    class="relative
                           h-[180px]
                           w-full
                           overflow-hidden
                           rounded-[20px]
                           bg-[#C8C8C2]
                           sm:h-[200px]"
                >

                    <div
                        class="flex
                               h-full
                               items-center
                               justify-center"
                    >

                        <div class="px-4 text-center">

                            <div
                                class="mx-auto
                                       flex
                                       h-12
                                       w-12
                                       items-center
                                       justify-center
                                       rounded-xl
                                       bg-[#173F32]/10"
                            >

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 text-[#173F32]/60"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M4 16l4-4a3 3 0 014 0l4 4m-2-2l1-1a3 3 0 014 0l1 1M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2 2z"
                                    />

                                </svg>

                            </div>

                            <p
                                class="mt-3
                                       text-[10px]
                                       text-gray-500"
                            >
                                Pilih petak untuk melihat detail
                            </p>

                        </div>

                    </div>

                </div>


                {{-- TITLE --}}
                <div
                    class="mt-5
                           flex
                           items-center
                           justify-between
                           gap-3"
                >

                    <h3
                        class="font-serif
                               text-xl
                               text-[#173F32]"
                    >
                        Detail Petak
                    </h3>

                    <span
                        id="detailStatus"
                        class="hidden
                               rounded-full
                               px-3
                               py-1
                               text-[9px]
                               font-medium"
                    >
                        —
                    </span>

                </div>


                {{-- DETAILS --}}
                <div
                    class="mt-4
                           border-t
                           border-black/10
                           pt-4"
                >

                    <div class="space-y-3 text-xs">

                        {{-- KODE --}}
                        <div
                            class="flex
                                   items-center
                                   justify-between
                                   gap-4"
                        >

                            <span class="text-gray-500">
                                Kode Petak
                            </span>

                            <span
                                id="detailCode"
                                class="font-medium
                                       text-[#173F32]"
                            >
                                —
                            </span>

                        </div>


                        {{-- TIPE --}}
                        <div
                            class="flex
                                   items-center
                                   justify-between
                                   gap-4"
                        >

                            <span class="text-gray-500">
                                Tipe Makam
                            </span>

                            <span
                                id="detailType"
                                class="text-right
                                       font-medium
                                       text-[#173F32]"
                            >
                                —
                            </span>

                        </div>


                        {{-- LUAS --}}
                        <div
                            class="flex
                                   items-center
                                   justify-between
                                   gap-4"
                        >

                            <span class="text-gray-500">
                                Luas Petak
                            </span>

                            <span
                                id="detailArea"
                                class="text-right
                                       font-medium
                                       text-[#173F32]"
                            >
                                —
                            </span>

                        </div>


                        {{-- LAHAN --}}
                        <div
                            class="flex
                                   items-center
                                   justify-between
                                   gap-4"
                        >

                            <span class="text-gray-500">
                                Jenis Lahan
                            </span>

                            <span
                                id="detailLand"
                                class="font-medium
                                       text-[#173F32]"
                            >
                                —
                            </span>

                        </div>


                        {{-- HARGA --}}
                        <div
                            class="flex
                                   items-center
                                   justify-between
                                   gap-4"
                        >

                            <span class="text-gray-500">
                                Harga
                            </span>

                            <span
                                id="detailPrice"
                                class="font-semibold
                                       text-[#173F32]"
                            >
                                —
                            </span>

                        </div>

                    </div>


                    {{-- DESCRIPTION --}}
                    <div
                        class="mt-4
                               rounded-xl
                               bg-white/60
                               p-3"
                    >

                        <p
                            class="text-[9px]
                                   font-semibold
                                   uppercase
                                   tracking-[0.12em]
                                   text-gray-400"
                        >
                            Informasi
                        </p>

                        <p
                            id="detailDescription"
                            class="mt-1
                                   text-[10px]
                                   leading-relaxed
                                   text-gray-500"
                        >
                            Pilih petak terlebih dahulu
                            untuk melihat informasi.
                        </p>

                    </div>

                </div>


                {{-- BOOKING BUTTON --}}
                <a
                    id="detailButton"
                    href="#"

                    class="pointer-events-none
                           mt-6
                           flex
                           w-full
                           items-center
                           justify-center
                           gap-2
                           rounded-full
                           bg-[#275B49]/30
                           px-4
                           py-3
                           text-xs
                           font-semibold
                           text-white
                           transition"
                >

                    <span id="detailButtonText">
                        Booking Petak
                    </span>

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.6"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M5 12h14M13 6l6 6-6 6"
                        />

                    </svg>

                </a>

            </aside>

        </div>

    </div>


    {{-- =========================================================
         MOBILE DETAIL OVERLAY
    ========================================================== --}}

    <div
        id="mobileDetailOverlay"
        class="fixed
               inset-0
               z-[80]
               hidden
               bg-black/40
               backdrop-blur-[2px]
               lg:hidden"
        aria-hidden="true"
    ></div>


    {{-- =========================================================
         MOBILE DETAIL SHEET
    ========================================================== --}}

    <div
        id="mobileDetailSheet"
        class="fixed
               inset-x-0
               bottom-0
               z-[90]
               translate-y-full
               rounded-t-[28px]
               bg-[#DEDEDA]
               shadow-2xl
               transition-transform
               duration-300
               ease-out
               lg:hidden"
        aria-hidden="true"
    >

        <div
            class="mx-auto
                   max-h-[82vh]
                   max-w-lg
                   overflow-y-auto
                   px-5
                   pb-6
                   pt-3
                   sm:px-6"
        >

            {{-- HANDLE --}}
            <div
                class="mx-auto
                       h-1.5
                       w-12
                       rounded-full
                       bg-black/15"
            ></div>


            {{-- HEADER --}}
            <div
                class="mt-4
                       flex
                       items-center
                       justify-between
                       gap-4"
            >

                <div>

                    <p
                        class="text-[9px]
                               font-semibold
                               uppercase
                               tracking-[0.2em]
                               text-[#9B7B43]"
                    >
                        Petak Dipilih
                    </p>

                    <h3
                        class="mt-1
                               font-serif
                               text-2xl
                               text-[#173F32]"
                    >
                        Detail Petak
                    </h3>

                </div>


                <button
                    type="button"
                    id="closeMobileDetail"
                    class="flex
                           h-10
                           w-10
                           items-center
                           justify-center
                           rounded-full
                           bg-white
                           text-[#173F32]
                           shadow-sm
                           transition
                           hover:bg-[#F5F4EF]"
                    aria-label="Tutup detail petak"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.7"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12"
                        />

                    </svg>

                </button>

            </div>


            {{-- PREVIEW --}}
            <div
                id="mobileDetailPreview"
                class="relative
                       mt-4
                       h-[150px]
                       w-full
                       overflow-hidden
                       rounded-[20px]
                       bg-[#C8C8C2]
                       sm:h-[180px]"
            >

                <div
                    class="flex
                           h-full
                           items-center
                           justify-center"
                >

                    <p
                        class="text-[10px]
                               text-gray-500"
                    >
                        Pilih petak untuk melihat detail
                    </p>

                </div>

            </div>


            {{-- STATUS + CODE --}}
            <div
                class="mt-4
                       flex
                       items-center
                       justify-between
                       gap-3"
            >

                <div>

                    <p
                        class="text-[9px]
                               uppercase
                               tracking-[0.15em]
                               text-gray-400"
                    >
                        Kode Petak
                    </p>

                    <p
                        id="mobileDetailCode"
                        class="mt-1
                               font-serif
                               text-xl
                               text-[#173F32]"
                    >
                        —
                    </p>

                </div>


                <span
                    id="mobileDetailStatus"
                    class="hidden
                           rounded-full
                           px-3
                           py-1
                           text-[9px]
                           font-medium"
                >
                    —
                </span>

            </div>


            {{-- DETAILS --}}
            <div
                class="mt-4
                       rounded-2xl
                       bg-white/60
                       p-4"
            >

                <div
                    class="grid
                           grid-cols-2
                           gap-x-5
                           gap-y-4
                           text-xs"
                >

                    <div>

                        <p class="text-gray-500">
                            Tipe Makam
                        </p>

                        <p
                            id="mobileDetailType"
                            class="mt-1
                                   font-medium
                                   text-[#173F32]"
                        >
                            —
                        </p>

                    </div>


                    <div>

                        <p class="text-gray-500">
                            Luas Petak
                        </p>

                        <p
                            id="mobileDetailArea"
                            class="mt-1
                                   font-medium
                                   text-[#173F32]"
                        >
                            —
                        </p>

                    </div>


                    <div>

                        <p class="text-gray-500">
                            Jenis Lahan
                        </p>

                        <p
                            id="mobileDetailLand"
                            class="mt-1
                                   font-medium
                                   text-[#173F32]"
                        >
                            —
                        </p>

                    </div>


                    <div>

                        <p class="text-gray-500">
                            Harga
                        </p>

                        <p
                            id="mobileDetailPrice"
                            class="mt-1
                                   font-semibold
                                   text-[#173F32]"
                        >
                            —
                        </p>

                    </div>

                </div>


                {{-- INFORMASI --}}
                <div
                    class="mt-4
                           border-t
                           border-black/10
                           pt-4"
                >

                    <p
                        class="text-[9px]
                               font-semibold
                               uppercase
                               tracking-[0.12em]
                               text-gray-400"
                    >
                        Informasi
                    </p>

                    <p
                        id="mobileDetailDescription"
                        class="mt-1
                               text-[10px]
                               leading-relaxed
                               text-gray-500"
                    >
                        Pilih petak terlebih dahulu
                        untuk melihat informasi.
                    </p>

                </div>

            </div>


            {{-- BOOKING BUTTON --}}
            <a
                id="mobileDetailButton"
                href="#"

                class="pointer-events-none
                       mt-4
                       flex
                       w-full
                       items-center
                       justify-center
                       gap-2
                       rounded-full
                       bg-[#275B49]/30
                       px-4
                       py-3.5
                       text-xs
                       font-semibold
                       text-white
                       transition"
            >

                <span id="mobileDetailButtonText">
                    Booking Petak
                </span>

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.6"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5 12h14M13 6l6 6-6 6"
                    />

                </svg>

            </a>

        </div>

    </div>

</section>


{{-- =========================================================
     CTA
========================================================= --}}

<section
    class="bg-[#173F32]
           px-5
           py-14
           sm:py-16"
>

    <div
        class="mx-auto
               max-w-3xl
               text-center"
    >

        <p
            class="text-[9px]
                   font-semibold
                   uppercase
                   tracking-[0.3em]
                   text-[#D4B675]"
        >
            Tanah Salama’
        </p>


        <h2
            class="mt-3
                   font-serif
                   text-3xl
                   text-white
                   sm:text-4xl"
        >
            Temukan tempat yang tepat
        </h2>


        <p
            class="mx-auto
                   mt-4
                   max-w-xl
                   text-sm
                   leading-relaxed
                   text-white/60"
        >
            Pilih petak makam langsung dari halaman
            Tanah Salama’ dan lanjutkan proses booking
            dengan mudah.
        </p>


        <div class="mt-7">

            <a
                href="#peta-makam"

                class="inline-flex
                       items-center
                       gap-3
                       rounded-full
                       bg-[#D4B675]
                       px-6
                       py-3
                       text-sm
                       font-medium
                       text-[#173F32]
                       transition
                       hover:bg-[#E4CB92]"
            >

                Lihat Petak Makam

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.6"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5 12h14M13 6l6 6-6 6"
                    />

                </svg>

            </a>

        </div>

    </div>

</section>


{{-- =========================================================
     STYLE
========================================================= --}}

<style>

    .map-tab.active {
        background-color: #275B49;
        color: white;
    }

    .map-tab:not(.active) {
        background-color: transparent;
        color: #4B5563;
    }

    .category-filter.active {
        background-color: #173F32;
        color: white;
    }

    .plot-item.selected {
        outline: 3px solid rgba(23, 63, 50, 0.25);
        outline-offset: 2px;
        transform: translateY(-2px);
    }

</style>


{{-- =========================================================
     JAVASCRIPT
========================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    /* =====================================================
       ELEMENT
    ====================================================== */

    const tabs =
        document.querySelectorAll('.map-tab');

    const viewSemua =
        document.getElementById('viewSemua');

    const viewDenah =
        document.getElementById('viewDenah');

    const viewPeta =
        document.getElementById('viewPeta');

    const plots =
        document.querySelectorAll('.plot-item');

    const categoryFilters =
        document.querySelectorAll('.category-filter');

    const categoryInfos =
        document.querySelectorAll('.category-info');

    const statusFilter =
        document.getElementById('statusFilter');


    /* =====================================================
       MAIN GRID
    ====================================================== */

    const petakMainGrid =
        document.getElementById('petakMainGrid');

    const desktopDetailPetak =
        document.getElementById('desktopDetailPetak');


    /* =====================================================
       DETAIL PETAK
    ====================================================== */

    const detailPreview =
        document.getElementById('detailPreview');

    const detailStatus =
        document.getElementById('detailStatus');

    const detailCode =
        document.getElementById('detailCode');

    const detailType =
        document.getElementById('detailType');

    const detailArea =
        document.getElementById('detailArea');

    const detailLand =
        document.getElementById('detailLand');

    const detailPrice =
        document.getElementById('detailPrice');

    const detailDescription =
        document.getElementById('detailDescription');

    const detailButton =
        document.getElementById('detailButton');

    const detailButtonText =
        document.getElementById('detailButtonText');


    /* =====================================================
       MOBILE DETAIL
    ====================================================== */

    const mobileDetailOverlay =
        document.getElementById('mobileDetailOverlay');

    const mobileDetailSheet =
        document.getElementById('mobileDetailSheet');

    const closeMobileDetail =
        document.getElementById('closeMobileDetail');

    const mobileDetailPreview =
        document.getElementById('mobileDetailPreview');

    const mobileDetailStatus =
        document.getElementById('mobileDetailStatus');

    const mobileDetailCode =
        document.getElementById('mobileDetailCode');

    const mobileDetailType =
        document.getElementById('mobileDetailType');

    const mobileDetailArea =
        document.getElementById('mobileDetailArea');

    const mobileDetailLand =
        document.getElementById('mobileDetailLand');

    const mobileDetailPrice =
        document.getElementById('mobileDetailPrice');

    const mobileDetailDescription =
        document.getElementById('mobileDetailDescription');

    const mobileDetailButton =
        document.getElementById('mobileDetailButton');

    const mobileDetailButtonText =
        document.getElementById('mobileDetailButtonText');


    /* =====================================================
       LAYOUT DENAH / PETA
    ====================================================== */

    function setDenahLayout() {

        if (!petakMainGrid || !desktopDetailPetak) {
            return;
        }

        /*
         * SEMBUNYIKAN DETAIL PETAK
         */

        desktopDetailPetak.classList.add(
            'hidden'
        );

        desktopDetailPetak.classList.remove(
            'lg:block'
        );


        /*
         * UBAH GRID MENJADI 2 KOLOM
         */

        petakMainGrid.classList.remove(
            'lg:grid-cols-[250px_minmax(0,1fr)_300px]'
        );

        petakMainGrid.classList.add(
            'lg:grid-cols-[250px_minmax(0,1fr)]'
        );

    }


    function setNormalLayout() {

        if (!petakMainGrid || !desktopDetailPetak) {
            return;
        }

        /*
         * DETAIL PETAK
         *
         * Mobile:
         * - Tetap hidden agar tidak muncul sebagai kotak
         *   permanen di bawah grid.
         *
         * Desktop:
         * - Tampil mulai breakpoint lg melalui lg:block.
         *
         * Jangan remove class "hidden".
         */

        desktopDetailPetak.classList.add(
            'hidden'
        );

        desktopDetailPetak.classList.add(
            'lg:block'
        );


        /*
         * KEMBALIKAN GRID 3 KOLOM
         */

        petakMainGrid.classList.remove(
            'lg:grid-cols-[250px_minmax(0,1fr)]'
        );

        petakMainGrid.classList.add(
            'lg:grid-cols-[250px_minmax(0,1fr)_300px]'
        );

    }

    /* =====================================================
       INFORMASI KATEGORI
       
       ALL:
       - Informasi kategori hilang

       SINGLE / COUPLE / FAMILY:
       - Informasi kategori sesuai pilihan muncul
    ====================================================== */

    function updateCategoryInfo(categoryId) {

        /*
         * SEMBUNYIKAN SEMUA INFORMASI
         */

        categoryInfos.forEach(function (info) {

            info.classList.add(
                'hidden'
            );

        });


        /*
         * JIKA SEMUA KATEGORI
         * MAKA TIDAK ADA INFORMASI YANG DITAMPILKAN
         */

        if (
            !categoryId ||
            categoryId === 'all'
        ) {

            return;

        }


        /*
         * TAMPILKAN INFORMASI
         * SESUAI CATEGORY ID
         */

        categoryInfos.forEach(function (info) {

            if (
                info.dataset.categoryInfo ===
                categoryId
            ) {

                info.classList.remove(
                    'hidden'
                );

            }

        });

    }


    /* =====================================================
       MOBILE DETAIL
    ====================================================== */

    function openMobileDetail() {

        if (!mobileDetailSheet || !mobileDetailOverlay) {
            return;
        }

        mobileDetailOverlay.classList.remove(
            'hidden'
        );

        mobileDetailSheet.classList.remove(
            'translate-y-full'
        );

        mobileDetailSheet.classList.add(
            'translate-y-0'
        );

        mobileDetailOverlay.setAttribute(
            'aria-hidden',
            'false'
        );

        mobileDetailSheet.setAttribute(
            'aria-hidden',
            'false'
        );

        document.body.classList.add(
            'overflow-hidden'
        );

    }


    function closeMobileDetailSheet() {

        if (!mobileDetailSheet || !mobileDetailOverlay) {
            return;
        }

        mobileDetailSheet.classList.remove(
            'translate-y-0'
        );

        mobileDetailSheet.classList.add(
            'translate-y-full'
        );

        mobileDetailOverlay.setAttribute(
            'aria-hidden',
            'true'
        );

        mobileDetailSheet.setAttribute(
            'aria-hidden',
            'true'
        );

        setTimeout(function () {

            mobileDetailOverlay.classList.add(
                'hidden'
            );

            document.body.classList.remove(
                'overflow-hidden'
            );

        }, 300);

    }


    if (closeMobileDetail) {

        closeMobileDetail.addEventListener(
            'click',
            closeMobileDetailSheet
        );

    }


    if (mobileDetailOverlay) {

        mobileDetailOverlay.addEventListener(
            'click',
            closeMobileDetailSheet
        );

    }


    /* =====================================================
       UPDATE MOBILE DETAIL
    ====================================================== */

    function updateMobileDetail(data) {

        if (!mobileDetailSheet) {
            return;
        }

        mobileDetailCode.textContent =
            data.code;

        mobileDetailType.textContent =
            data.type;

        mobileDetailArea.textContent =
            data.area;

        mobileDetailLand.textContent =
            data.land;

        mobileDetailPrice.textContent =
            'Rp ' + data.price;

        mobileDetailDescription.textContent =
            data.description;


        /* FOTO */

        mobileDetailPreview.innerHTML = '';


        if (data.imageUrl) {

            const img =
                document.createElement('img');

            img.src =
                data.imageUrl;

            img.alt =
                'Foto petak ' + data.code;

            img.className =
                'h-full w-full object-cover';

            mobileDetailPreview.appendChild(
                img
            );

        }

        else {

            mobileDetailPreview.innerHTML = `

                <div class="flex h-full items-center justify-center">

                    <div class="px-4 text-center">

                        <div
                            class="mx-auto
                                   flex
                                   h-12
                                   w-12
                                   items-center
                                   justify-center
                                   rounded-xl
                                   bg-[#173F32]/10"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-[#173F32]/60"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.5"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4 16l4-4a3 3 0 014 0l4 4m-2-2l1-1a3 3 0 014 0l1 1M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                />

                            </svg>

                        </div>

                        <p
                            class="mt-3
                                   text-[10px]
                                   text-gray-500"
                        >
                            Foto petak belum tersedia
                        </p>

                    </div>

                </div>

            `;

        }


        /* STATUS */

        mobileDetailStatus.className =
            'rounded-full px-3 py-1 text-[9px] font-medium';


        if (data.status === 'AVAILABLE') {

            mobileDetailStatus.classList.add(
                'bg-[#DDEDE4]',
                'text-[#275B49]'
            );

        }

        else if (data.status === 'BOOKED') {

            mobileDetailStatus.classList.add(
                'bg-[#EEE5A7]',
                'text-[#756900]'
            );

        }

        else if (data.status === 'OCCUPIED') {

            mobileDetailStatus.classList.add(
                'bg-red-100',
                'text-red-600'
            );

        }


        mobileDetailStatus.textContent =
            data.statusText;

        mobileDetailStatus.classList.remove(
            'hidden'
        );


        /* BOOKING */

        if (
            data.status === 'AVAILABLE' &&
            data.bookingUrl
        ) {

            mobileDetailButton.href =
                data.bookingUrl;

            mobileDetailButton.classList.remove(
                'pointer-events-none',
                'bg-[#275B49]/30'
            );

            mobileDetailButton.classList.add(
                'bg-[#275B49]',
                'hover:bg-[#173F32]'
            );

            mobileDetailButtonText.textContent =
                'Booking Petak';

        }

        else {

            mobileDetailButton.href =
                '#';

            mobileDetailButton.classList.add(
                'pointer-events-none',
                'bg-[#275B49]/30'
            );

            mobileDetailButton.classList.remove(
                'bg-[#275B49]',
                'hover:bg-[#173F32]'
            );


            if (data.status === 'BOOKED') {

                mobileDetailButtonText.textContent =
                    'Sedang Diproses';

            }

            else if (data.status === 'OCCUPIED') {

                mobileDetailButtonText.textContent =
                    'Petak Terisi';

            }

            else {

                mobileDetailButtonText.textContent =
                    'Tidak Tersedia';

            }

        }

    }


    /* =====================================================
       ESC
    ====================================================== */

    document.addEventListener(
        'keydown',
        function (event) {

            if (event.key === 'Escape') {

                closeMobileDetailSheet();

            }

        }
    );


    /* =====================================================
       TAB
    ====================================================== */

    tabs.forEach(function (tab) {

        tab.addEventListener(
            'click',
            function () {

                /*
                 * HAPUS ACTIVE
                 */

                tabs.forEach(function (item) {

                    item.classList.remove(
                        'active'
                    );

                });


                /*
                 * ACTIVE TAB
                 */

                this.classList.add(
                    'active'
                );


                const view =
                    this.dataset.view;


                /*
                 * SEMBUNYIKAN SEMUA VIEW
                 */

                viewSemua.classList.add(
                    'hidden'
                );

                viewDenah.classList.add(
                    'hidden'
                );

                viewPeta.classList.add(
                    'hidden'
                );


                /* =================================================
                   SEMUA
                ================================================== */

                if (view === 'semua') {

                    viewSemua.classList.remove(
                        'hidden'
                    );


                    /*
                     * DETAIL PETAK MUNCUL
                     */

                    setNormalLayout();

                }


                /* =================================================
                   DENAH
                ================================================== */

                if (view === 'denah') {

                    viewDenah.classList.remove(
                        'hidden'
                    );


                    /*
                     * DETAIL PETAK HILANG
                     */

                    setDenahLayout();


                    /*
                     * TUTUP MOBILE DETAIL
                     */

                    closeMobileDetailSheet();

                }


                /* =================================================
                   PETA
                ================================================== */

                if (view === 'peta') {

                    viewPeta.classList.remove(
                        'hidden'
                    );


                    /*
                     * DETAIL PETAK HILANG
                     */

                    setDenahLayout();


                    /*
                     * TUTUP MOBILE DETAIL
                     */

                    closeMobileDetailSheet();

                }

            }
        );

    });


    /* =====================================================
       FILTER KATEGORI
    ====================================================== */

    let selectedCategory =
        'all';


    /*
     * SAAT HALAMAN PERTAMA DIBUKA
     * INFORMASI KATEGORI TIDAK MUNCUL
     */

    updateCategoryInfo(
        selectedCategory
    );


    categoryFilters.forEach(function (button) {

        button.addEventListener(
            'click',
            function () {

                /*
                 * HAPUS ACTIVE DARI SEMUA BUTTON
                 */

                categoryFilters.forEach(
                    function (item) {

                        item.classList.remove(
                            'active'
                        );

                    }
                );


                /*
                 * ACTIVE BUTTON YANG DIPILIH
                 */

                this.classList.add(
                    'active'
                );


                /*
                 * SIMPAN CATEGORY
                 */

                selectedCategory =
                    this.dataset.category;


                /*
                 * UPDATE INFORMASI KATEGORI
                 */

                updateCategoryInfo(
                    selectedCategory
                );


                /*
                 * FILTER PETAK
                 */

                applyFilters();

            }
        );

    });


    /* =====================================================
       FILTER STATUS
    ====================================================== */

    if (statusFilter) {

        statusFilter.addEventListener(
            'change',
            applyFilters
        );

    }


    /* =====================================================
       APPLY FILTER
    ====================================================== */

    function applyFilters() {

        const selectedStatus =
            statusFilter
                ? statusFilter.value
                : 'all';


        plots.forEach(function (plot) {

            const plotCategory =
                plot.dataset.category;

            const plotStatus =
                plot.dataset.status;


            const categoryMatch =
                selectedCategory === 'all' ||
                plotCategory === selectedCategory;


            const statusMatch =
                selectedStatus === 'all' ||
                plotStatus === selectedStatus;


            if (
                categoryMatch &&
                statusMatch
            ) {

                plot.classList.remove(
                    'hidden'
                );

            }

            else {

                plot.classList.add(
                    'hidden'
                );

            }

        });

    }


    /* =====================================================
       DETAIL PETAK
    ====================================================== */

    plots.forEach(function (plot) {

        plot.addEventListener(
            'click',
            function () {

                /*
                 * HAPUS SELECTED
                 */

                plots.forEach(
                    function (item) {

                        item.classList.remove(
                            'selected'
                        );

                    }
                );


                this.classList.add(
                    'selected'
                );


                /*
                 * DATA
                 */

                const code =
                    this.dataset.code || '—';

                const type =
                    this.dataset.type || '—';

                const area =
                    this.dataset.area || '—';

                const land =
                    this.dataset.land || '—';

                const price =
                    this.dataset.price || '—';

                const status =
                    this.dataset.status || '';

                const statusText =
                    this.dataset.statusText || '—';

                const description =
                    this.dataset.description ||
                    'Tidak ada informasi.';

                const bookingUrl =
                    this.dataset.bookingUrl || '';

                const imageUrl =
                    this.dataset.image || '';


                const selectedPlotData = {

                    code: code,

                    type: type,

                    area: area,

                    land: land,

                    price: price,

                    status: status,

                    statusText: statusText,

                    description: description,

                    bookingUrl: bookingUrl,

                    imageUrl: imageUrl

                };


                /*
                 * MOBILE
                 */

                updateMobileDetail(
                    selectedPlotData
                );


                if (window.innerWidth < 1024) {

                    openMobileDetail();

                }


                /*
                 * DESKTOP FOTO
                 */

                detailPreview.innerHTML =
                    '';


                if (imageUrl) {

                    const img =
                        document.createElement(
                            'img'
                        );


                    img.src =
                        imageUrl;


                    img.alt =
                        'Foto petak ' + code;


                    img.className =
                        'h-full w-full object-cover';


                    detailPreview.appendChild(
                        img
                    );

                }

                else {

                    detailPreview.innerHTML = `

                        <div
                            class="flex
                                   h-full
                                   items-center
                                   justify-center"
                        >

                            <div
                                class="px-4
                                       text-center"
                            >

                                <div
                                    class="mx-auto
                                           flex
                                           h-12
                                           w-12
                                           items-center
                                           justify-center
                                           rounded-xl
                                           bg-[#173F32]/10"
                                >

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-6
                                               w-6
                                               text-[#173F32]/60"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                    >

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M4 16l4-4a3 3 0 014 0l4 4m-2-2l1-1a3 3 0 014 0l1 1M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2 2 2 0 002 2z"
                                        />

                                    </svg>

                                </div>


                                <p
                                    class="mt-3
                                           text-[10px]
                                           text-gray-500"
                                >
                                    Foto petak belum tersedia
                                </p>

                            </div>

                        </div>

                    `;

                }


                /*
                 * DETAIL TEXT
                 */

                detailCode.textContent =
                    code;

                detailType.textContent =
                    type;

                detailArea.textContent =
                    area;

                detailLand.textContent =
                    land;

                detailPrice.textContent =
                    'Rp ' + price;

                detailDescription.textContent =
                    description;


                /*
                 * STATUS
                 */

                detailStatus.className =
                    'rounded-full px-3 py-1 text-[9px] font-medium';


                if (status === 'AVAILABLE') {

                    detailStatus.classList.add(
                        'bg-[#DDEDE4]',
                        'text-[#275B49]'
                    );

                }

                else if (status === 'BOOKED') {

                    detailStatus.classList.add(
                        'bg-[#EEE5A7]',
                        'text-[#756900]'
                    );

                }

                else if (status === 'OCCUPIED') {

                    detailStatus.classList.add(
                        'bg-red-100',
                        'text-red-600'
                    );

                }


                detailStatus.textContent =
                    statusText;


                detailStatus.classList.remove(
                    'hidden'
                );


                /*
                 * BOOKING BUTTON
                 */

                if (
                    status === 'AVAILABLE' &&
                    bookingUrl
                ) {

                    detailButton.href =
                        bookingUrl;


                    detailButton.classList.remove(
                        'pointer-events-none',
                        'bg-[#275B49]/30'
                    );


                    detailButton.classList.add(
                        'bg-[#275B49]',
                        'hover:bg-[#173F32]'
                    );


                    detailButtonText.textContent =
                        'Booking Petak';

                }

                else {

                    detailButton.href =
                        '#';


                    detailButton.classList.add(
                        'pointer-events-none',
                        'bg-[#275B49]/30'
                    );


                    detailButton.classList.remove(
                        'bg-[#275B49]',
                        'hover:bg-[#173F32]'
                    );


                    if (status === 'BOOKED') {

                        detailButtonText.textContent =
                            'Sedang Diproses';

                    }

                    else if (status === 'OCCUPIED') {

                        detailButtonText.textContent =
                            'Petak Terisi';

                    }

                    else {

                        detailButtonText.textContent =
                            'Tidak Tersedia';

                    }

                }

            }

        );

    });


});

</script>

@endsection