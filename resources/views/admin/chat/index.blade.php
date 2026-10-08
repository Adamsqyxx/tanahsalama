@extends('layouts.app')

@section('title', 'Chat Admin - Tanah Salama')

@section('content')

<div class="min-h-screen bg-[#F7F5EF] p-6 md:p-8">

    <div class="max-w-7xl mx-auto">

        {{-- HEADER --}}
        <div class="flex flex-col md:flex-row
                    md:items-center md:justify-between
                    gap-5 mb-8">

            <div>

                <p class="text-[10px] uppercase
                          tracking-[0.25em]
                          text-[#C8A96B]
                          font-semibold">

                    Pengelolaan

                </p>

                <h1 class="mt-2 text-3xl
                           font-serif text-[#173528]">

                    Chat Admin

                </h1>

                <p class="mt-2 text-sm text-gray-500">

                    Kelola percakapan dan balas pertanyaan customer.

                </p>

            </div>

        </div>


        {{-- ALERT --}}
        @if(session('success'))

            <div class="mb-6 rounded-2xl
                        border border-green-200
                        bg-green-50
                        px-5 py-4
                        text-sm text-green-700">

                {{ session('success') }}

            </div>

        @endif


        {{-- FILTER --}}
        <div class="bg-white rounded-3xl
                    border border-gray-200
                    p-5 md:p-6 mb-6">

            <form method="GET"
                  action="{{ route('admin.chat.index') }}"
                  class="grid md:grid-cols-3 gap-4">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama, nomor HP, kode chat..."
                    class="rounded-2xl
                           border border-gray-200
                           px-5 py-3
                           text-sm
                           focus:outline-none
                           focus:ring-2
                           focus:ring-[#173528]/20"
                >

                <select
                    name="status"
                    class="rounded-2xl
                           border border-gray-200
                           px-5 py-3
                           text-sm
                           focus:outline-none
                           focus:ring-2
                           focus:ring-[#173528]/20">

                    <option value="">
                        Semua Status
                    </option>

                    <option value="WAITING"
                        {{ request('status') === 'WAITING' ? 'selected' : '' }}>
                        Menunggu Admin
                    </option>

                    <option value="ANSWERED"
                        {{ request('status') === 'ANSWERED' ? 'selected' : '' }}>
                        Sudah Dibalas
                    </option>

                    <option value="OPEN"
                        {{ request('status') === 'OPEN' ? 'selected' : '' }}>
                        Terbuka
                    </option>

                    <option value="CLOSED"
                        {{ request('status') === 'CLOSED' ? 'selected' : '' }}>
                        Ditutup
                    </option>

                </select>

                <button
                    type="submit"
                    class="rounded-2xl
                           bg-[#173528]
                           text-white
                           font-semibold
                           hover:bg-[#10291E]
                           transition">

                    Cari Percakapan

                </button>

            </form>

        </div>


        {{-- TABLE --}}
        <div class="bg-white rounded-3xl
                    border border-gray-200
                    overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full text-sm">

                    <thead class="bg-[#F7F5EF]
                                  border-b border-gray-200">

                        <tr>

                            <th class="text-left
                                       px-6 py-4
                                       font-semibold
                                       text-[#173528]">

                                Customer

                            </th>

                            <th class="text-left
                                       px-6 py-4
                                       font-semibold
                                       text-[#173528]">

                                Kode Chat

                            </th>

                            <th class="text-left
                                       px-6 py-4
                                       font-semibold
                                       text-[#173528]">

                                Status

                            </th>

                            <th class="text-left
                                       px-6 py-4
                                       font-semibold
                                       text-[#173528]">

                                Pesan Terakhir

                            </th>

                            <th class="text-right
                                       px-6 py-4
                                       font-semibold
                                       text-[#173528]">

                                Aksi

                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @forelse($chats as $chat)

                            <tr class="hover:bg-gray-50
                                       transition">

                                <td class="px-6 py-5">

                                    <p class="font-semibold
                                              text-[#173528]">

                                        {{ $chat->nama_customer }}

                                    </p>

                                    <p class="mt-1 text-xs
                                              text-gray-500">

                                        {{ $chat->no_hp }}

                                    </p>

                                </td>


                                <td class="px-6 py-5">

                                    <span class="font-mono
                                                 text-xs
                                                 text-gray-600">

                                        {{ $chat->kode_chat }}

                                    </span>

                                </td>


                                <td class="px-6 py-5">

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


                                    @if($chat->pesan_baru_count > 0)

                                        <span class="ml-2 inline-flex
                                                     min-w-6 h-6
                                                     items-center
                                                     justify-center
                                                     rounded-full
                                                     bg-red-600
                                                     text-white
                                                     text-[10px]
                                                     font-bold">

                                            {{ $chat->pesan_baru_count }}

                                        </span>

                                    @endif

                                </td>


                                <td class="px-6 py-5">

                                    @if($chat->last_message_at)

                                        <p class="text-sm text-gray-600">

                                            {{ $chat->last_message_at->format('d M Y') }}

                                        </p>

                                        <p class="mt-1 text-xs
                                                  text-gray-400">

                                            {{ $chat->last_message_at->format('H:i') }}

                                        </p>

                                    @else

                                        <span class="text-gray-400">
                                            -
                                        </span>

                                    @endif

                                </td>


                                <td class="px-6 py-5 text-right">

                                    <a
                                        href="{{ route('admin.chat.show', $chat) }}"
                                        class="inline-flex
                                               items-center
                                               px-4 py-2
                                               rounded-full
                                               bg-[#173528]
                                               text-white
                                               text-xs
                                               font-semibold
                                               hover:bg-[#10291E]
                                               transition">

                                        Buka Chat

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5"
                                    class="px-6 py-14
                                           text-center">

                                    <p class="text-gray-400
                                              text-sm">

                                        Belum ada percakapan.

                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            @if($chats->hasPages())

                <div class="border-t border-gray-200
                            px-6 py-5">

                    {{ $chats->links() }}

                </div>

            @endif

        </div>

    </div>

</div>

@endsection