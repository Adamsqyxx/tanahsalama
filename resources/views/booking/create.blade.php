@extends('layouts.app')

@section('title', 'Data Pemesan - ' . $plot->kode_plot)

@section('content')

{{-- =========================================================
    PAGE HEADER
========================================================= --}}
<section class="bg-[#F4F1E9] pt-32 pb-8">

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="flex items-center gap-2 text-xs text-[#8A9088]">

            <a href="{{ route('home') }}#peta-makam"
    class="hover:text-[#52634F] transition">
    Petak Makam
</a>

            <span>/</span>

            

            <span>/</span>

            <span class="text-[#52634F]">
                Data Pemesan
            </span>

        </div>

    </div>

</section>


{{-- =========================================================
    MAIN CONTENT
========================================================= --}}
<section class="bg-[#F4F1E9] pb-24">

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="grid lg:grid-cols-12 gap-10 lg:gap-16">


            {{-- =================================================
                LEFT SIDE
            ================================================= --}}
            <div class="lg:col-span-5">

                <div class="lg:sticky lg:top-28">

                    {{-- STEP --}}
                    <div class="flex items-center gap-3">

                        <span class="w-8 h-8
                                     rounded-full
                                     bg-[#334336]
                                     text-white
                                     flex
                                     items-center
                                     justify-center
                                     text-xs
                                     font-medium">
                            01
                        </span>

                        <span class="text-[10px]
                                     uppercase
                                     tracking-[0.25em]
                                     text-[#71816B]">
                            Data Pemesan
                        </span>

                    </div>


                    {{-- TITLE --}}
                    <h1 class="mt-7
                               text-4xl
                               sm:text-5xl
                               lg:text-6xl
                               font-medium
                               leading-[0.98]
                               tracking-[-0.05em]
                               text-[#29352C]">

                        Lengkapi
                        <span class="text-[#71816B]">
                            data Anda.
                        </span>

                    </h1>


                    <p class="mt-7
                              max-w-md
                              text-sm
                              leading-8
                              text-[#737B72]">

                        Silakan isi informasi pemesan dengan benar
                        sebelum melanjutkan ke proses booking dan
                        pembayaran.

                    </p>


                    {{-- =================================================
                        PLOT SUMMARY
                    ================================================= --}}
                    <div class="mt-12">

                        <div class="border-t border-[#D9D8D0]">

                            {{-- PLOT --}}
                            <div class="py-6
                                        flex
                                        items-center
                                        justify-between
                                        gap-5
                                        border-b
                                        border-[#D9D8D0]">

                                <div>

                                    <p class="text-[9px]
                                              uppercase
                                              tracking-[0.25em]
                                              text-[#8A9088]">
                                        Petak Dipilih
                                    </p>

                                    <p class="mt-2
                                              text-2xl
                                              font-medium
                                              tracking-[-0.03em]
                                              text-[#334336]">
                                        {{ $plot->kode_plot }}
                                    </p>

                                </div>


                                <div class="flex items-center gap-2
                                            rounded-full
                                            bg-[#E8EEE4]
                                            px-3
                                            py-2">

                                    <span class="w-1.5 h-1.5
                                                 rounded-full
                                                 bg-[#718D69]">
                                    </span>

                                    <span class="text-[9px]
                                                 uppercase
                                                 tracking-[0.15em]
                                                 text-[#60725C]">
                                        Tersedia
                                    </span>

                                </div>

                            </div>


                            {{-- CATEGORY --}}
                            <div class="grid grid-cols-2">

                                <div class="py-6
                                            pr-5
                                            border-b
                                            border-r
                                            border-[#D9D8D0]">

                                    <p class="text-[9px]
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


                                {{-- LAND TYPE --}}
                                <div class="py-6
                                            pl-5
                                            border-b
                                            border-[#D9D8D0]">

                                    <p class="text-[9px]
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

                            </div>


                            {{-- PRICE --}}
                            <div class="py-6">

                                <p class="text-[9px]
                                          uppercase
                                          tracking-[0.2em]
                                          text-[#8A9088]">
                                    Harga Petak
                                </p>

                                <p class="mt-2
                                          text-2xl
                                          font-medium
                                          tracking-[-0.03em]
                                          text-[#334336]">

                                    Rp {{ number_format($plot->harga, 0, ',', '.') }}

                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                        NOTICE
                    ================================================= --}}
                    <div class="mt-6
                                bg-[#EDE9DE]
                                px-5
                                py-5">

                        <div class="flex items-start gap-3">

                            <div class="w-7 h-7
                                        shrink-0
                                        rounded-full
                                        bg-[#F8F7F3]
                                        flex
                                        items-center
                                        justify-center">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-3.5 h-3.5 text-[#71816B]"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="1.5">

                                    <circle cx="12"
                                            cy="12"
                                            r="9"/>

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M12 8v4l2.5 2.5"/>

                                </svg>

                            </div>


                            <div>

                                <p class="text-xs
                                          font-medium
                                          text-[#52634F]">
                                    Masa booking
                                </p>

                                <p class="mt-1
                                          text-[11px]
                                          leading-5
                                          text-[#858B84]">

                                    Setelah data dikirim, petak akan
                                    ditahan selama 1 × 24 jam.
                                    Pastikan pembayaran dilakukan
                                    sebelum waktu tersebut berakhir.

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                RIGHT SIDE FORM
            ================================================= --}}
            <div class="lg:col-span-7">

                <div class="bg-[#F8F7F3]
                            border
                            border-[#D9D8D0]
                            p-7
                            sm:p-10
                            lg:p-12">

                    {{-- FORM HEADER --}}
                    <div>

                        <p class="text-[9px]
                                  uppercase
                                  tracking-[0.25em]
                                  text-[#87907F]">
                            Informasi Pemesan
                        </p>

                        <h2 class="mt-4
                                   text-2xl
                                   sm:text-3xl
                                   font-medium
                                   tracking-[-0.04em]
                                   text-[#29352C]">

                            Siapa yang melakukan booking?

                        </h2>

                        <p class="mt-3
                                  text-sm
                                  leading-7
                                  text-[#858B84]">

                            Masukkan data sesuai dengan identitas
                            pemesan.

                        </p>

                    </div>


                    {{-- ERROR --}}
                    @if($errors->any())

                        <div class="mt-8
                                    border
                                    border-red-200
                                    bg-red-50
                                    rounded-2xl
                                    px-5
                                    py-4">

                            <p class="text-xs
                                      font-medium
                                      text-red-700">
                                Data belum lengkap.
                            </p>

                            <ul class="mt-2 space-y-1">

                                @foreach($errors->all() as $error)

                                    <li class="text-xs text-red-600">
                                        • {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    {{-- =================================================
                        FORM
                    ================================================= --}}
                    <form
                        action="{{ route('booking.store', $plot) }}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="mt-10">

                        @csrf


                        {{-- =================================================
                            NAME
                        ================================================= --}}
                        <div>

                            <label for="nama_pemesan"
                                   class="block
                                          text-xs
                                          font-medium
                                          text-[#596359]">

                                Nama Lengkap
                                <span class="text-[#A56C63]">*</span>

                            </label>

                            <input
                                type="text"
                                id="nama_pemesan"
                                name="nama_pemesan"
                                value="{{ old('nama_pemesan') }}"
                                required
                                autocomplete="name"
                                placeholder="Masukkan nama lengkap"
                                class="mt-3
                                       w-full
                                       h-14
                                       rounded-2xl
                                       border
                                       border-[#D7D8D0]
                                       bg-white
                                       px-5
                                       text-sm
                                       text-[#354335]
                                       placeholder:text-[#B2B5AE]
                                       outline-none
                                       focus:border-[#71816B]
                                       focus:ring-4
                                       focus:ring-[#71816B]/10
                                       transition">

                        </div>


                        {{-- =================================================
                            PHONE
                        ================================================= --}}
                        <div class="mt-7">

                            <label for="no_hp"
                                   class="block
                                          text-xs
                                          font-medium
                                          text-[#596359]">

                                Nomor Handphone
                                <span class="text-[#A56C63]">*</span>

                            </label>

                            <input
                                type="text"
                                id="no_hp"
                                name="no_hp"
                                value="{{ old('no_hp') }}"
                                required
                                autocomplete="tel"
                                placeholder="Contoh: 081234567890"
                                class="mt-3
                                       w-full
                                       h-14
                                       rounded-2xl
                                       border
                                       border-[#D7D8D0]
                                       bg-white
                                       px-5
                                       text-sm
                                       text-[#354335]
                                       placeholder:text-[#B2B5AE]
                                       outline-none
                                       focus:border-[#71816B]
                                       focus:ring-4
                                       focus:ring-[#71816B]/10
                                       transition">

                        </div>


                        {{-- =================================================
                            EMAIL
                        ================================================= --}}
                        <div class="mt-7">

                            <label for="email"
                                   class="block
                                          text-xs
                                          font-medium
                                          text-[#596359]">

                                Email
                                <span class="text-[#A5A69E]">
                                    (opsional)
                                </span>

                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                autocomplete="email"
                                placeholder="Contoh: nama@email.com"
                                class="mt-3
                                       w-full
                                       h-14
                                       rounded-2xl
                                       border
                                       border-[#D7D8D0]
                                       bg-white
                                       px-5
                                       text-sm
                                       text-[#354335]
                                       placeholder:text-[#B2B5AE]
                                       outline-none
                                       focus:border-[#71816B]
                                       focus:ring-4
                                       focus:ring-[#71816B]/10
                                       transition">

                        </div>


                        {{-- =================================================
                            KTP UPLOAD
                        ================================================= --}}
                        <div class="mt-7">

                            <label for="foto_ktp"
                                   class="block
                                          text-xs
                                          font-medium
                                          text-[#596359]">

                                Foto KTP
                                <span class="text-[#A56C63]">*</span>

                            </label>

                            <p class="mt-1.5
                                      text-[11px]
                                      text-[#999E97]">

                                JPG, JPEG, atau PNG — maksimal 2 MB.

                            </p>


                            <label for="foto_ktp"
                                   class="mt-4
                                          block
                                          cursor-pointer
                                          rounded-2xl
                                          border
                                          border-dashed
                                          border-[#C9CBC3]
                                          bg-white
                                          px-6
                                          py-6
                                          hover:border-[#71816B]
                                          hover:bg-[#FBFBF8]
                                          transition">

                                <div class="flex items-center gap-4">

                                    <div class="w-11
                                                h-11
                                                shrink-0
                                                rounded-full
                                                bg-[#E9EEE5]
                                                flex
                                                items-center
                                                justify-center">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-5 h-5 text-[#60725C]"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor"
                                             stroke-width="1.5">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M12 16V4"/>

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M8 8l4-4 4 4"/>

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M5 14v5a1 1 0 001 1h12a1 1 0 001-1v-5"/>

                                        </svg>

                                    </div>


                                    <div class="min-w-0">

                                        <p class="text-sm
                                                  font-medium
                                                  text-[#52634F]">

                                            Pilih foto KTP

                                        </p>

                                        <p id="ktpFileName"
                                           class="mt-1
                                                  text-[11px]
                                                  text-[#9A9F98]
                                                  truncate">

                                            Belum ada file dipilih

                                        </p>

                                    </div>

                                </div>


                                <input
                                    type="file"
                                    id="foto_ktp"
                                    name="foto_ktp"
                                    accept=".jpg,.jpeg,.png"
                                    required
                                    class="hidden">

                            </label>

                        </div>


                        {{-- =================================================
                            AGREEMENT
                        ================================================= --}}
                        <div class="mt-10
                                    pt-8
                                    border-t
                                    border-[#D9D8D0]">

                            <label for="setuju_ketentuan"
       class="flex items-start gap-4 cursor-pointer select-none">

    <input
        type="checkbox"
        id="setuju_ketentuan"
        name="setuju_ketentuan"
        value="1"
        {{ old('setuju_ketentuan') ? 'checked' : '' }}
        required
        class="mt-1 w-5 h-5 shrink-0
               rounded
               border-2 border-[#BFC4BC]
               accent-[#334336]
               cursor-pointer
               focus:ring-2 focus:ring-[#71816B]/30">

    <span class="text-xs leading-6 text-[#737B72]">
        Saya telah membaca dan menyetujui
        <span class="font-medium text-[#52634F]">
            ketentuan booking Tanah Salama
        </span>.
        Saya memahami bahwa petak yang dipilih akan ditahan selama
        <span class="font-medium text-[#52634F]">
            1 × 24 jam
        </span>
        setelah booking dibuat.
    </span>

</label>
                            @error('setuju_ketentuan')

                                <p class="mt-2
                                          ml-9
                                          text-xs
                                          text-red-600">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>


                        {{-- =================================================
                            ACTION
                        ================================================= --}}
                        <div class="mt-8
                                    flex
                                    flex-col-reverse
                                    sm:flex-row
                                    sm:items-center
                                    sm:justify-between
                                    gap-5">

                            

                            <button
                                type="submit"
                                id="submitBooking"
                                disabled
                                class="inline-flex
                                       items-center
                                       justify-center
                                       gap-4
                                       rounded-full
                                       bg-[#C3C7C1]
                                       px-7
                                       py-4
                                       text-sm
                                       font-medium
                                       text-white
                                       cursor-not-allowed
                                       transition-all
                                       duration-300">

                                <span>
                                    Lanjutkan Booking
                                </span>

                                <span class="text-white/50">
                                    →
                                </span>

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    BOOKING PROCESS
========================================================= --}}
<section class="bg-[#EDE9DE]">

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="py-20">

            <div class="grid md:grid-cols-3
                        border-t
                        border-[#D2D1C8]">


                <div class="py-7 md:pr-8 md:border-r border-[#D2D1C8]">

                    <span class="text-xs text-[#9AA194]">
                        01
                    </span>

                    <h3 class="mt-4
                               text-sm
                               font-medium
                               text-[#4D594D]">
                        Isi data pemesan
                    </h3>

                    <p class="mt-2
                              text-xs
                              leading-6
                              text-[#858B84]">
                        Masukkan informasi pemesan dan
                        unggah KTP.
                    </p>

                </div>


                <div class="py-7 md:px-8 md:border-r border-[#D2D1C8]">

                    <span class="text-xs text-[#9AA194]">
                        02
                    </span>

                    <h3 class="mt-4
                               text-sm
                               font-medium
                               text-[#4D594D]">
                        Dapatkan kode booking
                    </h3>

                    <p class="mt-2
                              text-xs
                              leading-6
                              text-[#858B84]">
                        Kode booking akan diberikan setelah
                        data berhasil diproses.
                    </p>

                </div>


                <div class="py-7 md:pl-8">

                    <span class="text-xs text-[#9AA194]">
                        03
                    </span>

                    <h3 class="mt-4
                               text-sm
                               font-medium
                               text-[#4D594D]">
                        Lakukan pembayaran
                    </h3>

                    <p class="mt-2
                              text-xs
                              leading-6
                              text-[#858B84]">
                        Selesaikan pembayaran dalam waktu
                        1 × 24 jam.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    JAVASCRIPT
========================================================= --}}
<script>

document.addEventListener('DOMContentLoaded', function () {

    const checkbox = document.getElementById('setuju_ketentuan');
    const button = document.getElementById('submitBooking');

    const fileInput = document.getElementById('foto_ktp');
    const fileName = document.getElementById('ktpFileName');


    /*
    |--------------------------------------------------------------------------
    | CHECKBOX KETENTUAN
    |--------------------------------------------------------------------------
    */

    if (checkbox && button) {

        checkbox.addEventListener('change', function () {

            if (this.checked) {

                button.disabled = false;

                button.classList.remove(
                    'bg-[#C3C7C1]',
                    'cursor-not-allowed'
                );

                button.classList.add(
                    'bg-[#334336]',
                    'hover:bg-[#26352A]',
                    'cursor-pointer'
                );

            } else {

                button.disabled = true;

                button.classList.remove(
                    'bg-[#334336]',
                    'hover:bg-[#26352A]',
                    'cursor-pointer'
                );

                button.classList.add(
                    'bg-[#C3C7C1]',
                    'cursor-not-allowed'
                );

            }

        });

    }


    /*
    |--------------------------------------------------------------------------
    | NAMA FILE KTP
    |--------------------------------------------------------------------------
    */

    if (fileInput && fileName) {

        fileInput.addEventListener('change', function () {

            if (this.files.length > 0) {

                fileName.textContent = this.files[0].name;

                fileName.classList.remove(
                    'text-[#9A9F98]'
                );

                fileName.classList.add(
                    'text-[#52634F]'
                );

            } else {

                fileName.textContent =
                    'Belum ada file dipilih';

            }

        });

    }

});

</script>

@endsection