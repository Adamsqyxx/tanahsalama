@extends('layouts.app')

@section('title', 'Detail Petak ' . $plot->kode_plot)

@section('content')

{{-- =========================================================
    HEADER / BREADCRUMB
========================================================= --}}
<section class="bg-[#F4F1E9] pt-32 pb-8">

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="flex flex-wrap items-center gap-2 text-xs text-[#8A9088]">

            <a href="{{ route('area.makam') }}"
               class="hover:text-[#52634F] transition">
                Area Makam
            </a>

            <span>/</span>

            <span class="text-[#52634F]">
                {{ $plot->kode_plot }}
            </span>

        </div>

    </div>

</section>


{{-- =========================================================
    MAIN DETAIL
========================================================= --}}
<section class="bg-[#F4F1E9] pb-24">

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="grid lg:grid-cols-12 gap-12 lg:gap-16">

            {{-- =================================================
                LEFT VISUAL
            ================================================= --}}
            <div class="lg:col-span-7">

                <div class="relative
                            min-h-[520px]
                            lg:min-h-[620px]
                            overflow-hidden
                            bg-[#D8DFD2]">

                    {{-- Organic landscape --}}
                    <div class="absolute
                                right-[-15%]
                                top-[-8%]
                                w-[80%]
                                h-[65%]
                                rounded-[50%]
                                bg-[#E7E0D2]
                                rotate-[-10deg]">
                    </div>

                    <div class="absolute
                                left-[-15%]
                                bottom-[-20%]
                                w-[120%]
                                h-[65%]
                                rounded-[50%]
                                bg-[#AEBBA7]
                                rotate-[4deg]">
                    </div>

                    <div class="absolute
                                left-[15%]
                                bottom-[-22%]
                                w-[100%]
                                h-[55%]
                                rounded-[50%]
                                bg-[#71816B]
                                rotate-[-5deg]">
                    </div>


                    {{-- Sun --}}
                    <div class="absolute
                                top-[12%]
                                right-[15%]
                                w-24
                                h-24
                                rounded-full
                                bg-[#F4F1E9]/70">
                    </div>


                    {{-- Trees --}}
                    <div class="absolute bottom-[28%] left-[20%]">

                        <div class="w-1 h-28 bg-[#52634F] mx-auto"></div>

                        <div class="w-24 h-24
                                    rounded-full
                                    bg-[#52634F]
                                    -mt-20
                                    -ml-11">
                        </div>

                    </div>


                    <div class="absolute bottom-[30%] left-[43%]">

                        <div class="w-1 h-20 bg-[#5E7057] mx-auto"></div>

                        <div class="w-20 h-20
                                    rounded-full
                                    bg-[#5E7057]
                                    -mt-16
                                    -ml-9">
                        </div>

                    </div>


                    <div class="absolute bottom-[27%] right-[18%]">

                        <div class="w-1 h-32 bg-[#52634F] mx-auto"></div>

                        <div class="w-28 h-28
                                    rounded-full
                                    bg-[#60725C]
                                    -mt-24
                                    -ml-13">
                        </div>

                    </div>


                    {{-- Plot marker --}}
                    <div class="absolute
                                left-1/2
                                bottom-[20%]
                                -translate-x-1/2">

                        <div class="relative">

                            <div class="absolute
                                        -inset-5
                                        rounded-full
                                        bg-white/30
                                        blur-md">
                            </div>

                            <div class="relative
                                        w-24
                                        h-32
                                        bg-[#F8F7F3]/90
                                        border
                                        border-white
                                        shadow-xl
                                        flex
                                        flex-col
                                        items-center
                                        justify-center">

                                <span class="text-[9px]
                                             uppercase
                                             tracking-[0.2em]
                                             text-[#8A9088]">
                                    Petak
                                </span>

                                <span class="mt-2
                                             text-lg
                                             font-semibold
                                             text-[#354335]">
                                    {{ $plot->kode_plot }}
                                </span>

                                <span class="mt-1
                                             w-5
                                             h-px
                                             bg-[#AEBBA7]">
                                </span>

                            </div>

                        </div>

                    </div>


                    {{-- Available label --}}
                    <div class="absolute top-6 left-6">

                        <div class="inline-flex
                                    items-center
                                    gap-2
                                    rounded-full
                                    bg-white/85
                                    backdrop-blur
                                    px-4
                                    py-2">

                            <span class="w-2
                                         h-2
                                         rounded-full
                                         bg-[#718D69]">
                            </span>

                            <span class="text-[10px]
                                         uppercase
                                         tracking-[0.2em]
                                         font-medium
                                         text-[#52634F]">
                                {{ $plot->status }}
                            </span>

                        </div>

                    </div>


                    {{-- Category --}}
                    <div class="absolute bottom-6 left-6">

                        <p class="text-[10px]
                                  uppercase
                                  tracking-[0.25em]
                                  text-white/60">
                            Kategori
                        </p>

                        <p class="mt-2
                                  text-2xl
                                  font-medium
                                  text-white">
                            {{ $plot->category->nama_kategori }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- =================================================
                RIGHT INFORMATION
            ================================================= --}}
            <div class="lg:col-span-5 flex flex-col justify-center">

                <p class="text-[10px]
                          uppercase
                          tracking-[0.3em]
                          text-[#71816B]">
                    Detail Petak
                </p>


                <h1 class="mt-5
                           text-4xl
                           sm:text-5xl
                           lg:text-6xl
                           font-medium
                           leading-[0.98]
                           tracking-[-0.05em]
                           text-[#29352C]">

                    {{ $plot->kode_plot }}

                </h1>


                <p class="mt-5
                          text-base
                          leading-7
                          text-[#737B72]">

                    Petak makam dari kategori
                    <span class="font-medium text-[#52634F]">
                        {{ $plot->category->nama_kategori }}
                    </span>
                    yang tersedia di kawasan Tanah Salama.

                </p>


                {{-- PRICE --}}
                <div class="mt-10
                            py-7
                            border-y
                            border-[#D9D8D0]">

                    <p class="text-[10px]
                              uppercase
                              tracking-[0.25em]
                              text-[#8A9088]">
                        Harga Petak
                    </p>

                    <div class="mt-3 flex items-end gap-2">

                        <span class="text-3xl
                                     sm:text-4xl
                                     font-medium
                                     tracking-[-0.03em]
                                     text-[#334336]">

                            Rp {{ number_format($plot->harga, 0, ',', '.') }}

                        </span>

                    </div>

                </div>


                {{-- INFO GRID --}}
                <div class="grid grid-cols-2 gap-x-8">

                    <div class="py-6 border-b border-[#D9D8D0]">

                        <p class="text-[10px]
                                  uppercase
                                  tracking-[0.2em]
                                  text-[#8A9088]">
                            Jenis Lahan
                        </p>

                        <p class="mt-2
                                  text-sm
                                  font-medium
                                  text-[#4D594D]">
                            {{ $plot->jenis_lahan }}
                        </p>

                    </div>


                    <div class="py-6 border-b border-[#D9D8D0]">

                        <p class="text-[10px]
                                  uppercase
                                  tracking-[0.2em]
                                  text-[#8A9088]">
                            Kategori
                        </p>

                        <p class="mt-2
                                  text-sm
                                  font-medium
                                  text-[#4D594D]">
                            {{ $plot->category->nama_kategori }}
                        </p>

                    </div>

                </div>


                {{-- DESCRIPTION --}}
                @if($plot->deskripsi)

                    <div class="mt-7">

                        <p class="text-[10px]
                                  uppercase
                                  tracking-[0.2em]
                                  text-[#8A9088]">
                            Tentang Petak
                        </p>

                        <p class="mt-3
                                  text-sm
                                  leading-7
                                  text-[#737B72]">

                            {{ $plot->deskripsi }}

                        </p>

                    </div>

                @endif


                {{-- ACTION --}}
                <div class="mt-9">

                    @if($plot->status === 'AVAILABLE')

                        <a href="{{ route('booking.create', $plot) }}"
                           class="w-full
                                  inline-flex
                                  items-center
                                  justify-between
                                  rounded-full
                                  bg-[#334336]
                                  px-6
                                  py-4
                                  text-sm
                                  font-medium
                                  text-white
                                  hover:bg-[#26352A]
                                  transition">

                            <span>
                                Booking Petak Ini
                            </span>

                            <span class="text-white/60">
                                →
                            </span>

                        </a>

                        <p class="mt-4
                                  text-center
                                  text-[10px]
                                  leading-5
                                  text-[#969B94]">

                            Booking akan menahan petak selama
                            1 × 24 jam.

                        </p>

                    @elseif($plot->status === 'BOOKED')

                        <div class="rounded-2xl
                                    border
                                    border-[#E2D7B9]
                                    bg-[#F5F0E2]
                                    px-5
                                    py-4">

                            <div class="flex items-start gap-3">

                                <span class="mt-1
                                             w-2
                                             h-2
                                             rounded-full
                                             bg-[#C5A85C]">
                                </span>

                                <div>

                                    <p class="text-sm
                                              font-medium
                                              text-[#75643A]">
                                        Petak sedang dalam proses booking.
                                    </p>

                                    <p class="mt-1
                                              text-xs
                                              leading-5
                                              text-[#998B68]">
                                        Petak ini untuk sementara
                                        tidak dapat dipilih.
                                    </p>

                                </div>

                            </div>

                        </div>

                    @elseif($plot->status === 'OCCUPIED')

                        <div class="rounded-2xl
                                    border
                                    border-[#D9D6D0]
                                    bg-[#EAE8E2]
                                    px-5
                                    py-4">

                            <div class="flex items-start gap-3">

                                <span class="mt-1
                                             w-2
                                             h-2
                                             rounded-full
                                             bg-[#8C8C84]">
                                </span>

                                <div>

                                    <p class="text-sm
                                              font-medium
                                              text-[#62655F]">
                                        Petak sudah terisi.
                                    </p>

                                    <p class="mt-1
                                              text-xs
                                              leading-5
                                              text-[#8A8C86]">
                                        Petak ini tidak tersedia
                                        untuk booking baru.
                                    </p>

                                </div>

                            </div>

                        </div>

                    @endif

                </div>


                {{-- BACK --}}
                <div class="mt-6">

                    <a href="{{ route('area.makam') }}"
                       class="inline-flex
                              items-center
                              gap-2
                              text-xs
                              text-[#858B84]
                              hover:text-[#52634F]
                              transition">

                        <span>←</span>

                        Kembali ke Area Makam

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    INFORMATION SECTION
========================================================= --}}
<section class="bg-[#EDE9DE]">

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="py-20 lg:py-24">

            <div class="grid lg:grid-cols-12 gap-12 lg:gap-20">

                <div class="lg:col-span-4">

                    <p class="text-[10px]
                              uppercase
                              tracking-[0.3em]
                              text-[#71816B]">
                        Sebelum Booking
                    </p>

                    <h2 class="mt-5
                               text-3xl
                               lg:text-4xl
                               font-medium
                               leading-tight
                               tracking-[-0.035em]
                               text-[#29352C]">

                        Pastikan pilihan
                        Anda sudah sesuai.

                    </h2>

                </div>


                <div class="lg:col-span-7 lg:col-start-6">

                    <div class="grid sm:grid-cols-2 gap-x-10">

                        <div class="py-6 border-t border-[#D2D1C8]">

                            <span class="text-xs text-[#9AA194]">
                                01
                            </span>

                            <h3 class="mt-4
                                       text-sm
                                       font-medium
                                       text-[#4D594D]">
                                Periksa status petak
                            </h3>

                            <p class="mt-2
                                      text-xs
                                      leading-6
                                      text-[#858B84]">
                                Pastikan status petak masih
                                tersedia sebelum melakukan booking.
                            </p>

                        </div>


                        <div class="py-6 border-t border-[#D2D1C8]">

                            <span class="text-xs text-[#9AA194]">
                                02
                            </span>

                            <h3 class="mt-4
                                       text-sm
                                       font-medium
                                       text-[#4D594D]">
                                Periksa harga
                            </h3>

                            <p class="mt-2
                                      text-xs
                                      leading-6
                                      text-[#858B84]">
                                Harga yang tercantum merupakan
                                harga petak yang dipilih.
                            </p>

                        </div>


                        <div class="py-6 border-t border-[#D2D1C8]">

                            <span class="text-xs text-[#9AA194]">
                                03
                            </span>

                            <h3 class="mt-4
                                       text-sm
                                       font-medium
                                       text-[#4D594D]">
                                Siapkan data pemesan
                            </h3>

                            <p class="mt-2
                                      text-xs
                                      leading-6
                                      text-[#858B84]">
                                Anda akan diminta mengisi data
                                pemesan pada proses booking.
                            </p>

                        </div>


                        <div class="py-6 border-t border-[#D2D1C8]">

                            <span class="text-xs text-[#9AA194]">
                                04
                            </span>

                            <h3 class="mt-4
                                       text-sm
                                       font-medium
                                       text-[#4D594D]">
                                Simpan kode booking
                            </h3>

                            <p class="mt-2
                                      text-xs
                                      leading-6
                                      text-[#858B84]">
                                Setelah booking berhasil,
                                simpan kode untuk mengecek status.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    FINAL CTA
========================================================= --}}
<section class="bg-[#F8F7F3]">

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="py-20
                    flex
                    flex-col
                    md:flex-row
                    md:items-center
                    md:justify-between
                    gap-8">

            <div>

                <p class="text-[10px]
                          uppercase
                          tracking-[0.3em]
                          text-[#87907F]">
                    Butuh bantuan?
                </p>

                <h2 class="mt-4
                           text-2xl
                           sm:text-3xl
                           font-medium
                           tracking-[-0.035em]
                           text-[#29352C]">

                    Kami siap membantu Anda.

                </h2>

            </div>


            <a href="{{ route('chat.index') }}"
               class="inline-flex
                      items-center
                      justify-center
                      gap-3
                      rounded-full
                      border
                      border-[#C9CBC3]
                      px-6
                      py-3.5
                      text-sm
                      font-medium
                      text-[#52634F]
                      hover:bg-[#334336]
                      hover:text-white
                      hover:border-[#334336]
                      transition">

                Chat Admin

                <span>→</span>

            </a>

        </div>

    </div>

</section>

@endsection