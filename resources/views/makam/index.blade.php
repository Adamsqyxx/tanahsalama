@extends('layouts.app')

@section('title', 'Area Makam - Tanah Salama')

@section('content')

{{-- =========================================================
    HEADER
========================================================= --}}
<section class="bg-[#F4F1E9] pt-36 pb-20">

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="grid lg:grid-cols-12 gap-12 items-end">

            <div class="lg:col-span-8">

                <div class="flex items-center gap-3 mb-6">

                    <span class="w-2 h-2 rounded-full bg-[#71816B]"></span>

                    <span class="text-[#71816B]
                                 text-xs
                                 uppercase
                                 tracking-[0.28em]">
                        Area Makam
                    </span>

                </div>


                <h1 class="text-[#29352C]
                           text-5xl
                           sm:text-6xl
                           lg:text-7xl
                           font-medium
                           tracking-[-0.045em]
                           leading-[0.95]">

                    Temukan ruang
                    <span class="block text-[#71816B]">
                        yang sesuai.
                    </span>

                </h1>

            </div>


            <div class="lg:col-span-4">

                <p class="text-[#737B72]
                          leading-8
                          max-w-md
                          lg:ml-auto">

                    Jelajahi pilihan petak makam berdasarkan
                    kategori dan ketersediaannya. Pilih petak
                    yang sesuai sebelum melanjutkan proses booking.

                </p>

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
    LEGEND
