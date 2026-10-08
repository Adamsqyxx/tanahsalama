@extends('layouts.app')

@section('title', 'Pengaturan Akun')

@section('content')

<div class="min-h-screen bg-[#f5f3ed] py-10">

    <div class="max-w-4xl mx-auto px-5 sm:px-8">

        {{-- HEADER --}}
        <div class="mb-8">

            <a href="{{ route('admin.dashboard') }}"
               class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-gray-900 transition mb-6">

                <svg class="w-4 h-4"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M15 19l-7-7 7-7"/>

                </svg>

                Kembali ke Dashboard

            </a>

            <p class="text-xs font-semibold tracking-[0.25em] uppercase text-emerald-700">
                Administrator
            </p>

            <h1 class="mt-2 text-4xl font-semibold tracking-tight text-[#123b2d]">
                Pengaturan Akun
            </h1>

            <p class="mt-3 text-gray-500">
                Kelola keamanan akun administrator Tanah Salama.
            </p>

        </div>


        {{-- SUCCESS --}}
        @if(session('success'))

            <div class="mb-6 rounded-2xl border border-emerald-200
                        bg-emerald-50 px-5 py-4">

                <div class="flex items-start gap-3">

                    <svg class="w-6 h-6 text-emerald-600 flex-shrink-0"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M5 13l4 4L19 7"/>

                    </svg>

                    <div>

                        <p class="font-semibold text-emerald-800">
                            Berhasil
                        </p>

                        <p class="text-sm text-emerald-700 mt-1">
                            {{ session('success') }}
                        </p>

                    </div>

                </div>

            </div>

        @endif


        {{-- ERROR --}}
        @if($errors->any())

            <div class="mb-6 rounded-2xl border border-red-200
                        bg-red-50 px-5 py-4">

                <p class="font-semibold text-red-800">
                    Periksa kembali data Anda
                </p>

                <ul class="mt-2 text-sm text-red-700 space-y-1">

                    @foreach($errors->all() as $error)

                        <li>
                            • {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- ACCOUNT INFO --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">


            {{-- SIDEBAR INFO --}}
            <div class="lg:col-span-1">

                <div class="rounded-3xl bg-[#123b2d] p-7 text-white">

                    <div class="w-14 h-14 rounded-2xl
                                bg-white/10 flex items-center justify-center
                                text-lg font-semibold mb-6">

                        TS

                    </div>

                    <p class="text-xs uppercase tracking-[0.2em]
                              text-emerald-300">

                        Administrator

                    </p>

                    <h2 class="mt-2 text-2xl font-semibold">

                        {{ $admin->name ?? 'Administrator' }}

                    </h2>

                    <p class="mt-2 text-sm text-white/60 break-all">

                        {{ $admin->email ?? '-' }}

                    </p>


                    <div class="mt-8 pt-6 border-t border-white/10">

                        <p class="text-xs text-white/50">
                            Keamanan Akun
                        </p>

                        <p class="mt-2 text-sm text-emerald-300">
                            Akun administrator aktif
                        </p>

                    </div>

                </div>

            </div>


            {{-- FORM --}}
            <div class="lg:col-span-2">

                <div class="rounded-3xl bg-white border border-gray-200
                            shadow-sm overflow-hidden">

                    {{-- FORM HEADER --}}
                    <div class="px-7 py-6 border-b border-gray-100">

                        <div class="flex items-center gap-4">

                            <div class="w-11 h-11 rounded-xl
                                        bg-emerald-50
                                        flex items-center justify-center">

                                <svg class="w-5 h-5 text-emerald-700"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>

                                </svg>

                            </div>

                            <div>

                                <h2 class="font-semibold text-gray-900">
                                    Ubah Kata Sandi
                                </h2>

                                <p class="text-sm text-gray-500 mt-1">
                                    Perbarui kata sandi administrator Anda.
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- FORM BODY --}}
                    <form action="{{ route('admin.account.password.update') }}"
                          method="POST"
                          class="p-7 space-y-6">

                        @csrf
                        @method('PUT')


                        {{-- CURRENT PASSWORD --}}
                        <div>

                            <label for="current_password"
                                   class="block text-sm font-semibold text-gray-700 mb-2">

                                Kata Sandi Saat Ini

                            </label>

                            <input
                                type="password"
                                name="current_password"
                                id="current_password"
                                required
                                autocomplete="current-password"
                                class="w-full rounded-xl border border-gray-200
                                       bg-gray-50 px-4 py-3
                                       text-gray-900
                                       outline-none
                                       transition
                                       focus:border-emerald-600
                                       focus:ring-2
                                       focus:ring-emerald-100"
                                placeholder="Masukkan kata sandi saat ini">

                        </div>


                        {{-- NEW PASSWORD --}}
                        <div>

                            <label for="password"
                                   class="block text-sm font-semibold text-gray-700 mb-2">

                                Kata Sandi Baru

                            </label>

                            <input
                                type="password"
                                name="password"
                                id="password"
                                required
                                minlength="8"
                                autocomplete="new-password"
                                class="w-full rounded-xl border border-gray-200
                                       bg-gray-50 px-4 py-3
                                       text-gray-900
                                       outline-none
                                       transition
                                       focus:border-emerald-600
                                       focus:ring-2
                                       focus:ring-emerald-100"
                                placeholder="Minimal 8 karakter">

                            <p class="mt-2 text-xs text-gray-500">
                                Gunakan minimal 8 karakter.
                            </p>

                        </div>


                        {{-- CONFIRM PASSWORD --}}
                        <div>

                            <label for="password_confirmation"
                                   class="block text-sm font-semibold text-gray-700 mb-2">

                                Konfirmasi Kata Sandi Baru

                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                id="password_confirmation"
                                required
                                minlength="8"
                                autocomplete="new-password"
                                class="w-full rounded-xl border border-gray-200
                                       bg-gray-50 px-4 py-3
                                       text-gray-900
                                       outline-none
                                       transition
                                       focus:border-emerald-600
                                       focus:ring-2
                                       focus:ring-emerald-100"
                                placeholder="Ulangi kata sandi baru">

                        </div>


                        {{-- ACTION --}}
                        <div class="pt-4 border-t border-gray-100
                                    flex flex-col sm:flex-row
                                    sm:items-center
                                    sm:justify-end
                                    gap-3">

                            <a href="{{ route('admin.dashboard') }}"
                               class="inline-flex items-center justify-center
                                      rounded-xl border border-gray-200
                                      px-5 py-3 text-sm font-semibold
                                      text-gray-600
                                      hover:bg-gray-50 transition">

                                Batal

                            </a>

                            <button
                                type="submit"
                                class="inline-flex items-center justify-center
                                       gap-2 rounded-xl
                                       bg-[#123b2d]
                                       px-6 py-3
                                       text-sm font-semibold
                                       text-white
                                       hover:bg-[#0d3024]
                                       transition">

                                <svg class="w-4 h-4"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M5 13l4 4L19 7"/>

                                </svg>

                                Simpan Kata Sandi

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection