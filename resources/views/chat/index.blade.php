@extends('layouts.app')

@section('title', 'Chat Admin - Tanah Salama')

@section('content')

<div class="min-h-screen bg-[#F7F5EF] pt-32 pb-16">

    <div class="max-w-4xl mx-auto px-6 lg:px-8">


        {{-- ========================================================= --}}
        {{-- HEADER --}}
        {{-- ========================================================= --}}

        <div class="text-center mb-8">

            <p class="text-[10px] uppercase tracking-[0.25em]
                      text-[#C8A96B] font-semibold">

                TANAH SALAMA

            </p>

            <h1 class="mt-2 text-3xl md:text-4xl
                       font-serif text-[#173528]">

                Chat Pengelola

            </h1>

            <p class="mt-3 text-sm text-gray-500
                      max-w-xl mx-auto leading-relaxed">

                Hubungi pengelola Tanah Salama untuk mendapatkan
                informasi mengenai petak makam, booking,
                pembayaran, atau pertanyaan lainnya.

            </p>

        </div>


        {{-- ========================================================= --}}
        {{-- SUCCESS --}}
        {{-- ========================================================= --}}

        @if(session('success'))

            <div class="mb-6 rounded-2xl
                        border border-green-200
                        bg-green-50
                        px-5 py-4
                        text-sm text-green-700">

                {{ session('success') }}

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- ERROR --}}
        {{-- ========================================================= --}}

        @if(session('error'))

            <div class="mb-6 rounded-2xl
                        border border-red-200
                        bg-red-50
                        px-5 py-4
                        text-sm text-red-700">

                {{ session('error') }}

            </div>

        @endif


        @if($errors->any())

            <div class="mb-6 rounded-2xl
                        border border-red-200
                        bg-red-50
                        px-5 py-4">

                <p class="font-semibold text-red-700 text-sm">

                    Terdapat kesalahan:

                </p>

                <ul class="mt-2 list-disc list-inside
                           text-sm text-red-600 space-y-1">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif



        {{-- ========================================================= --}}
        {{-- JIKA CUSTOMER BELUM PUNYA ROOM CHAT --}}
        {{-- ========================================================= --}}

        @if(!$chat)


            {{-- ===================================================== --}}
            {{-- MULAI CHAT --}}
            {{-- ===================================================== --}}

            <div class="bg-white rounded-3xl
                        border border-gray-200
                        shadow-sm overflow-hidden">

                <div class="p-6 md:p-8">


                    <div class="flex items-start gap-4 mb-7">

                        <div class="w-12 h-12 rounded-2xl
                                    bg-[#173528]
                                    text-white
                                    flex items-center
                                    justify-center
                                    shrink-0">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-6 h-6"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.7"
                                    d="M8 10h8M8 14h5m8-2a9 9 0 11-18 0 9 9 0 0118 0z"
                                />

                            </svg>

                        </div>


                        <div>

                            <h2 class="text-xl font-semibold
                                       text-[#173528]">

                                Mulai Percakapan

                            </h2>

                            <p class="mt-1 text-sm text-gray-500">

                                Sampaikan pertanyaan Anda
                                kepada pengelola Tanah Salama.

                            </p>

                        </div>

                    </div>



                    <form
                        action="{{ route('chat.start') }}"
                        method="POST"
                        class="space-y-6">

                        @csrf


                        {{-- NAMA --}}
                        <div>

                            <label
                                for="nama_customer"
                                class="block text-sm
                                       font-medium
                                       text-[#173528]
                                       mb-2">

                                Nama

                            </label>

                            <input
                                type="text"
                                id="nama_customer"
                                name="nama_customer"
                                value="{{ old('nama_customer') }}"
                                placeholder="Masukkan nama Anda"
                                required
                                class="w-full rounded-2xl
                                       border border-gray-200
                                       px-5 py-3.5
                                       text-sm
                                       text-[#173528]
                                       focus:outline-none
                                       focus:ring-2
                                       focus:ring-[#173528]/20
                                       focus:border-[#173528]"
                            >

                        </div>



                        {{-- NOMOR HP --}}
                        <div>

                            <label
                                for="no_hp"
                                class="block text-sm
                                       font-medium
                                       text-[#173528]
                                       mb-2">

                                Nomor HP

                            </label>

                            <input
                                type="text"
                                id="no_hp"
                                name="no_hp"
                                value="{{ old('no_hp') }}"
                                placeholder="Contoh: 081234567890"
                                required
                                class="w-full rounded-2xl
                                       border border-gray-200
                                       px-5 py-3.5
                                       text-sm
                                       text-[#173528]
                                       focus:outline-none
                                       focus:ring-2
                                       focus:ring-[#173528]/20
                                       focus:border-[#173528]"
                            >

                        </div>



                        {{-- PESAN --}}
                        <div>

                            <label
                                for="pesan"
                                class="block text-sm
                                       font-medium
                                       text-[#173528]
                                       mb-2">

                                Pesan

                            </label>

                            <textarea
                                id="pesan"
                                name="pesan"
                                rows="5"
                                maxlength="2000"
                                placeholder="Tuliskan pertanyaan Anda..."
                                required
                                class="w-full rounded-2xl
                                       border border-gray-200
                                       px-5 py-3.5
                                       text-sm
                                       text-[#173528]
                                       resize-none
                                       focus:outline-none
                                       focus:ring-2
                                       focus:ring-[#173528]/20
                                       focus:border-[#173528]"
                            >{{ old('pesan') }}</textarea>

                            <p class="mt-2 text-xs text-gray-400">

                                Maksimal 2000 karakter.

                            </p>

                        </div>



                        <button
                            type="submit"
                            class="w-full min-h-[54px]
                                   rounded-full
                                   bg-[#173528]
                                   text-white
                                   font-semibold
                                   hover:bg-[#10291E]
                                   transition">

                            Mulai Chat

                        </button>

                    </form>

                </div>

            </div>



            {{-- ===================================================== --}}
            {{-- LANJUTKAN CHAT --}}
            {{-- ===================================================== --}}

            <div class="mt-6
                        bg-white
                        rounded-3xl
                        border border-gray-200
                        shadow-sm
                        p-6 md:p-8">

                <div class="text-center mb-6">

                    <p class="text-[10px]
                              uppercase
                              tracking-[0.2em]
                              text-[#C8A96B]
                              font-semibold">

                        Sudah Pernah Chat?

                    </p>

                    <h2 class="mt-2 text-xl
                               font-semibold
                               text-[#173528]">

                        Lanjutkan Percakapan

                    </h2>

                    <p class="mt-2 text-sm
                              text-gray-500
                              max-w-lg mx-auto
                              leading-relaxed">

                        Masukkan kode chat dan nomor HP
                        yang digunakan saat memulai percakapan
                        untuk membuka kembali room chat Anda.

                    </p>

                </div>



                <form
                    action="{{ route('chat.continue') }}"
                    method="POST"
                    class="space-y-5">

                    @csrf


                    {{-- KODE CHAT --}}
                    <div>

                        <label
                            for="kode_chat"
                            class="block text-sm
                                   font-medium
                                   text-[#173528]
                                   mb-2">

                            Kode Chat

                        </label>

                        <input
                            type="text"
                            id="kode_chat"
                            name="kode_chat"
                            value="{{ old('kode_chat') }}"
                            placeholder="Contoh: CHAT-X7K9P2M4Q"
                            required
                            class="w-full rounded-2xl
                                   border border-gray-200
                                   px-5 py-3.5
                                   text-sm
                                   uppercase
                                   tracking-wider
                                   text-[#173528]
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-[#173528]/20
                                   focus:border-[#173528]"
                        >

                    </div>



                    {{-- NOMOR HP --}}
                    <div>

                        <label
                            for="continue_no_hp"
                            class="block text-sm
                                   font-medium
                                   text-[#173528]
                                   mb-2">

                            Nomor HP

                        </label>

                        <input
                            type="text"
                            id="continue_no_hp"
                            name="no_hp"
                            value="{{ old('no_hp') }}"
                            placeholder="Nomor HP saat pertama chat"
                            required
                            class="w-full rounded-2xl
                                   border border-gray-200
                                   px-5 py-3.5
                                   text-sm
                                   text-[#173528]
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-[#173528]/20
                                   focus:border-[#173528]"
                        >

                    </div>



                    <button
                        type="submit"
                        class="w-full min-h-[52px]
                               rounded-full
                               border border-[#173528]
                               text-[#173528]
                               font-semibold
                               hover:bg-[#173528]
                               hover:text-white
                               transition">

                        Lanjutkan Percakapan

                    </button>

                </form>


                <div class="mt-5
                            rounded-2xl
                            bg-[#F7F5EF]
                            border border-gray-200
                            px-5 py-4">

                    <p class="text-xs
                              text-gray-500
                              leading-relaxed">

                        <span class="font-semibold text-[#173528]">
                            Catatan:
                        </span>

                        Simpan kode chat yang diberikan
                        setelah Anda mengirim pesan pertama.
                        Kode tersebut diperlukan untuk membuka
                        kembali percakapan di kemudian hari.

                    </p>

                </div>

            </div>


        @else


            {{-- ========================================================= --}}
            {{-- ROOM CHAT --}}
            {{-- ========================================================= --}}

            <div class="bg-white
                        rounded-3xl
                        border border-gray-200
                        shadow-sm
                        overflow-hidden">


                {{-- HEADER CHAT --}}
                <div class="bg-[#173528]
                            text-white
                            px-6 py-5">

                    <div class="flex items-center
                                justify-between
                                gap-4">

                        <div>

                            <p class="text-[10px]
                                      uppercase
                                      tracking-[0.2em]
                                      text-[#C8A96B]">

                                Chat Pengelola

                            </p>

                            <h2 class="mt-1 text-lg
                                       font-semibold">

                                Tanah Salama

                            </h2>

                        </div>


                        <div class="text-right">

                            <p class="text-[10px]
                                      text-white/50">

                                Kode Chat

                            </p>

                            <p class="mt-1 text-sm
                                      font-semibold
                                      tracking-wider">

                                {{ $chat->kode_chat }}

                            </p>

                        </div>

                    </div>

                </div>



                {{-- INFO CUSTOMER --}}
                <div class="px-6 py-4
                            bg-[#F7F5EF]
                            border-b border-gray-200">

                    <div class="flex items-center
                                justify-between
                                gap-4">

                        <div>

                            <p class="text-xs text-gray-500">
                                Customer
                            </p>

                            <p class="mt-1 text-sm
                                      font-semibold
                                      text-[#173528]">

                                {{ $chat->nama_customer }}

                            </p>

                        </div>


                        <div class="text-right">

                            <p class="text-xs text-gray-500">
                                Status
                            </p>


                            @if($chat->status === 'WAITING')

                                <span class="inline-flex
                                             mt-1
                                             px-3 py-1
                                             rounded-full
                                             bg-[#F8E9B5]
                                             text-[#7A621D]
                                             text-xs
                                             font-semibold">

                                    Menunggu Admin

                                </span>

                            @elseif($chat->status === 'ANSWERED')

                                <span class="inline-flex
                                             mt-1
                                             px-3 py-1
                                             rounded-full
                                             bg-green-100
                                             text-green-700
                                             text-xs
                                             font-semibold">

                                    Sudah Dibalas

                                </span>

                            @elseif($chat->status === 'CLOSED')

                                <span class="inline-flex
                                             mt-1
                                             px-3 py-1
                                             rounded-full
                                             bg-gray-200
                                             text-gray-600
                                             text-xs
                                             font-semibold">

                                    Ditutup

                                </span>

                            @else

                                <span class="inline-flex
                                             mt-1
                                             px-3 py-1
                                             rounded-full
                                             bg-blue-100
                                             text-blue-700
                                             text-xs
                                             font-semibold">

                                    Terbuka

                                </span>

                            @endif

                        </div>

                    </div>

                </div>



                {{-- ================================================= --}}
                {{-- PESAN --}}
                {{-- ================================================= --}}

                <div
                    id="chatMessages"
                    class="px-5 md:px-7 py-7
                           space-y-5
                           max-h-[520px]
                           overflow-y-auto">

                    @forelse($chat->messages as $message)


                        @if($message->pengirim === 'CUSTOMER')


                            {{-- CUSTOMER --}}
                            <div class="flex justify-end">

                                <div class="max-w-[82%]">

                                    <div class="rounded-2xl
                                                rounded-br-md
                                                bg-[#173528]
                                                text-white
                                                px-5 py-3.5">

                                        <p class="text-sm
                                                  leading-relaxed
                                                  whitespace-pre-line">

                                            {{ $message->pesan }}

                                        </p>

                                    </div>

                                    <p class="mt-1.5
                                              text-[10px]
                                              text-gray-400
                                              text-right">

                                        Anda ·
                                        {{ $message->created_at->format('d M Y, H:i') }}

                                    </p>

                                </div>

                            </div>


                        @else


                            {{-- ADMIN --}}
                            <div class="flex justify-start">

                                <div class="max-w-[82%]">

                                    <div class="rounded-2xl
                                                rounded-bl-md
                                                bg-[#F7F5EF]
                                                border border-gray-200
                                                text-[#173528]
                                                px-5 py-3.5">

                                        <p class="text-sm
                                                  leading-relaxed
                                                  whitespace-pre-line">

                                            {{ $message->pesan }}

                                        </p>

                                    </div>

                                    <p class="mt-1.5
                                              text-[10px]
                                              text-gray-400">

                                        Pengelola ·
                                        {{ $message->created_at->format('d M Y, H:i') }}

                                    </p>

                                </div>

                            </div>


                        @endif


                    @empty

                        <p class="text-center
                                  text-sm text-gray-400">

                            Belum ada pesan.

                        </p>

                    @endforelse

                </div>



                {{-- ================================================= --}}
                {{-- INPUT PESAN --}}
                {{-- ================================================= --}}

                @if($chat->status !== 'CLOSED')

                    <div class="border-t
                                border-gray-200
                                p-5 md:p-6">

                        <form
                            action="{{ route('chat.send') }}"
                            method="POST"
                            class="flex items-end gap-3">

                            @csrf


                            <textarea
                                name="pesan"
                                rows="2"
                                maxlength="2000"
                                required
                                placeholder="Tulis pesan..."
                                class="flex-1
                                       resize-none
                                       rounded-2xl
                                       border border-gray-200
                                       px-5 py-3.5
                                       text-sm
                                       text-[#173528]
                                       focus:outline-none
                                       focus:ring-2
                                       focus:ring-[#173528]/20
                                       focus:border-[#173528]"
                            ></textarea>


                            <button
                                type="submit"
                                class="w-12 h-12
                                       rounded-full
                                       bg-[#173528]
                                       text-white
                                       flex items-center
                                       justify-center
                                       shrink-0
                                       hover:bg-[#10291E]
                                       transition">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M5 12h14M13 6l6 6-6 6"
                                    />

                                </svg>

                            </button>

                        </form>

                    </div>


                @else


                    <div class="border-t
                                border-gray-200
                                bg-gray-50
                                px-6 py-5
                                text-center">

                        <p class="text-sm text-gray-500">

                            Percakapan ini telah ditutup
                            oleh pengelola.

                        </p>

                    </div>


                @endif


            </div>


            {{-- ================================================= --}}
            {{-- KODE CHAT --}}
            {{-- ================================================= --}}

            <div class="mt-6
                        bg-[#173528]
                        text-white
                        rounded-3xl
                        p-6 md:p-7">

                <div class="flex flex-col
                            md:flex-row
                            md:items-center
                            md:justify-between
                            gap-5">

                    <div>

                        <p class="text-[10px]
                                  uppercase
                                  tracking-[0.2em]
                                  text-[#C8A96B]">

                            Simpan Kode Chat

                        </p>

                        <p class="mt-2 text-sm
                                  text-white/60">

                            Gunakan kode ini bersama nomor HP
                            untuk membuka kembali percakapan.

                        </p>

                    </div>


                    <div class="flex items-center gap-3">

                        <p
                            id="kodeChat"
                            class="font-mono
                                   font-semibold
                                   tracking-wider">

                            {{ $chat->kode_chat }}

                        </p>


                        <button
                            type="button"
                            onclick="salinKodeChat()"
                            class="px-4 py-2
                                   rounded-full
                                   border border-white/20
                                   text-xs
                                   font-semibold
                                   hover:bg-white
                                   hover:text-[#173528]
                                   transition">

                            <span id="textSalinChat">
                                Salin
                            </span>

                        </button>

                    </div>

                </div>

            </div>


        @endif

    </div>

</div>



{{-- =============================================================== --}}
{{-- JAVASCRIPT --}}
{{-- =============================================================== --}}

<script>

    /*
    |--------------------------------------------------------------------------
    | Scroll chat ke pesan paling bawah
    |--------------------------------------------------------------------------
    */

    document.addEventListener(
        'DOMContentLoaded',
        function () {

            const chatMessages =
                document.getElementById(
                    'chatMessages'
                );

            if (chatMessages) {

                chatMessages.scrollTop =
                    chatMessages.scrollHeight;

            }

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Salin kode chat
    |--------------------------------------------------------------------------
    */

    function salinKodeChat() {

        const kode =
            document.getElementById(
                'kodeChat'
            ).innerText.trim();

        const text =
            document.getElementById(
                'textSalinChat'
            );


        navigator.clipboard
            .writeText(kode)
            .then(function () {

                text.innerText =
                    'Tersalin!';


                setTimeout(
                    function () {

                        text.innerText =
                            'Salin';

                    },
                    2000
                );

            })
            .catch(function () {

                alert(
                    'Kode chat gagal disalin.'
                );

            });
    }

</script>

@endsection