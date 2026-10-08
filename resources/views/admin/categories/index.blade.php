@extends('layouts.app')

@section('title', 'Kelola Kategori - Admin Tanah Salama')

@section('content')

<div class="min-h-screen bg-[#F7F5EF] pt-28 pb-16">

    <div class="max-w-6xl mx-auto px-5 sm:px-8">

        {{-- HEADER --}}
        <div class="flex flex-col md:flex-row
                    md:items-end md:justify-between
                    gap-5 mb-8">

            <div>

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="inline-flex items-center gap-2
                           text-sm text-[#A0834E]
                           hover:text-[#173528]
                           transition mb-5"
                >
                    ← Kembali ke Dashboard
                </a>

                <p class="text-xs uppercase tracking-[0.25em]
                          text-[#A0834E] font-semibold mb-2">
                    Admin Tanah Salama
                </p>

                <h1 class="font-serif text-3xl sm:text-4xl
                           text-[#173528]">
                    Kelola Kategori
                </h1>

                <p class="text-gray-600 mt-2">
                    Atur kategori petak, harga cash/lunas, dan informasi kategori.
                </p>

            </div>

            <a
                href="{{ route('admin.categories.create') }}"
                class="inline-flex items-center justify-center
                       px-6 py-3 rounded-full
                       bg-[#173528] text-white
                       font-semibold
                       hover:bg-[#244D3C]
                       transition"
            >
                + Tambah Kategori
            </a>

        </div>


        {{-- SUCCESS --}}
        @if(session('success'))

            <div class="mb-6 rounded-2xl
                        border border-green-200
                        bg-green-50
                        px-5 py-4
                        text-green-800">

                {{ session('success') }}

            </div>

        @endif


        {{-- ERROR --}}
        @if(session('error'))

            <div class="mb-6 rounded-2xl
                        border border-red-200
                        bg-red-50
                        px-5 py-4
                        text-red-800">

                {{ session('error') }}

            </div>

        @endif


        {{-- TABLE --}}
        <div class="bg-white rounded-3xl
                    border border-gray-200
                    shadow-sm overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full text-sm">

                    <thead class="bg-[#173528] text-white">

                        <tr>

                            <th class="px-5 py-4 text-left">
                                No
                            </th>

                            <th class="px-5 py-4 text-left">
                                Kategori
                            </th>

                            <th class="px-5 py-4 text-left">
                                Harga Cash / Lunas
                            </th>

                            <th class="px-5 py-4 text-left">
                                Jumlah Petak
                            </th>

                            <th class="px-5 py-4 text-left">
                                Deskripsi
                            </th>

                            <th class="px-5 py-4 text-right">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @forelse($categories as $category)

                            <tr class="hover:bg-gray-50 transition">

                                {{-- NO --}}
                                <td class="px-5 py-5 text-gray-500">

                                    {{ $categories->firstItem() + $loop->index }}

                                </td>


                                {{-- KATEGORI --}}
                                <td class="px-5 py-5">

                                    <p class="font-semibold
                                              text-[#173528]">

                                        {{ $category->nama_kategori }}

                                    </p>

                                </td>


                                {{-- HARGA CASH / LUNAS --}}
                                <td class="px-5 py-5">

                                    <span class="font-semibold
                                                 text-[#173528]">

                                        Rp {{ number_format($category->harga_cash ?? 0, 0, ',', '.') }}

                                    </span>

                                </td>


                                {{-- JUMLAH PETAK --}}
                                <td class="px-5 py-5">

                                    <span class="inline-flex
                                                 px-3 py-1 rounded-full
                                                 bg-gray-100
                                                 text-gray-700
                                                 text-xs font-semibold">

                                        {{ $category->plots_count }} petak

                                    </span>

                                </td>


                                {{-- DESKRIPSI --}}
                                <td class="px-5 py-5 max-w-xs">

                                    @if($category->deskripsi)

                                        <p class="text-gray-600 line-clamp-2">

                                            {{ $category->deskripsi }}

                                        </p>

                                    @else

                                        <span class="text-gray-400">

                                            Belum ada deskripsi

                                        </span>

                                    @endif

                                </td>


                                {{-- AKSI --}}
                                <td class="px-5 py-5">

                                    <div class="flex justify-end gap-2">

                                        {{-- EDIT --}}
                                        <a
                                            href="{{ route('admin.categories.edit', $category) }}"
                                            class="px-4 py-2 rounded-full
                                                   border border-[#C8A96B]
                                                   text-[#A0834E]
                                                   text-xs font-semibold
                                                   hover:bg-[#C8A96B]
                                                   hover:text-white
                                                   transition"
                                        >
                                            Edit
                                        </a>


                                        {{-- HAPUS --}}
                                        @if($category->plots_count === 0)

                                            <form
                                                action="{{ route('admin.categories.destroy', $category) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus kategori ini?')"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="px-4 py-2 rounded-full
                                                           border border-red-200
                                                           text-red-600
                                                           text-xs font-semibold
                                                           hover:bg-red-50
                                                           transition"
                                                >
                                                    Hapus
                                                </button>

                                            </form>

                                        @else

                                            <span
                                                class="px-4 py-2 rounded-full
                                                       bg-gray-100
                                                       text-gray-400
                                                       text-xs"
                                                title="Kategori masih digunakan oleh petak"
                                            >
                                                Digunakan
                                            </span>

                                        @endif

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="6"
                                    class="px-5 py-12 text-center"
                                >

                                    <p class="text-gray-400 mb-3">

                                        Belum ada kategori petak.

                                    </p>

                                    <a
                                        href="{{ route('admin.categories.create') }}"
                                        class="text-[#A0834E]
                                               font-semibold
                                               hover:underline"
                                    >
                                        Tambahkan kategori pertama
                                    </a>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- PAGINATION --}}
            @if($categories->hasPages())

                <div class="px-5 py-5
                            border-t border-gray-100">

                    {{ $categories->links() }}

                </div>

            @endif

        </div>

    </div>

</div>

@endsection