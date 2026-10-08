@extends('layouts.app')

@section('title', 'Pengaturan Pembayaran')

@section('content')

<div class="min-h-screen bg-[#F7F5EF]">


    {{-- CONTENT --}}
    <div class="max-w-5xl mx-auto px-6 lg:px-10 py-10">

        {{-- SUCCESS --}}
        @if(session('success'))
            <div class="mb-6 rounded-2xl border border-green-200
                        bg-green-50 px-5 py-4 text-green-700">

                {{ session('success') }}

            </div>
        @endif


        {{-- ERROR --}}
        @if($errors->any())
            <div class="mb-6 rounded-2xl border border-red-200
                        bg-red-50 px-5 py-4 text-red-700">

                <ul class="list-disc pl-5 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif


        <form
            action="{{ route('admin.payment-settings.update') }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-8">

            @csrf


            {{-- REKENING --}}
            <div class="bg-white rounded-3xl border border-gray-100
                        shadow-sm p-7 lg:p-9">

                <div class="flex items-start gap-4 mb-8">

                    <div class="w-12 h-12 rounded-2xl
                                bg-[#173528] text-[#C8A96B]
                                flex items-center justify-center">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-6 h-6"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1.5"
                                  d="M3 10h18M5 6h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z" />

                        </svg>

                    </div>

                    <div>

                        <h2 class="text-xl font-semibold text-[#173528]">
                            Rekening Transfer
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            Informasi rekening yang akan ditampilkan
                            pada halaman pembayaran pelanggan.
                        </p>

                    </div>

                </div>


                <div class="grid md:grid-cols-2 gap-6">

                    {{-- BANK --}}
                    <div>

                        <label class="block text-sm font-medium
                                      text-gray-700 mb-2">

                            Nama Bank

                        </label>

                        <input
                            type="text"
                            name="nama_bank"
                            value="{{ old('nama_bank', $setting->nama_bank ?? '') }}"
                            placeholder="Contoh: BCA"
                            required
                            class="w-full rounded-xl border border-gray-200
                                   px-4 py-3.5
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-[#C8A96B]/40
                                   focus:border-[#C8A96B]">

                    </div>


                    {{-- NOMOR REKENING --}}
                    <div>

                        <label class="block text-sm font-medium
                                      text-gray-700 mb-2">

                            Nomor Rekening

                        </label>

                        <input
                            type="text"
                            name="nomor_rekening"
                            value="{{ old('nomor_rekening', $setting->nomor_rekening ?? '') }}"
                            placeholder="Contoh: 1234567890"
                            required
                            class="w-full rounded-xl border border-gray-200
                                   px-4 py-3.5
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-[#C8A96B]/40
                                   focus:border-[#C8A96B]">

                    </div>


                    {{-- PEMILIK --}}
                    <div class="md:col-span-2">

                        <label class="block text-sm font-medium
                                      text-gray-700 mb-2">

                            Nama Pemilik Rekening

                        </label>

                        <input
                            type="text"
                            name="nama_rekening"
                            value="{{ old('nama_rekening', $setting->nama_rekening ?? '') }}"
                            placeholder="Contoh: TANAH SALAMA"
                            required
                            class="w-full rounded-xl border border-gray-200
                                   px-4 py-3.5
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-[#C8A96B]/40
                                   focus:border-[#C8A96B]">

                    </div>

                </div>

            </div>


            {{-- QRIS --}}
            <div class="bg-white rounded-3xl border border-gray-100
                        shadow-sm p-7 lg:p-9">

                <div class="flex items-start gap-4 mb-8">

                    <div class="w-12 h-12 rounded-2xl
                                bg-[#173528] text-[#C8A96B]
                                flex items-center justify-center">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-6 h-6"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1.5"
                                  d="M4 4h6v6H4V4zm10 0h6v6h-6V4zM4 14h6v6H4v-6zm10 0h2m-2 3h2m2-3h2v6h-6" />

                        </svg>

                    </div>

                    <div>

                        <h2 class="text-xl font-semibold text-[#173528]">
                            QRIS
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            Upload QRIS yang akan digunakan pelanggan
                            untuk melakukan pembayaran.
                        </p>

                    </div>

                </div>


                <div class="grid lg:grid-cols-2 gap-8 items-start">

                    {{-- PREVIEW --}}
                    <div>

                        <p class="text-sm font-medium text-gray-700 mb-3">
                            QRIS Saat Ini
                        </p>

                        @if($setting && $setting->qris)

                            <div class="bg-gray-50 rounded-2xl
                                        border border-gray-200
                                        p-6 inline-flex">

                                <img
                                    src="{{ asset('storage/' . $setting->qris) }}"
                                    alt="QRIS Tanah Salama"
                                    class="w-64 h-64 object-contain rounded-xl">

                            </div>

                        @else

                            <div class="w-64 h-64 rounded-2xl
                                        border-2 border-dashed
                                        border-gray-300
                                        flex items-center justify-center
                                        text-gray-400 text-sm text-center p-6">

                                QRIS belum tersedia

                            </div>

                        @endif

                    </div>


                    {{-- UPLOAD --}}
                    <div>

                        <label class="block text-sm font-medium
                                      text-gray-700 mb-3">

                            Ganti QRIS

                        </label>

                        <label
                            class="block border-2 border-dashed
                                   border-gray-300 rounded-2xl
                                   p-8 text-center cursor-pointer
                                   hover:border-[#C8A96B]
                                   hover:bg-[#C8A96B]/5
                                   transition">

                            <input
                                type="file"
                                name="qris"
                                accept=".jpg,.jpeg,.png"
                                class="hidden"
                                onchange="showFileName(this)">

                            <div class="text-gray-500">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-10 h-10 mx-auto mb-3
                                            text-[#C8A96B]"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="1.5"
                                          d="M12 16V4m0 0l-4 4m4-4l4 4M5 20h14" />

                                </svg>

                                <p class="font-medium text-gray-700">
                                    Klik untuk upload QRIS
                                </p>

                                <p class="text-xs text-gray-400 mt-2">
                                    JPG, JPEG, PNG — maksimal 2 MB
                                </p>

                                <p id="fileName"
                                   class="text-sm text-[#A0834E] mt-4">
                                </p>

                            </div>

                        </label>

                    </div>

                </div>

            </div>


            {{-- TOMBOL --}}
            <div class="flex justify-end">

                <button
                    type="submit"
                    class="inline-flex items-center justify-center
                           bg-[#173528]
                           text-white
                           px-7 py-3.5
                           rounded-full
                           font-semibold
                           hover:bg-[#244A38]
                           transition">

                    Simpan Pengaturan

                </button>

            </div>

        </form>

    </div>

</div>


<script>
    function showFileName(input) {
        const fileName = document.getElementById('fileName');

        if (input.files.length > 0) {
            fileName.textContent =
                'File dipilih: ' + input.files[0].name;
        } else {
            fileName.textContent = '';
        }
    }
</script>

@endsection