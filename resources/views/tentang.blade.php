@extends('layouts.app')

@section('title', 'Tentang Tanah Salama')

@section('content')

{{-- =========================================================
     PREMIUM ABOUT PAGE
     - Tailwind CSS
     - Responsive
     - No external images required
     - Existing content preserved
========================================================= --}}

<div class="relative overflow-hidden bg-[#f5f3ed] text-[#1f2a24]">

    {{-- Ambient background --}}
    <div class="pointer-events-none absolute inset-0 overflow-hidden">
        <div class="absolute -left-40 top-[-12rem] h-[32rem] w-[32rem] rounded-full bg-[#dce5d7]/70 blur-3xl"></div>
        <div class="absolute -right-40 top-[28rem] h-[30rem] w-[30rem] rounded-full bg-[#e9dfcf]/80 blur-3xl"></div>
        <div class="absolute left-[42%] top-[62rem] h-[20rem] w-[20rem] rounded-full bg-[#dbe2d8]/50 blur-3xl"></div>
    </div>

    {{-- =====================================================
         HERO
    ====================================================== --}}
    <section class="relative min-h-[760px] overflow-hidden border-b border-black/[0.06]">

        <div class="mx-auto grid min-h-[760px] max-w-[1440px] items-center gap-14 px-6 pb-20 pt-32 sm:px-10 lg:grid-cols-12 lg:px-14 lg:pb-24 lg:pt-36">

            {{-- Hero copy --}}
            <div class="relative z-10 lg:col-span-6 xl:col-span-5">

                <div class="mb-8 flex items-center gap-4">
                    <span class="h-px w-12 bg-[#6c7c68]"></span>
                    <p class="text-[10px] font-semibold uppercase tracking-[0.34em] text-[#687767]">
                        Tentang Tanah Salama
                    </p>
                </div>

                <h1 class="max-w-3xl text-[clamp(3.5rem,7vw,6.9rem)] font-medium leading-[0.9] tracking-[-0.065em] text-[#1f2a24]">
                    Tempat untuk
                    <span class="block text-[#71816b]">mengenang.</span>
                </h1>

                <p class="mt-9 max-w-xl text-[15px] leading-8 text-[#697269] sm:text-base">
                    Tanah Salama hadir sebagai ruang pemakaman yang dirancang dengan pendekatan yang lebih tertata,
                    tenang, dan mudah diakses melalui teknologi digital.
                </p>

                <div class="mt-11 flex flex-wrap items-center gap-3">
                    <a href="#tentang"
                       class="group inline-flex items-center gap-4 rounded-full bg-[#26332b] px-6 py-3.5 text-xs font-semibold text-white shadow-[0_12px_30px_rgba(38,51,43,.14)] transition duration-300 hover:-translate-y-0.5 hover:bg-[#34443a]">
                        Kenali Tanah Salama
                        <span class="flex h-7 w-7 items-center justify-center rounded-full bg-white/10 transition group-hover:translate-y-0.5">
                            ↓
                        </span>
                    </a>

                    <a href="#cara-kerja"
                       class="inline-flex items-center rounded-full border border-[#bfc6bd] bg-white/50 px-6 py-3.5 text-xs font-semibold text-[#526052] backdrop-blur transition hover:border-[#879582] hover:bg-white">
                        Cara kerja
                    </a>
                </div>

                {{-- Small metadata --}}
                <div class="mt-14 grid max-w-md grid-cols-2 gap-6 border-t border-[#d8dbd5] pt-6">
                    <div>
                        <p class="text-[9px] font-semibold uppercase tracking-[0.25em] text-[#929990]">Pendekatan</p>
                        <p class="mt-2 text-sm font-medium text-[#3f4c43]">Tenang & tertata</p>
                    </div>
                    <div>
                        <p class="text-[9px] font-semibold uppercase tracking-[0.25em] text-[#929990]">Layanan</p>
                        <p class="mt-2 text-sm font-medium text-[#3f4c43]">Digital & transparan</p>
                    </div>
                </div>

            </div>

            {{-- Hero visual --}}
            <div class="relative z-10 lg:col-span-6 lg:col-start-7">

                <div class="relative mx-auto aspect-[0.9] max-w-[620px] overflow-hidden rounded-[2rem] border border-white/70 bg-[#34443a] shadow-[0_30px_90px_rgba(42,54,45,.18)] sm:rounded-[2.5rem]">

                    {{-- Decorative rings --}}
                    <div class="absolute -right-24 -top-24 h-80 w-80 rounded-full border border-white/10"></div>
                    <div class="absolute -right-10 -top-10 h-52 w-52 rounded-full border border-white/10"></div>
                    <div class="absolute -bottom-40 -left-24 h-[32rem] w-[32rem] rounded-full border border-white/10"></div>

                    {{-- Abstract landscape --}}
                    <div class="absolute inset-x-[-15%] bottom-[-12%] h-[55%] rotate-[-4deg] rounded-[50%_50%_0_0] bg-[#71816b]"></div>
                    <div class="absolute inset-x-[-12%] bottom-[-7%] h-[35%] rotate-[3deg] rounded-[50%_50%_0_0] bg-[#8e9d88]/60"></div>
                    <div class="absolute right-[-10%] top-[8%] h-28 w-28 rounded-full bg-[#e9e1d1] shadow-[0_0_70px_rgba(233,225,209,.15)]"></div>

                    {{-- Trees --}}
                    <div class="absolute bottom-[30%] left-[17%]">
                        <div class="mx-auto h-24 w-1 bg-[#52634f]"></div>
                        <div class="-ml-9 -mt-16 h-20 w-20 rounded-full bg-[#52634f]/80"></div>
                    </div>

                    <div class="absolute bottom-[28%] left-[38%]">
                        <div class="mx-auto h-20 w-1 bg-[#52634f]"></div>
                        <div class="-ml-7 -mt-14 h-16 w-16 rounded-full bg-[#60725c]"></div>
                    </div>

                    <div class="absolute bottom-[31%] right-[19%]">
                        <div class="mx-auto h-28 w-1 bg-[#52634f]"></div>
                        <div class="-ml-11 -mt-20 h-24 w-24 rounded-full bg-[#5e7057]/80"></div>
                    </div>

                    {{-- Glass card --}}
                    <div class="absolute bottom-7 left-7 right-7 rounded-2xl border border-white/15 bg-white/[0.09] p-5 backdrop-blur-xl sm:bottom-9 sm:left-9 sm:right-9 sm:p-6">
                        <div class="flex items-start justify-between gap-5">
                            <div>
                                <p class="text-[9px] font-semibold uppercase tracking-[0.3em] text-white/50">
                                    Tanah Salama
                                </p>
                                <p class="mt-2 text-lg font-medium tracking-tight text-white">
                                    Ruang yang tenang.
                                </p>
                            </div>
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-white/15 text-white/80">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M12 21s7-5.2 7-11a7 7 0 1 0-14 0c0 5.8 7 11 7 11Z"/>
                                    <circle cx="12" cy="10" r="2.2"/>
                                </svg>
                            </span>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        {{-- Vertical side label --}}
        <div class="absolute bottom-10 right-5 hidden items-center gap-3 [writing-mode:vertical-rl] lg:flex">
            <span class="text-[9px] font-semibold uppercase tracking-[0.35em] text-[#929990]">A place to remember</span>
            <span class="h-12 w-px bg-[#c8cec6]"></span>
        </div>

    </section>


    {{-- =====================================================
         INTRO
    ====================================================== --}}
    <section id="tentang" class="relative bg-[#faf9f5]">

        <div class="mx-auto max-w-[1440px] px-6 py-24 sm:px-10 lg:px-14 lg:py-32">

            <div class="grid gap-14 lg:grid-cols-12 lg:gap-20">

                <div class="lg:col-span-4">
                    <div class="sticky top-28">
                        <div class="flex items-center gap-3">
                            <span class="h-1.5 w-1.5 rounded-full bg-[#71816b]"></span>
                            <p class="text-[10px] font-semibold uppercase tracking-[0.32em] text-[#87907f]">
                                Tentang Kami
                            </p>
                        </div>

                        <h2 class="mt-6 max-w-sm text-4xl font-medium leading-[1.05] tracking-[-0.045em] text-[#263129] sm:text-5xl">
                            Sebuah ruang yang dibuat dengan kepedulian.
                        </h2>
                    </div>
                </div>

                <div class="lg:col-span-7 lg:col-start-6">
                    <p class="max-w-3xl text-xl leading-[1.75] tracking-[-0.015em] text-[#505b53] sm:text-2xl">
                        Tanah Salama merupakan sistem informasi dan pemesanan petak makam yang membantu keluarga
                        memperoleh informasi secara lebih mudah dan terstruktur.
                    </p>

                    <p class="mt-8 max-w-2xl text-sm leading-8 text-[#7d857d] sm:text-base">
                        Melalui platform digital ini, calon pengguna dapat melihat area makam, mengetahui kategori
                        dan harga petak, memilih lokasi yang tersedia, melakukan booking, serta memantau status
                        pemesanan tanpa harus melalui proses yang berbelit-belit.
                    </p>

                    <div class="mt-14 grid gap-4 sm:grid-cols-2">
                        <div class="rounded-2xl border border-[#dde1da] bg-white/70 p-6 transition duration-300 hover:-translate-y-1 hover:bg-white">
                            <span class="flex h-10 w-10 items-center justify-center rounded-full bg-[#e8eee5] text-[#536450]">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M12 3 4.5 6.5v5.7c0 4.5 3.2 7.6 7.5 8.8 4.3-1.2 7.5-4.3 7.5-8.8V6.5L12 3Z"/>
                                    <path d="m9 12 2 2 4-4"/>
                                </svg>
                            </span>
                            <h3 class="mt-5 text-base font-semibold text-[#354238]">Informasi lebih jelas</h3>
                            <p class="mt-2 text-sm leading-7 text-[#858d85]">Data petak, kategori, harga, dan status disajikan secara terstruktur.</p>
                        </div>

                        <div class="rounded-2xl border border-[#dde1da] bg-white/70 p-6 transition duration-300 hover:-translate-y-1 hover:bg-white">
                            <span class="flex h-10 w-10 items-center justify-center rounded-full bg-[#eee9de] text-[#716955]">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M12 8v5l3 2"/>
                                    <circle cx="12" cy="12" r="8.5"/>
                                </svg>
                            </span>
                            <h3 class="mt-5 text-base font-semibold text-[#354238]">Proses lebih sederhana</h3>
                            <p class="mt-2 text-sm leading-7 text-[#858d85]">Booking dan pemantauan dilakukan melalui satu pengalaman digital.</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>


    {{-- =====================================================
         PHILOSOPHY
    ====================================================== --}}
    <section class="relative overflow-hidden bg-[#e8e4d8]">

        <div class="absolute right-[-8rem] top-[-8rem] h-[26rem] w-[26rem] rounded-full border border-[#c6c6ba]"></div>
        <div class="absolute right-[-3rem] top-[-3rem] h-[16rem] w-[16rem] rounded-full border border-[#c6c6ba]"></div>

        <div class="relative mx-auto max-w-[1440px] px-6 py-24 sm:px-10 lg:px-14 lg:py-32">

            <div class="max-w-3xl">
                <div class="flex items-center gap-3">
                    <span class="h-1.5 w-1.5 rounded-full bg-[#71816b]"></span>
                    <p class="text-[10px] font-semibold uppercase tracking-[0.32em] text-[#71816b]">
                        Filosofi
                    </p>
                </div>

                <h2 class="mt-7 text-5xl font-medium leading-[0.98] tracking-[-0.055em] text-[#273229] sm:text-6xl lg:text-7xl">
                    Bukan sekadar
                    <span class="block text-[#657460]">tempat pemakaman.</span>
                </h2>

                <p class="mt-8 max-w-2xl text-sm leading-8 text-[#70776f] sm:text-base">
                    Kami melihat area pemakaman sebagai ruang yang memiliki nilai emosional bagi keluarga.
                    Karena itu, informasi, keteraturan, kenyamanan, dan kemudahan akses menjadi bagian penting
                    dalam pengalaman Tanah Salama.
                </p>
            </div>

            {{-- Values --}}
            <div class="mt-20 grid border-t border-[#cfd0c6] sm:grid-cols-2 lg:grid-cols-4">

                <div class="border-b border-[#cfd0c6] py-8 pr-8 lg:border-r">
                    <span class="text-[10px] font-semibold tracking-[0.25em] text-[#969b91]">01</span>
                    <h3 class="mt-7 text-xl font-medium text-[#3d493f]">Tenang</h3>
                    <p class="mt-3 text-sm leading-7 text-[#7b827a]">
                        Mengutamakan suasana yang nyaman dan penuh ketenangan.
                    </p>
                </div>

                <div class="border-b border-[#cfd0c6] py-8 sm:pl-8 lg:border-r lg:px-8">
                    <span class="text-[10px] font-semibold tracking-[0.25em] text-[#969b91]">02</span>
                    <h3 class="mt-7 text-xl font-medium text-[#3d493f]">Tertata</h3>
                    <p class="mt-3 text-sm leading-7 text-[#7b827a]">
                        Informasi area dan petak disusun agar mudah dipahami.
                    </p>
                </div>

                <div class="border-b border-[#cfd0c6] py-8 pr-8 sm:pl-8 lg:border-r lg:px-8">
                    <span class="text-[10px] font-semibold tracking-[0.25em] text-[#969b91]">03</span>
                    <h3 class="mt-7 text-xl font-medium text-[#3d493f]">Transparan</h3>
                    <p class="mt-3 text-sm leading-7 text-[#7b827a]">
                        Informasi harga, status, dan booking ditampilkan secara jelas.
                    </p>
                </div>

                <div class="border-b border-[#cfd0c6] py-8 sm:pl-8 lg:pl-8">
                    <span class="text-[10px] font-semibold tracking-[0.25em] text-[#969b91]">04</span>
                    <h3 class="mt-7 text-xl font-medium text-[#3d493f]">Digital</h3>
                    <p class="mt-3 text-sm leading-7 text-[#7b827a]">
                        Teknologi digunakan untuk membuat proses lebih sederhana.
                    </p>
                </div>

            </div>

        </div>

    </section>


    {{-- =====================================================
         DIGITAL EXPERIENCE / HOW IT WORKS
    ====================================================== --}}
    <section id="cara-kerja" class="bg-[#faf9f5]">

        <div class="mx-auto max-w-[1440px] px-6 py-24 sm:px-10 lg:px-14 lg:py-32">

            <div class="grid items-center gap-16 lg:grid-cols-12 lg:gap-24">

                {{-- Premium visual card --}}
                <div class="lg:col-span-5">
                    <div class="relative min-h-[560px] overflow-hidden rounded-[2rem] bg-[#27352c] p-8 shadow-[0_30px_80px_rgba(39,53,44,.16)] sm:p-10">

                        <div class="absolute -right-24 -top-24 h-80 w-80 rounded-full border border-white/10"></div>
                        <div class="absolute -bottom-48 -left-28 h-[34rem] w-[34rem] rounded-full border border-white/10"></div>
                        <div class="absolute bottom-[-18%] left-[-20%] h-[55%] w-[140%] rotate-[-6deg] rounded-[50%] bg-[#71816b]/55"></div>
                        <div class="absolute bottom-[-23%] left-[25%] h-[52%] w-[110%] rotate-[5deg] rounded-[50%] bg-[#91a38a]/25"></div>

                        <div class="relative z-10 flex h-full min-h-[480px] flex-col justify-between">
                            <div class="flex items-start justify-between">
                                <div>
                                    <p class="text-[10px] font-semibold uppercase tracking-[0.32em] text-[#c8d2c2]">
                                        Pengalaman Digital
                                    </p>
                                    <p class="mt-5 text-xs text-white/40">Sederhana dari awal hingga akhir.</p>
                                </div>

                                <span class="flex h-11 w-11 items-center justify-center rounded-full border border-white/10 bg-white/[0.05] text-white/70">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <path d="M12 3v18M3 12h18"/>
                                    </svg>
                                </span>
                            </div>

                            <div>
                                <p class="max-w-sm text-5xl font-medium leading-[0.98] tracking-[-0.055em] text-white sm:text-6xl">
                                    Pilih.
                                    <span class="block text-[#b7c4b2]">Booking.</span>
                                    <span class="block">Pantau.</span>
                                </p>

                                <p class="mt-7 max-w-sm text-sm leading-7 text-white/45">
                                    Semua proses dirancang agar keluarga dapat memperoleh informasi dan melakukan
                                    pemesanan dengan lebih mudah.
                                </p>
                            </div>

                            <div class="flex items-center gap-4 border-t border-white/10 pt-5">
                                <span class="text-[9px] font-semibold uppercase tracking-[0.28em] text-white/35">Tanah Salama</span>
                                <span class="h-px flex-1 bg-white/10"></span>
                                <span class="text-[9px] text-white/30">01 — 04</span>
                            </div>
                        </div>

                    </div>
                </div>


                {{-- Steps --}}
                <div class="lg:col-span-6 lg:col-start-7">

                    <div class="flex items-center gap-3">
                        <span class="h-1.5 w-1.5 rounded-full bg-[#71816b]"></span>
                        <p class="text-[10px] font-semibold uppercase tracking-[0.32em] text-[#71816b]">
                            Cara Kerja
                        </p>
                    </div>

                    <h2 class="mt-7 max-w-xl text-5xl font-medium leading-[0.98] tracking-[-0.055em] text-[#29352c] sm:text-6xl">
                        Semuanya dimulai dari informasi yang jelas.
                    </h2>

                    <div class="mt-14">

                        <div class="group flex gap-6 border-t border-[#d9dcd5] py-7">
                            <span class="pt-1 text-[10px] font-semibold tracking-[0.25em] text-[#a0a69e]">01</span>
                            <div class="flex-1">
                                <div class="flex items-center justify-between gap-4">
                                    <h3 class="text-lg font-semibold text-[#3e493f]">Temukan area</h3>
                                    <span class="text-[#a3aaa1] transition group-hover:translate-x-1">→</span>
                                </div>
                                <p class="mt-2 max-w-lg text-sm leading-7 text-[#858b84]">
                                    Jelajahi kategori dan area petak yang tersedia.
                                </p>
                            </div>
                        </div>

                        <div class="group flex gap-6 border-t border-[#d9dcd5] py-7">
                            <span class="pt-1 text-[10px] font-semibold tracking-[0.25em] text-[#a0a69e]">02</span>
                            <div class="flex-1">
                                <div class="flex items-center justify-between gap-4">
                                    <h3 class="text-lg font-semibold text-[#3e493f]">Pilih petak</h3>
                                    <span class="text-[#a3aaa1] transition group-hover:translate-x-1">→</span>
                                </div>
                                <p class="mt-2 max-w-lg text-sm leading-7 text-[#858b84]">
                                    Pilih petak berdasarkan lokasi, kategori, jenis lahan, dan harga.
                                </p>
                            </div>
                        </div>

                        <div class="group flex gap-6 border-t border-[#d9dcd5] py-7">
                            <span class="pt-1 text-[10px] font-semibold tracking-[0.25em] text-[#a0a69e]">03</span>
                            <div class="flex-1">
                                <div class="flex items-center justify-between gap-4">
                                    <h3 class="text-lg font-semibold text-[#3e493f]">Lakukan booking</h3>
                                    <span class="text-[#a3aaa1] transition group-hover:translate-x-1">→</span>
                                </div>
                                <p class="mt-2 max-w-lg text-sm leading-7 text-[#858b84]">
                                    Isi data pemesan dan simpan kode booking Anda.
                                </p>
                            </div>
                        </div>

                        <div class="group flex gap-6 border-t border-[#d9dcd5] py-7">
                            <span class="pt-1 text-[10px] font-semibold tracking-[0.25em] text-[#a0a69e]">04</span>
                            <div class="flex-1">
                                <div class="flex items-center justify-between gap-4">
                                    <h3 class="text-lg font-semibold text-[#3e493f]">Pantau proses</h3>
                                    <span class="text-[#a3aaa1] transition group-hover:translate-x-1">→</span>
                                </div>
                                <p class="mt-2 max-w-lg text-sm leading-7 text-[#858b84]">
                                    Gunakan kode booking untuk melihat perkembangan pemesanan.
                                </p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =====================================================
         CLOSING CTA
    ====================================================== --}}
    <section class="relative overflow-hidden bg-[#26332b] text-white">

        <div class="absolute -right-40 -top-40 h-[32rem] w-[32rem] rounded-full border border-white/10"></div>
        <div class="absolute -bottom-56 left-[-10rem] h-[34rem] w-[34rem] rounded-full border border-white/[0.07]"></div>

        <div class="relative mx-auto max-w-[1440px] px-6 py-24 sm:px-10 lg:px-14 lg:py-32">

            <div class="grid gap-12 lg:grid-cols-12 lg:items-end">

                <div class="lg:col-span-8">
                    <p class="text-[10px] font-semibold uppercase tracking-[0.34em] text-[#aebba8]">
                        Tanah Salama
                    </p>

                    <h2 class="mt-7 max-w-4xl text-5xl font-medium leading-[0.95] tracking-[-0.06em] text-white sm:text-6xl lg:text-7xl">
                        Ruang yang tenang untuk kenangan yang bermakna.
                    </h2>

                    <p class="mt-7 max-w-xl text-sm leading-7 text-white/45">
                        Dirancang untuk memberikan pengalaman informasi dan pemesanan yang lebih tertata,
                        transparan, dan mudah diakses.
                    </p>
                </div>

                <div class="lg:col-span-4 lg:flex lg:justify-end">
                    <a href="{{ url('/') }}"
                       class="group inline-flex items-center gap-5 rounded-full bg-white px-6 py-3.5 text-xs font-semibold text-[#26332b] shadow-2xl transition duration-300 hover:-translate-y-1">
                        Kembali ke halaman utama
                        <span class="flex h-7 w-7 items-center justify-center rounded-full bg-[#e9eee7] transition group-hover:translate-x-0.5">
                            →
                        </span>
                    </a>
                </div>

            </div>

            <div class="mt-16 flex flex-col gap-4 border-t border-white/10 pt-6 sm:flex-row sm:items-center sm:justify-between">
                <p class="text-[9px] font-semibold uppercase tracking-[0.3em] text-white/30">
                    A place to remember
                </p>
                <p class="text-xs text-white/25">
                    Tanah Salama
                </p>
            </div>

        </div>

    </section>

</div>

@endsection