========================================================= --}}
<section class="bg-white border-y border-[#E5E4DC]">

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="py-6
                    flex flex-col
                    sm:flex-row
                    sm:items-center
                    sm:justify-between
                    gap-5">

            <p class="text-xs
                      uppercase
                      tracking-[0.2em]
                      text-[#8A9088]">
                Ketersediaan petak
            </p>


            <div class="flex flex-wrap gap-6">

                <div class="flex items-center gap-2">

                    <span class="w-3 h-3
                                 rounded-full
                                 bg-[#7D9678]">
                    </span>

                    <span class="text-xs text-[#687067]">
                        Tersedia
                    </span>

                </div>


                <div class="flex items-center gap-2">

                    <span class="w-3 h-3
                                 rounded-full
                                 bg-[#D1AE58]">
                    </span>

                    <span class="text-xs text-[#687067]">
                        Sedang dibooking
                    </span>

                </div>


                <div class="flex items-center gap-2">

                    <span class="w-3 h-3
                                 rounded-full
                                 bg-[#B98282]">
                    </span>

                    <span class="text-xs text-[#687067]">
                        Terisi
                    </span>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
    CATEGORY / PLOT
========================================================= --}}
<section class="bg-[#F8F7F3] py-24">

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        @forelse($categories as $category)

            @php

                $available = $category->plots
                    ->where('status', 'AVAILABLE')
                    ->count();

                $booked = $category->plots
                    ->where('status', 'BOOKED')
                    ->count();

                $occupied = $category->plots
                    ->where('status', 'OCCUPIED')
                    ->count();

                $total = $category->plots->count();

            @endphp


            {{-- CATEGORY HEADER --}}
            <div class="mb-10
                        flex flex-col
                        lg:flex-row
                        lg:items-end
                        lg:justify-between
                        gap-7">

                <div>

                    <div class="flex items-center gap-4 mb-4">

                        <span class="text-[#87907F]
                                     text-xs
                                     font-medium
                                     tracking-[0.2em]">
                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        <span class="h-px w-12 bg-[#C8CBC3]"></span>

                        <span class="text-[#87907F]
                                     text-[10px]
                                     uppercase
                                     tracking-[0.25em]">
                            Kategori Petak
                        </span>

                    </div>


                    <h2 class="text-[#29352C]
                               text-4xl
                               sm:text-5xl
                               font-medium
                               capitalize
                               tracking-[-0.035em]">

                        {{ $category->nama_kategori }}

                    </h2>


                    <p class="mt-4
                              max-w-xl
                              text-sm
                              leading-7
                              text-[#777E76]">

                        {{ $category->deskripsi ?: 'Pilihan petak makam yang dirancang untuk kebutuhan keluarga dengan lingkungan yang tertata.' }}

                    </p>

                </div>


                {{-- CATEGORY STATS --}}
                <div class="flex
                            items-center
                            gap-8
                            lg:pb-1">

                    <div>

                        <p class="text-2xl
                                  font-medium
                                  text-[#354335]">
                            {{ $available }}
                        </p>

                        <p class="mt-1
                                  text-[9px]
                                  uppercase
                                  tracking-[0.18em]
                                  text-[#929890]">
                            Tersedia
                        </p>

                    </div>


                    <div class="w-px h-10 bg-[#D8D8D0]"></div>


                    <div>

                        <p class="text-2xl
                                  font-medium
                                  text-[#354335]">
                            {{ $total }}
                        </p>

                        <p class="mt-1
                                  text-[9px]
                                  uppercase
                                  tracking-[0.18em]
                                  text-[#929890]">
                            Total Petak
                        </p>

                    </div>

                </div>

            </div>



            {{-- PLOT AREA --}}
            <div class="bg-white
                        border
                        border-[#E3E3DB]
                        rounded-[2rem]
                        p-5
                        sm:p-7
                        lg:p-9
                        mb-24">


                {{-- TOP BAR --}}
                <div class="flex
                            flex-col
                            sm:flex-row
                            sm:items-center
                            sm:justify-between
                            gap-5
                            pb-6
                            border-b
                            border-[#ECECE6]">

                    <div>

                        <p class="text-sm
                                  font-medium
                                  text-[#3B483C]">
                            Pilih petak
                        </p>

                        <p class="mt-1
                                  text-xs
                                  text-[#929890]">
                            Klik petak yang tersedia untuk melihat detail.
                        </p>

                    </div>


                    <div class="text-right">

                        <p class="text-[9px]
                                  uppercase
                                  tracking-[0.18em]
                                  text-[#9A9F98]">
                            Mulai dari
                        </p>

                        <p class="mt-1
                                  text-lg
                                  font-medium
                                  text-[#354335]">

                            Rp {{ number_format($category->harga, 0, ',', '.') }}

                        </p>

                    </div>

                </div>



                {{-- PLOT GRID --}}
                <div class="mt-8">

                    @if($category->plots->count())

                        <div class="grid
                                    grid-cols-4
                                    sm:grid-cols-6
                                    md:grid-cols-8
                                    lg:grid-cols-10
                                    xl:grid-cols-12
                                    gap-3">

                            @foreach($category->plots as $plot)

                                @if($plot->status === 'AVAILABLE')

                                    

                                @elseif($plot->status === 'BOOKED')

                                    <div class="aspect-square
                                                rounded-xl
                                                border
                                                border-[#E1D09D]
                                                bg-[#F4EACB]
                                                flex
                                                flex-col
                                                items-center
                                                justify-center">

                                        <span class="text-[10px]
                                                     font-semibold
                                                     text-[#967D39]">

                                            {{ $plot->kode_plot }}

                                        </span>

                                        <span class="mt-1
                                                     text-[7px]
                                                     uppercase
                                                     tracking-wider
                                                     text-[#B19A5D]">

                                            Booking

                                        </span>

                                    </div>

                                @else

                                    <div class="aspect-square
                                                rounded-xl
                                                border
                                                border-[#DFC4C4]
                                                bg-[#F0DDDD]
                                                flex
                                                flex-col
                                                items-center
                                                justify-center">

                                        <span class="text-[10px]
                                                     font-semibold
                                                     text-[#9D6E6E]">

                                            {{ $plot->kode_plot }}

                                        </span>

                                        <span class="mt-1
                                                     text-[7px]
                                                     uppercase
                                                     tracking-wider
                                                     text-[#B48B8B]">

                                            Terisi

                                        </span>

                                    </div>

                                @endif

                            @endforeach

                        </div>

                    @else

                        <div class="py-20 text-center">

                            <div class="mx-auto
                                        w-12 h-12
                                        rounded-full
                                        bg-[#EEF1EB]
                                        flex
                                        items-center
                                        justify-center">

                                <span class="text-[#70816B]">
                                    —
                                </span>

                            </div>

                            <p class="mt-5
                                      text-[#455144]
                                      font-medium">
                                Belum ada petak
                            </p>

                            <p class="mt-2
                                      text-sm
                                      text-[#969C95]">
                                Data petak untuk kategori ini belum tersedia.
                            </p>

                        </div>

                    @endif

                </div>



                {{-- BOTTOM INFO --}}
                <div class="mt-8
                            pt-6
                            border-t
                            border-[#ECECE6]
                            flex
                            flex-col
                            sm:flex-row
                            sm:items-center
                            sm:justify-between
                            gap-4">

                    <div class="flex flex-wrap gap-5 text-[10px]">

                        <div class="flex items-center gap-2">

                            <span class="w-2.5 h-2.5
                                         rounded-full
                                         bg-[#7D9678]">
                            </span>

                            <span class="text-[#81877F]">
                                {{ $available }} tersedia
                            </span>

                        </div>


                        <div class="flex items-center gap-2">

                            <span class="w-2.5 h-2.5
                                         rounded-full
                                         bg-[#D1AE58]">
                            </span>

                            <span class="text-[#81877F]">
                                {{ $booked }} booking
                            </span>

                        </div>


                        <div class="flex items-center gap-2">

                            <span class="w-2.5 h-2.5
                                         rounded-full
                                         bg-[#B98282]">
                            </span>

                            <span class="text-[#81877F]">
                                {{ $occupied }} terisi
                            </span>

                        </div>

                    </div>


                    <p class="text-[10px]
                              text-[#A0A49D]">

                        {{ $total }} petak dalam kategori

                    </p>

                </div>

            </div>

        @empty

            <div class="py-28
                        text-center">

                <div class="mx-auto
                            w-16 h-16
                            rounded-full
                            bg-[#E9EDE5]
                            flex
                            items-center
                            justify-center">

                    <span class="text-xl text-[#71816B]">
                        —
                    </span>

                </div>


                <h2 class="mt-6
                           text-2xl
                           font-medium
                           text-[#354335]">
                    Belum ada area tersedia
                </h2>


                <p class="mt-3
                          text-sm
                          text-[#8A9188]">
                    Informasi area makam sedang dipersiapkan.
                </p>

            </div>

        @endforelse

    </div>

</section>



{{-- =========================================================
    HOW TO SELECT
========================================================= --}}
<section class="bg-[#EDE9DE] py-24">

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="grid lg:grid-cols-12 gap-12">

            <div class="lg:col-span-4">

                <p class="text-[#71816B]
                          text-xs
                          uppercase
                          tracking-[0.25em]">
                    Panduan
                </p>

                <h2 class="mt-5
                           text-[#354335]
                           text-4xl
                           font-medium
                           tracking-[-0.03em]">

                    Memilih petak
                    menjadi lebih mudah.

                </h2>

            </div>


            <div class="lg:col-span-8">

                <div class="grid sm:grid-cols-3 gap-8">

                    <div>

                        <span class="text-[#7C8C76]
                                     text-sm
                                     font-medium">
                            01
                        </span>

                        <h3 class="mt-5
                                   text-[#354335]
                                   font-medium">
                            Pilih kategori
                        </h3>

                        <p class="mt-3
                                  text-sm
                                  text-[#7C817A]
                                  leading-7">
                            Tentukan kategori petak
                            sesuai kebutuhan.
                        </p>

                    </div>


                    <div>

                        <span class="text-[#7C8C76]
                                     text-sm
                                     font-medium">
                            02
                        </span>

                        <h3 class="mt-5
                                   text-[#354335]
                                   font-medium">
                            Pilih petak
                        </h3>

                        <p class="mt-3
                                  text-sm
                                  text-[#7C817A]
                                  leading-7">
                            Petak hijau dapat dipilih
                            dan dibooking.
                        </p>

                    </div>


                    <div>

                        <span class="text-[#7C8C76]
                                     text-sm
                                     font-medium">
                            03
                        </span>

                        <h3 class="mt-5
                                   text-[#354335]
                                   font-medium">
                            Lihat detail
                        </h3>

                        <p class="mt-3
                                  text-sm
                                  text-[#7C817A]
                                  leading-7">
                            Periksa informasi petak
                            sebelum melakukan booking.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
    CTA
========================================================= --}}
<section class="bg-[#F8F7F3] py-24">

    <div class="max-w-4xl
                mx-auto
                px-6
                text-center">

        <p class="text-[#71816B]
                  text-xs
                  uppercase
                  tracking-[0.25em]">
            Tanah Salama
        </p>


        <h2 class="mt-5
                   text-[#354335]
                   text-4xl
                   sm:text-5xl
                   font-medium
                   tracking-[-0.035em]">

            Sudah menemukan
            <span class="text-[#71816B]">
                petak yang sesuai?
            </span>

        </h2>


        <p class="mt-5
                  text-[#7A8179]
                  leading-7">

            Pilih petak yang tersedia untuk melihat
            detail dan melanjutkan proses booking.

        </p>


        <a href="{{ route('booking.check') }}"
           class="inline-flex
                  items-center
                  gap-3
                  mt-9
                  rounded-full
                  bg-[#334336]
                  text-white
                  px-8 py-4
                  text-sm
                  font-medium
                  hover:bg-[#26352A]
                  transition">

            Cek Booking

            <span>→</span>

        </a>

    </div>

</section>

@endsection