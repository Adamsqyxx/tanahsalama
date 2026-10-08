@extends('layouts.app')

@section('title', 'Kelola Petak - Admin Tanah Salama')

@section('content')

<div class="min-h-screen bg-[#F7F5EF] pt-28 pb-16">

    <div class="max-w-7xl mx-auto px-5 sm:px-8">

        {{-- HEADER --}}
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-5 mb-8">

            <div>

                <p class="text-xs uppercase tracking-[0.25em] text-[#A0834E] font-semibold mb-2">
                    Admin Tanah Salama
                </p>

                <h1 class="font-serif text-3xl sm:text-4xl text-[#173528]">
                    Kelola Petak Makam
                </h1>

                <p class="text-gray-600 mt-2">
                    Kelola kode petak, kategori, jenis lahan, status, dan informasi makam.
                </p>

            </div>

            <a
                href="{{ route('admin.plots.create') }}"
                class="inline-flex items-center justify-center
                       px-6 py-3 rounded-full
                       bg-[#173528] text-white
                       font-semibold
                       hover:bg-[#244D3C]
                       transition"
            >
                + Tambah Petak
            </a>

        </div>


        {{-- ALERT SUCCESS --}}
        @if(session('success'))

            <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-green-800">
                {{ session('success') }}
            </div>

        @endif


        {{-- ALERT ERROR --}}
        @if(session('error'))

            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-red-800">
                {{ session('error') }}
            </div>

        @endif


        {{-- TABLE --}}
        <div class="bg-white rounded-3xl shadow-sm border border-gray-200 overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full text-sm">

                    <thead class="bg-[#173528] text-white">

                        <tr>

                            <th class="px-5 py-4 text-left font-semibold">
                                No
                            </th>

                            <th class="px-5 py-4 text-left font-semibold">
                                Kode Petak
                            </th>

                            <th class="px-5 py-4 text-left font-semibold">
                                Kategori
                            </th>

                            <th class="px-5 py-4 text-left font-semibold">
                                Jenis Lahan
                            </th>

                            <th class="px-5 py-4 text-left font-semibold">
                                Harga Cash / Lunas
                            </th>

                            <th class="px-5 py-4 text-left font-semibold">
                                Status
                            </th>

                            <th class="px-5 py-4 text-right font-semibold">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse($plots as $plot)

                            <tr class="hover:bg-gray-50 transition">

                                {{-- NO --}}
                                <td class="px-5 py-4 text-gray-500">
                                    {{ $plots->firstItem() + $loop->index }}
                                </td>


                                {{-- KODE PETAK --}}
                                <td class="px-5 py-4">

                                    <div class="font-semibold text-[#173528]">
                                        {{ $plot->kode_plot }}
                                    </div>

                                </td>


                                {{-- KATEGORI --}}
                                <td class="px-5 py-4 text-gray-700">

                                    {{ $plot->category->nama_kategori ?? '-' }}

                                </td>


                                {{-- JENIS LAHAN --}}
                                <td class="px-5 py-4 text-gray-700">

                                    {{ $plot->jenis_lahan ?? '-' }}

                                </td>


                                {{-- HARGA CASH / LUNAS DARI KATEGORI --}}
                                <td class="px-5 py-4 font-semibold text-[#173528]">

                                    Rp
                                    {{ number_format(
                                        $plot->category->harga_cash ?? 0,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </td>


                                {{-- STATUS --}}
                                <td class="px-5 py-4">

                                    @if($plot->status === 'AVAILABLE')

                                        <span
                                            class="inline-flex px-3 py-1 rounded-full
                                                   bg-green-100 text-green-700
                                                   text-xs font-semibold"
                                        >
                                            AVAILABLE
                                        </span>

                                    @elseif($plot->status === 'BOOKED')

                                        <span
                                            class="inline-flex px-3 py-1 rounded-full
                                                   bg-yellow-100 text-yellow-700
                                                   text-xs font-semibold"
                                        >
                                            BOOKED
                                        </span>

                                    @else

                                        <span
                                            class="inline-flex px-3 py-1 rounded-full
                                                   bg-red-100 text-red-700
                                                   text-xs font-semibold"
                                        >
                                            OCCUPIED
                                        </span>

                                    @endif

                                </td>


                                {{-- AKSI --}}
                                <td class="px-5 py-4">

                                    <div class="flex justify-end gap-2">

                                        {{-- EDIT --}}
                                        <a
                                            href="{{ route('admin.plots.edit', $plot) }}"
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
                                        @if($plot->status === 'AVAILABLE')

                                            <form
                                                action="{{ route('admin.plots.destroy', $plot) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus petak ini?')"
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

                                        @endif

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="px-5 py-12 text-center">

                                    <div class="text-gray-400 mb-2">
                                        Belum ada petak makam.
                                    </div>

                                    <a
                                        href="{{ route('admin.plots.create') }}"
                                        class="text-[#A0834E] font-semibold hover:underline"
                                    >
                                        Tambahkan petak pertama
                                    </a>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- PAGINATION --}}
            @if($plots->hasPages())

                <div class="px-5 py-5 border-t border-gray-100">

                    {{ $plots->links() }}

                </div>

            @endif

        </div>

    </div>

</div>

@endsection