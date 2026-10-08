@extends('layouts.app')

@section('title', 'Tambah Kategori - Admin Tanah Salama')

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
                Tambah Kategori
            </h1>

            <p class="text-gray-600 mt-2">
                Buat kategori baru untuk petak makam beserta skema pembayarannya.
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

            <div class="px-6 sm:px-8 py-7
                        border-b border-gray-100">

                <h2 class="font-serif text-xl
                           text-[#173528]">
                    Informasi Kategori
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Masukkan informasi dan harga yang akan digunakan oleh sistem.
                </p>

            </div>


            <form
                action="{{ route('admin.categories.store') }}"
                method="POST"
                class="px-6 sm:px-8 py-8 space-y-8"
            >

                @csrf


                {{-- =====================================================
                    INFORMASI DASAR
                ====================================================== --}}

                <div>

                    <div class="mb-5">

                        <p class="text-xs uppercase tracking-[0.2em]
                                  text-[#A0834E] font-semibold">
                            Informasi dasar
                        </p>

                        <p class="text-sm text-gray-500 mt-1">
                            Tentukan identitas dan ukuran kategori petak.
                        </p>

                    </div>


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
                            value="{{ old('nama_kategori') }}"
                            placeholder="Contoh: Single"
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


                    {{-- LUAS --}}
                    <div class="mt-5">

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
                            value="{{ old('luas') }}"
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


                    {{-- DESKRIPSI --}}
                    <div class="mt-5">

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
                            rows="5"
                            placeholder="Jelaskan informasi mengenai kategori ini..."
                            class="w-full rounded-xl
                                   border border-gray-300
                                   px-4 py-3
                                   outline-none resize-y
                                   focus:border-[#A0834E]
                                   focus:ring-2
                                   focus:ring-[#C8A96B]/20"
                        >{{ old('deskripsi') }}</textarea>

                        @error('deskripsi')
                            <p class="text-sm text-red-600 mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>


                {{-- =====================================================
                    HARGA PETAK
                ====================================================== --}}

                <div class="pt-7 border-t border-gray-100">

                    <div class="mb-5">

                        <p class="text-xs uppercase tracking-[0.2em]
                                  text-[#A0834E] font-semibold">
                            Harga petak
                        </p>

                        <p class="text-sm text-gray-500 mt-1">
                            Harga dasar kategori petak makam.
                        </p>

                    </div>


                    {{-- HARGA DASAR --}}
                    <div>

                        <label
                            for="harga"
                            class="block text-sm font-semibold
                                   text-[#173528] mb-2"
                        >
                            Harga Dasar Petak
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
                                value="{{ old('harga') }}"
                                placeholder="25000000"
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
                            Harga dasar kategori yang digunakan sebagai acuan harga petak.
                        </p>

                        @error('harga')
                            <p class="text-sm text-red-600 mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>


                {{-- =====================================================
                    SKEMA PEMBAYARAN
                ====================================================== --}}

                <div class="pt-7 border-t border-gray-100">

                    <div class="mb-5">

                        <p class="text-xs uppercase tracking-[0.2em]
                                  text-[#A0834E] font-semibold">
                            Skema pembayaran
                        </p>

                        <p class="text-sm text-gray-500 mt-1">
                            Tentukan nominal yang akan ditampilkan kepada customer
                            pada halaman pembayaran.
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
                                value="{{ old('booking_fee') }}"
                                placeholder="500000"
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
                    <div class="mt-5">

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
                                value="{{ old('harga_cash') }}"
                                placeholder="9000000"
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
                    <div class="mt-5">

                        <p class="text-sm font-semibold
                                  text-[#173528] mb-3">
                            Harga Cicilan
                        </p>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">


                            {{-- 12 BULAN --}}
                            <div>

                                <label
                                    for="cicilan_12"
                                    class="block text-xs font-medium
                                           text-gray-600 mb-2"
                                >
                                    12 Bulan
                                </label>

                                <div class="relative">

                                    <span
                                        class="absolute left-3 top-1/2
                                               -translate-y-1/2
                                               text-gray-400 text-sm"
                                    >
                                        Rp
                                    </span>

                                    <input
                                        type="number"
                                        id="cicilan_12"
                                        name="cicilan_12"
                                        value="{{ old('cicilan_12') }}"
                                        placeholder="790000"
                                        min="0"
                                        step="1000"
                                        required
                                        class="w-full rounded-xl
                                               border border-gray-300
                                               pl-10 pr-3 py-3
                                               text-sm
                                               outline-none
                                               focus:border-[#A0834E]
                                               focus:ring-2
                                               focus:ring-[#C8A96B]/20"
                                    >

                                </div>

                                @error('cicilan_12')
                                    <p class="text-xs text-red-600 mt-2">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            {{-- 24 BULAN --}}
                            <div>

                                <label
                                    for="cicilan_24"
                                    class="block text-xs font-medium
                                           text-gray-600 mb-2"
                                >
                                    24 Bulan
                                </label>

                                <div class="relative">

                                    <span
                                        class="absolute left-3 top-1/2
                                               -translate-y-1/2
                                               text-gray-400 text-sm"
                                    >
                                        Rp
                                    </span>

                                    <input
                                        type="number"
                                        id="cicilan_24"
                                        name="cicilan_24"
                                        value="{{ old('cicilan_24') }}"
                                        placeholder="450000"
                                        min="0"
                                        step="1000"
                                        required
                                        class="w-full rounded-xl
                                               border border-gray-300
                                               pl-10 pr-3 py-3
                                               text-sm
                                               outline-none
                                               focus:border-[#A0834E]
                                               focus:ring-2
                                               focus:ring-[#C8A96B]/20"
                                    >

                                </div>

                                @error('cicilan_24')
                                    <p class="text-xs text-red-600 mt-2">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            {{-- 36 BULAN --}}
                            <div>

                                <label
                                    for="cicilan_36"
                                    class="block text-xs font-medium
                                           text-gray-600 mb-2"
                                >
                                    36 Bulan
                                </label>

                                <div class="relative">

                                    <span
                                        class="absolute left-3 top-1/2
                                               -translate-y-1/2
                                               text-gray-400 text-sm"
                                    >
                                        Rp
                                    </span>

                                    <input
                                        type="number"
                                        id="cicilan_36"
                                        name="cicilan_36"
                                        value="{{ old('cicilan_36') }}"
                                        placeholder="320000"
                                        min="0"
                                        step="1000"
                                        required
                                        class="w-full rounded-xl
                                               border border-gray-300
                                               pl-10 pr-3 py-3
                                               text-sm
                                               outline-none
                                               focus:border-[#A0834E]
                                               focus:ring-2
                                               focus:ring-[#C8A96B]/20"
                                    >

                                </div>

                                @error('cicilan_36')
                                    <p class="text-xs text-red-600 mt-2">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =====================================================
                    ACTION
                ====================================================== --}}

                <div class="flex flex-col-reverse sm:flex-row
                            sm:justify-end gap-3
                            pt-7 border-t border-gray-100">

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
                        Simpan Kategori
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection