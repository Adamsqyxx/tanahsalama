@extends('layouts.app')

@section('title', 'Tambah Petak - Admin Tanah Salama')

@section('content')

<div class="min-h-screen bg-[#F7F5EF] pt-28 pb-16">

    <div class="max-w-4xl mx-auto px-5 sm:px-8">

        {{-- HEADER --}}
        <div class="mb-8">

            <a
                href="{{ route('admin.plots.index') }}"
                class="inline-flex items-center gap-2
                       text-sm text-[#A0834E]
                       hover:text-[#173528]
                       transition mb-5"
            >
                ← Kembali ke Daftar Petak
            </a>

            <p class="text-xs uppercase tracking-[0.25em]
                      text-[#A0834E] font-semibold mb-2">
                Admin Tanah Salama
            </p>

            <h1 class="font-serif text-3xl sm:text-4xl text-[#173528]">
                Tambah Petak Makam
            </h1>

            <p class="text-gray-600 mt-2">
                Tambahkan petak makam baru beserta kategori, jenis lahan, dan informasi petak.
            </p>

        </div>


        {{-- ERROR VALIDATION --}}
        @if($errors->any())

            <div class="mb-6 rounded-2xl border border-red-200
                        bg-red-50 px-5 py-4">

                <p class="font-semibold text-red-800 mb-2">
                    Terdapat kesalahan pada data:
                </p>

                <ul class="list-disc list-inside text-sm text-red-700 space-y-1">

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif


        {{-- FORM --}}
        <div class="bg-white rounded-3xl
                    border border-gray-200
                    shadow-sm overflow-hidden">

            <div class="px-6 sm:px-8 py-7
                        border-b border-gray-100">

                <h2 class="font-serif text-xl text-[#173528]">
                    Informasi Petak
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Isi data petak dengan lengkap sebelum menyimpannya.
                </p>

            </div>


            <form
    action="{{ route('admin.plots.store') }}"
    method="POST"
    enctype="multipart/form-data"
    class="px-6 sm:px-8 py-8 space-y-6"
>

                @csrf


                {{-- KODE PETAK --}}
                <div>

                    <label
                        for="kode_plot"
                        class="block text-sm font-semibold
                               text-[#173528] mb-2"
                    >
                        Kode Petak
                    </label>

                    <input
                        type="text"
                        id="kode_plot"
                        name="kode_plot"
                        value="{{ old('kode_plot') }}"
                        placeholder="Contoh: S-006"
                        required
                        maxlength="20"
                        class="w-full rounded-xl
                               border border-gray-300
                               px-4 py-3
                               text-gray-800
                               outline-none
                               focus:border-[#A0834E]
                               focus:ring-2
                               focus:ring-[#C8A96B]/20"
                    >

                    <p class="text-xs text-gray-500 mt-2">
                        Gunakan kode unik untuk setiap petak.
                        Contoh: S-006, C-001, F-001.
                    </p>

                    @error('kode_plot')
                        <p class="text-sm text-red-600 mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- KATEGORI --}}
                <div>

                    <label
                        for="category_id"
                        class="block text-sm font-semibold
                               text-[#173528] mb-2"
                    >
                        Kategori Petak
                    </label>

                    <select
                        id="category_id"
                        name="category_id"
                        required
                        class="w-full rounded-xl
                               border border-gray-300
                               px-4 py-3
                               text-gray-800
                               bg-white
                               outline-none
                               focus:border-[#A0834E]
                               focus:ring-2
                               focus:ring-[#C8A96B]/20"
                    >

                        <option value="">
                            -- Pilih Kategori --
                        </option>

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                            >
                                {{ $category->nama_kategori }}
                            </option>

                        @endforeach

                    </select>

                    @if($categories->isEmpty())

                        <p class="text-sm text-red-600 mt-2">
                            Belum ada kategori.
                            Tambahkan kategori terlebih dahulu.
                        </p>

                    @endif

                    @error('category_id')
                        <p class="text-sm text-red-600 mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- JENIS LAHAN --}}
                <div>

                    <label
                        for="jenis_lahan"
                        class="block text-sm font-semibold
                               text-[#173528] mb-2"
                    >
                        Jenis Lahan
                    </label>

                    <select
                        id="jenis_lahan"
                        name="jenis_lahan"
                        required
                        class="w-full rounded-xl
                               border border-gray-300
                               px-4 py-3
                               text-gray-800
                               bg-white
                               outline-none
                               focus:border-[#A0834E]
                               focus:ring-2
                               focus:ring-[#C8A96B]/20"
                    >

                        <option value="">
                            -- Pilih Jenis Lahan --
                        </option>

                        <option
                            value="Rumput"
                            {{ old('jenis_lahan') === 'Rumput' ? 'selected' : '' }}
                        >
                            Rumput
                        </option>

                        <option
                            value="Tanah"
                            {{ old('jenis_lahan') === 'Tanah' ? 'selected' : '' }}
                        >
                            Tanah
                        </option>

                    </select>

                    @error('jenis_lahan')
                        <p class="text-sm text-red-600 mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                


                {{-- DESKRIPSI --}}
                <div>

                    <label
                        for="deskripsi"
                        class="block text-sm font-semibold
                               text-[#173528] mb-2"
                    >
                        Informasi / Deskripsi Petak
                    </label>

                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        rows="6"
                        placeholder="Contoh: Petak berada di area yang tenang dan memiliki akses jalan yang mudah..."
                        class="w-full rounded-xl
                               border border-gray-300
                               px-4 py-3
                               text-gray-800
                               outline-none
                               resize-y
                               focus:border-[#A0834E]
                               focus:ring-2
                               focus:ring-[#C8A96B]/20"
                    >{{ old('deskripsi') }}</textarea>


                    <div>
    <label class="mb-2 block text-sm font-medium text-gray-700">
        Gambar Petak
    </label>

    <input
        type="file"
        name="gambar"
        accept="image/jpeg,image/png,image/webp"
        class="block w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-600
               file:mr-4 file:rounded-lg file:border-0
               file:bg-[#173F32] file:px-4 file:py-2
               file:text-sm file:font-medium file:text-white
               hover:file:bg-[#275B49]"
    >

    <p class="mt-2 text-xs text-gray-400">
        Format JPG, JPEG, PNG atau WEBP. Maksimal 5 MB.
    </p>

    @error('gambar')
        <p class="mt-1 text-xs text-red-500">
            {{ $message }}
        </p>
    @enderror
</div>

                    <p class="text-xs text-gray-500 mt-2">
                        Informasi ini akan dapat ditampilkan kepada customer
                        pada halaman detail petak.
                    </p>

                    @error('deskripsi')
                        <p class="text-sm text-red-600 mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- STATUS --}}
                <div>

                    <label class="block text-sm font-semibold
                                  text-[#173528] mb-2">
                        Status Awal
                    </label>

                    <div class="rounded-xl
                                border border-green-200
                                bg-green-50
                                px-4 py-3">

                        <div class="flex items-center gap-3">

                            <span class="w-3 h-3 rounded-full bg-green-500"></span>

                            <div>

                                <p class="font-semibold text-green-800">
                                    AVAILABLE
                                </p>

                                <p class="text-xs text-green-700 mt-0.5">
                                    Petak langsung tersedia untuk dipesan customer.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ACTION --}}
                <div class="flex flex-col-reverse sm:flex-row
                            sm:justify-end gap-3
                            pt-5 border-t border-gray-100">

                    <a
                        href="{{ route('admin.plots.index') }}"
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
                        Simpan Petak
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection