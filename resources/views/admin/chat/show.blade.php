@extends('layouts.app')

@section('title', 'Detail Chat - Tanah Salama')

@section('content')

<div class="min-h-screen bg-[#F7F5EF] p-6 md:p-8">

    <div class="max-w-5xl mx-auto">

        {{-- BACK --}}
        <a
            href="{{ route('admin.chat.index') }}"
            class="inline-flex items-center gap-2
                   text-sm text-gray-500
                   hover:text-[#173528]
                   transition">

            ← Kembali ke Chat

        </a>


        {{-- HEADER --}}
        <div class="mt-5
                    flex flex-col md:flex-row
                    md:items-center
                    md:justify-between
                    gap-5">

            <div>

                <p class="text-[10px]
                          uppercase
                          tracking-[0.25em]
                          text-[#C8A96B]
                          font-semibold">

                    Percakapan

                </p>

                <h1 class="mt-2 text-3xl
                           font-serif
                           text-[#173528]">

                    {{ $chat->nama_customer }}

                </h1>

                <p class="mt-2 text-sm text-gray-500">

                    {{ $chat->no_hp }}
                    ·
                    {{ $chat->kode_chat }}

                </p>

            </div>


            <div class="flex gap-3">

                @if($chat->status !== 'CLOSED')

                    <form
                        action="{{ route('admin.chat.close', $chat) }}"
                        method="POST">

                        @csrf

                        <button
                            type="submit"
                            class="px-5 py-2.5
                                   rounded-full
                                   border border-gray-300
                                   text-sm
                                   font-semibold
                                   text-gray-600
                                   hover:bg-gray-100
                                   transition">

                            Tutup Chat

                        </button>

                    </form>

                @else

                    <form
                        action="{{ route('admin.chat.reopen', $chat) }}"
                        method="POST">

                        @csrf

                        <button
                            type="submit"
                            class="px-5 py-2.5
                                   rounded-full
                                   bg-[#173528]
                                   text-white
                                   text-sm
                                   font-semibold
                                   hover:bg-[#10291E]
                                   transition">

                            Buka Kembali

                        </button>

                    </form>

                @endif

            </div>

        </div>


        {{-- ALERT --}}
        @if(session('success'))

            <div class="mt-6 rounded-2xl
                        border border-green-200
                        bg-green-50
                        px-5 py-4
                        text-sm text-green-700">

                {{ session('success') }}

            </div>

        @endif


        @if(session('error'))

            <div class="mt-6 rounded-2xl
                        border border-red-200
                        bg-red-50
                        px-5 py-4
                        text-sm text-red-700">

                {{ session('error') }}

            </div>

        @endif


        {{-- CHAT BOX --}}
        <div class="mt-6 bg-white
                    rounded-3xl
                    border border-gray-200
                    overflow-hidden">


            {{-- CHAT STATUS --}}
            <div class="px-6 py-4
                        bg-[#F7F5EF]
                        border-b border-gray-200">

                <div class="flex items-center
                            justify-between">

                    <div>

                        <p class="text-xs text-gray-500">
                            Status Percakapan
                        </p>

                        <div class="mt-1">

                            @if($chat->status === 'WAITING')

                                <span class="inline-flex
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


                    <div class="text-right">

                        <p class="text-xs text-gray-500">
                            Nomor HP
                        </p>

                        <p class="mt-1 text-sm
                                  font-semibold
                                  text-[#173528]">

                            {{ $chat->no_hp }}

                        </p>

                    </div>

                </div>

            </div>


            {{-- MESSAGES --}}
            <div class="px-5 md:px-8
                        py-8
                        space-y-6
                        max-h-[600px]
                        overflow-y-auto">

                @forelse($chat->messages as $message)

                    @if($message->pengirim === 'ADMIN')

                        <div class="flex justify-end">

                            <div class="max-w-[80%]">

                                <div class="rounded-2xl
                                            rounded-br-md
                                            bg-[#173528]
                                            text-white
                                            px-5 py-4">

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

                                    Admin ·
                                    {{ $message->created_at->format('d M Y, H:i') }}

                                </p>

                            </div>

                        </div>

                    @else

                        <div class="flex justify-start">

                            <div class="max-w-[80%]">

                                <div class="rounded-2xl
                                            rounded-bl-md
                                            bg-[#F7F5EF]
                                            border border-gray-200
                                            text-[#173528]
                                            px-5 py-4">

                                    <p class="text-sm
                                              leading-relaxed
                                              whitespace-pre-line">

                                        {{ $message->pesan }}

                                    </p>

                                </div>

                                <p class="mt-1.5
                                          text-[10px]
                                          text-gray-400">

                                    {{ $chat->nama_customer }}
                                    ·
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


            {{-- REPLY --}}
            @if($chat->status !== 'CLOSED')

                <div class="border-t
                            border-gray-200
                            p-5 md:p-6">

                    <form
                        action="{{ route('admin.chat.reply', $chat) }}"
                        method="POST">

                        @csrf

                        <label
                            for="pesan"
                            class="block text-sm
                                   font-semibold
                                   text-[#173528] mb-2">

                            Balas Customer

                        </label>

                        <textarea
                            id="pesan"
                            name="pesan"
                            rows="4"
                            maxlength="2000"
                            required
                            placeholder="Tulis balasan kepada customer..."
                            class="w-full rounded-2xl
                                   border border-gray-200
                                   px-5 py-4
                                   text-sm
                                   text-[#173528]
                                   resize-none
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-[#173528]/20
                                   focus:border-[#173528]"
                        ></textarea>

                        <div class="mt-4 flex
                                    justify-end">

                            <button
                                type="submit"
                                class="px-6 py-3
                                       rounded-full
                                       bg-[#173528]
                                       text-white
                                       font-semibold
                                       text-sm
                                       hover:bg-[#10291E]
                                       transition">

                                Kirim Balasan

                            </button>

                        </div>

                    </form>

                </div>

            @else

                <div class="border-t
                            border-gray-200
                            bg-gray-50
                            px-6 py-5
                            text-center">

                    <p class="text-sm text-gray-500">

                        Chat ini sudah ditutup.
                        Buka kembali chat untuk mengirim balasan.

                    </p>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection