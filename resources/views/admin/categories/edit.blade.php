@extends('layouts.app')

@section('title', 'Edit Kategori - Admin Tanah Salama')

@section('content')

<div class="min-h-screen bg-[#F7F5EF] pt-28 pb-16">

    <div class="max-w-3xl mx-auto px-5 sm:px-8">

        {{-- HEADER --}}
        <div class="mb-8">

            <a
                href="{{ route('admin.categories.index') }}"
                class="inline-flex items-center gap-2
                       text-sm text-[#A0834E]
                       hover:text-[#173528]
                       transition mb-5"
            >
                ← Kembali ke Kategori
            </a>

            <p class="text-xs uppercase tracking-[0.25em]
                      text-[#A0834E] font-semibold mb-2">
                Admin Tanah Salama
            </p>

            <h1 class="font-serif text-3xl sm:text-4xl
                       text-[#173528]">
                Edit Kategori
            </h1>

            <p class="text-gray-600 mt-2">
                Perbarui informasi dan harga kategori
                <span class="font-semibold text-[#173528]">
                    {{ $category->nama_kategori }}
                </span>.
            </p>

        </div>


        {{-- VALIDATION --}}
        @if($errors->any())

            <div class="mb-6 rounded-2xl
                        border border-red-200
                        bg-red-50 px-5 py-4">

                <p class="font-semibold text-red-800 mb-2">
                    Terdapat kesalahan:
                </p>

                <ul class="list-disc list-inside
                           text-sm text-red-700 space-y-1">

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif


        <div class="bg-white rounded-3xl
                    border border-gray-200
                    shadow-sm overflow-hidden">


            {{-- TITLE FORM --}}
            <div class="px-6 sm:px-8 py-7
                        border-b border-gray-100">

                <h2 class="font-serif text-xl
                           text-[#173528]">
                    Informasi Kategori
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Atur ukuran petak dan harga yang akan digunakan
                    dalam proses booking dan pembayaran.
                </p>

            </div>


            {{-- FORM --}}
            <form
                action="{{ route('admin.categories.update', $category) }}"
                method="POST"
                class="px-6 sm:px-8 py-8 space-y-6"
            >

                @csrf
                @method('PUT')


                {{-- NAMA KATEGORI --}}
                <div>

                    <label
                        for="nama_kategori"
                        class="block text-sm font-semibold
                               text-[#173528] mb-2"
                    >
                        Nama Kategori
                    </label>

                    <input
                        type="text"
                        id="nama_kategori"
                        name="nama_kategori"
                        value="{{ old('nama_kategori', $category->nama_kategori) }}"
                        maxlength="100"
                        required
                        class="w-full rounded-xl
                               border border-gray-300
                               px-4 py-3
                               outline-none
                               focus:border-[#A0834E]
                               focus:ring-2
                               focus:ring-[#C8A96B]/20"
                    >

                    @error('nama_kategori')
                        <p class="text-sm text-red-600 mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- LUAS PETAK --}}
                <div>

                    <label
                        for="luas"
                        class="block text-sm font-semibold
                               text-[#173528] mb-2"
                    >
                        Luas Petak
                    </label>

                    <input
                        type="text"
                        id="luas"
                        name="luas"
                        value="{{ old('luas', $category->luas) }}"
                        placeholder="Contoh: 3 x 2 Meter"
                        maxlength="100"
                        class="w-full rounded-xl
                               border border-gray-300
                               px-4 py-3
                               outline-none
                               focus:border-[#A0834E]
                               focus:ring-2
                               focus:ring-[#C8A96B]/20"
                    >

                    @error('luas')
                        <p class="text-sm text-red-600 mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- HARGA DASAR --}}
                <div>

                    <label
                        for="harga"
                        class="block text-sm font-semibold
                               text-[#173528] mb-2"
                    >
                        Harga Dasar Kategori
                    </label>

                    <div class="relative">

                        <span
                            class="absolute left-4 top-1/2
                                   -translate-y-1/2
                                   text-gray-500"
                        >
                            Rp
                        </span>

                        <input
                            type="number"
                            id="harga"
                            name="harga"
                            value="{{ old('harga', $category->harga) }}"
                            min="0"
                            step="1000"
                            required
                            class="w-full rounded-xl
                                   border border-gray-300
                                   pl-12 pr-4 py-3
                                   outline-none
                                   focus:border-[#A0834E]
                                   focus:ring-2
                                   focus:ring-[#C8A96B]/20"
                        >

                    </div>

                    <p class="text-xs text-gray-500 mt-2">
                        Harga dasar umum kategori. Harga petak dapat
                        diatur secara terpisah melalui menu Kelola Petak.
                    </p>

                    @error('harga')
                        <p class="text-sm text-red-600 mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- PEMBATAS --}}
                <div class="pt-2">
                    <div class="border-t border-gray-100"></div>
                </div>


                {{-- JUDUL HARGA PEMBAYARAN --}}
                <div>

                    <h3 class="font-serif text-xl text-[#173528]">
                        Harga Pembayaran
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Harga berikut akan digunakan customer ketika
                        melakukan pembayaran booking.
                    </p>

                </div>


                {{-- BOOKING FEE --}}
                <div>

                    <label
                        for="booking_fee"
                        class="block text-sm font-semibold
                               text-[#173528] mb-2"
                    >
                        Booking Fee
                    </label>

                    <div class="relative">

                        <span
                            class="absolute left-4 top-1/2
                                   -translate-y-1/2
                                   text-gray-500"
                        >
                            Rp
                        </span>

                        <input
                            type="number"
                            id="booking_fee"
                            name="booking_fee"
                            value="{{ old('booking_fee', $category->booking_fee) }}"
                            min="0"
                            step="1000"
                            required
                            class="w-full rounded-xl
                                   border border-gray-300
                                   pl-12 pr-4 py-3
                                   outline-none
                                   focus:border-[#A0834E]
                                   focus:ring-2
                                   focus:ring-[#C8A96B]/20"
                        >

                    </div>

                    @error('booking_fee')
                        <p class="text-sm text-red-600 mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- CASH --}}
                <div>

                    <label
                        for="harga_cash"
                        class="block text-sm font-semibold
                               text-[#173528] mb-2"
                    >
                        Harga Cash / Lunas
                    </label>

                    <div class="relative">

                        <span
                            class="absolute left-4 top-1/2
                                   -translate-y-1/2
                                   text-gray-500"
                        >
                            Rp
                        </span>

                        <input
                            type="number"
                            id="harga_cash"
                            name="harga_cash"
                            value="{{ old('harga_cash', $category->harga_cash) }}"
                            min="0"
                            step="1000"
                            required
                            class="w-full rounded-xl
                                   border border-gray-300
                                   pl-12 pr-4 py-3
                                   outline-none
                                   focus:border-[#A0834E]
                                   focus:ring-2
                                   focus:ring-[#C8A96B]/20"
                        >

                    </div>

                    @error('harga_cash')
                        <p class="text-sm text-red-600 mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- CICILAN --}}
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">


                    {{-- 12 BULAN --}}
                    <div>

                        <label
                            for="cicilan_12"
                            class="block text-sm font-semibold
                                   text-[#173528] mb-2"
                        >
                            Cicilan 12 Bulan
                        </label>

                        <div class="relative">

                            <span
                                class="absolute left-3 top-1/2
                                       -translate-y-1/2
                                       text-gray-500 text-sm"
                            >
                                Rp
                            </span>

                            <input
                                type="number"
                                id="cicilan_12"
                                name="cicilan_12"
                                value="{{ old('cicilan_12', $category->cicilan_12) }}"
                                min="0"
                                step="1000"
                                required
                                class="w-full rounded-xl
                                       border border-gray-300
                                       pl-10 pr-3 py-3
                                       outline-none
                                       focus:border-[#A0834E]
                                       focus:ring-2
                                       focus:ring-[#C8A96B]/20"
                            >

                        </div>

                        @error('cicilan_12')
                            <p class="text-sm text-red-600 mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- 24 BULAN --}}
                    <div>

                        <label
                            for="cicilan_24"
                            class="block text-sm font-semibold
                                   text-[#173528] mb-2"
                        >
                            Cicilan 24 Bulan
                        </label>

                        <div class="relative">

                            <span
                                class="absolute left-3 top-1/2
                                       -translate-y-1/2
                                       text-gray-500 text-sm"
                            >
                                Rp
                            </span>

                            <input
                                type="number"
                                id="cicilan_24"
                                name="cicilan_24"
                                value="{{ old('cicilan_24', $category->cicilan_24) }}"
                                min="0"
                                step="1000"
                                required
                                class="w-full rounded-xl
                                       border border-gray-300
                                       pl-10 pr-3 py-3
                                       outline-none
                                       focus:border-[#A0834E]
                                       focus:ring-2
                                       focus:ring-[#C8A96B]/20"
                            >

                        </div>

                        @error('cicilan_24')
                            <p class="text-sm text-red-600 mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- 36 BULAN --}}
                    <div>

                        <label
                            for="cicilan_36"
                            class="block text-sm font-semibold
                                   text-[#173528] mb-2"
                        >
                            Cicilan 36 Bulan
                        </label>

                        <div class="relative">

                            <span
                                class="absolute left-3 top-1/2
                                       -translate-y-1/2
                                       text-gray-500 text-sm"
                            >
                                Rp
                            </span>

                            <input
                                type="number"
                                id="cicilan_36"
                                name="cicilan_36"
                                value="{{ old('cicilan_36', $category->cicilan_36) }}"
                                min="0"
                                step="1000"
                                required
                                class="w-full rounded-xl
                                       border border-gray-300
                                       pl-10 pr-3 py-3
                                       outline-none
                                       focus:border-[#A0834E]
                                       focus:ring-2
                                       focus:ring-[#C8A96B]/20"
                            >

                        </div>

                        @error('cicilan_36')
                            <p class="text-sm text-red-600 mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>


                {{-- DESKRIPSI --}}
                <div>

                    <label
                        for="deskripsi"
                        class="block text-sm font-semibold
                               text-[#173528] mb-2"
                    >
                        Informasi / Deskripsi
                    </label>

                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        rows="7"
                        class="w-full rounded-xl
                               border border-gray-300
                               px-4 py-3
                               outline-none resize-y
                               focus:border-[#A0834E]
                               focus:ring-2
                               focus:ring-[#C8A96B]/20"
                    >{{ old('deskripsi', $category->deskripsi) }}</textarea>

                    @error('deskripsi')
                        <p class="text-sm text-red-600 mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- INFO PETAK --}}
                <div class="rounded-2xl
                            border border-[#C8A96B]/30
                            bg-[#FBF8EF]
                            px-5 py-4">

                    <p class="text-sm text-[#173528]">

                        Kategori ini saat ini digunakan oleh

                        <span class="font-bold">
                            {{ $category->plots()->count() }}
                        </span>

                        petak makam.

                    </p>

                    <p class="text-xs text-gray-500 mt-1">

                        Mengubah kategori atau harga kategori tidak otomatis
                        mengubah harga petak yang sudah dibuat.

                    </p>

                </div>


                {{-- ACTION --}}
                <div class="flex flex-col-reverse sm:flex-row
                            sm:justify-end gap-3
                            pt-5 border-t border-gray-100">

                    <a
                        href="{{ route('admin.categories.index') }}"
                        class="inline-flex items-center justify-center
                               px-6 py-3 rounded-full
                               border border-gray-300
                               text-gray-600
                               font-semibold
                               hover:bg-gray-50
                               transition"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center
                               px-7 py-3 rounded-full
                               bg-[#173528]
                               text-white
                               font-semibold
                               hover:bg-[#244D3C]
                               transition"
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection