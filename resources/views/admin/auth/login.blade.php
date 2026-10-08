<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Administrator - Tanah Salama</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="min-h-screen bg-[#F4F1E9]">


<div class="min-h-screen
            grid
            lg:grid-cols-2">


    {{-- =====================================================
        LEFT SIDE
    ====================================================== --}}
    <div class="hidden lg:flex
                relative
                overflow-hidden
                bg-[#334336]
                min-h-screen
                p-12
                xl:p-16
                flex-col
                justify-between">


        {{-- Decorative circles --}}
        <div class="absolute
                    -right-40
                    -top-40
                    w-[500px]
                    h-[500px]
                    rounded-full
                    border
                    border-white/10">
        </div>


        <div class="absolute
                    -left-32
                    -bottom-32
                    w-[400px]
                    h-[400px]
                    rounded-full
                    border
                    border-white/10">
        </div>


        {{-- Abstract landscape --}}
        <div class="absolute
                    bottom-0
                    left-0
                    right-0
                    h-[38%]
                    opacity-30">

            <div class="absolute
                        bottom-[-45%]
                        left-[-10%]
                        w-[120%]
                        h-[100%]
                        rounded-[50%]
                        bg-[#71816B]">
            </div>

            <div class="absolute
                        bottom-[-60%]
                        left-[20%]
                        w-[100%]
                        h-[100%]
                        rounded-[50%]
                        bg-[#91A38A]">
            </div>

        </div>


        {{-- BRAND --}}
        <div class="relative z-10">

            <a href="{{ url('/') }}"
               class="inline-flex
                      items-center
                      gap-3">

                <div class="w-11 h-11
                            rounded-full
                            border
                            border-white/30
                            flex
                            items-center
                            justify-center">

                    <span class="text-xs
                                 font-semibold
                                 text-white">
                        TS
                    </span>

                </div>


                <div>

                    <p class="text-white
                              font-semibold
                              text-lg
                              tracking-[-0.02em]">
                        Tanah Salama
                    </p>

                    <p class="text-white/40
                              text-[8px]
                              uppercase
                              tracking-[0.25em]">
                        Memorial Estate
                    </p>

                </div>

            </a>

        </div>



        {{-- CENTER MESSAGE --}}
        <div class="relative z-10
                    max-w-lg
                    pb-20">

            <p class="text-[#C8D2C2]
                      text-[10px]
                      uppercase
                      tracking-[0.3em]">
                Administrator Portal
            </p>


            <h1 class="mt-6
                       text-white
                       text-5xl
                       xl:text-6xl
                       font-medium
                       leading-[1.05]
                       tracking-[-0.04em]">

                Kelola Tanah Salama
                dengan lebih teratur.

            </h1>


            <p class="mt-7
                      text-white/50
                      leading-8
                      max-w-md">

                Kelola petak makam, booking,
                pembayaran, kategori, dan layanan
                Tanah Salama melalui satu ruang kerja.

            </p>


            <div class="mt-10
                        flex
                        items-center
                        gap-3">

                <span class="w-2 h-2
                             rounded-full
                             bg-[#A9B7A2]">
                </span>

                <span class="text-white/40
                             text-xs">
                    Sistem Administrasi Tanah Salama
                </span>

            </div>

        </div>



        {{-- FOOTER --}}
        <div class="relative z-10">

            <p class="text-white/25
                      text-[10px]">
                © {{ date('Y') }} Tanah Salama
            </p>

        </div>

    </div>



    {{-- =====================================================
        RIGHT SIDE
    ====================================================== --}}
    <div class="min-h-screen
                flex
                items-center
                justify-center
                px-6
                py-12
                bg-[#F8F7F3]">


        <div class="w-full
                    max-w-md">


            {{-- MOBILE BRAND --}}
            <div class="lg:hidden
                        mb-12">

                <a href="{{ url('/') }}"
                   class="inline-flex
                          items-center
                          gap-3">

                    <div class="w-11 h-11
                                rounded-full
                                border
                                border-[#9DAA98]
                                flex
                                items-center
                                justify-center">

                        <span class="text-xs
                                     font-semibold
                                     text-[#52634F]">
                            TS
                        </span>

                    </div>


                    <div>

                        <p class="text-[#29352C]
                                  font-semibold
                                  text-lg">
                            Tanah Salama
                        </p>

                        <p class="text-[#929890]
                                  text-[8px]
                                  uppercase
                                  tracking-[0.25em]">
                            Memorial Estate
                        </p>

                    </div>

                </a>

            </div>



            {{-- LOGIN HEADING --}}
            <div>

                <p class="text-[#71816B]
                          text-[10px]
                          uppercase
                          tracking-[0.3em]">
                    Administrator
                </p>


                <h2 class="mt-4
                           text-[#29352C]
                           text-4xl
                           sm:text-5xl
                           font-medium
                           tracking-[-0.04em]">

                    Selamat datang.

                </h2>


                <p class="mt-4
                          text-[#7C827A]
                          text-sm
                          leading-7">

                    Masuk untuk mengakses
                    ruang administrasi Tanah Salama.

                </p>

            </div>



            {{-- ERROR --}}
            @if(session('error'))

                <div class="mt-8
                            rounded-2xl
                            border
                            border-red-200
                            bg-red-50
                            px-5
                            py-4">

                    <p class="text-sm
                              text-red-700">

                        {{ session('error') }}

                    </p>

                </div>

            @endif


            @if($errors->any())

                <div class="mt-8
                            rounded-2xl
                            border
                            border-red-200
                            bg-red-50
                            px-5
                            py-4">

                    <ul class="space-y-1">

                        @foreach($errors->all() as $error)

                            <li class="text-sm
                                       text-red-700">

                                {{ $error }}

                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif



            {{-- =================================================
                FORM
            ================================================== --}}
            <form action="{{ route('admin.login.process') }}"
                  method="POST"
                  class="mt-10">

                @csrf


                {{-- EMAIL --}}
                <div>

                    <label for="email"
                           class="block
                                  text-xs
                                  font-medium
                                  text-[#596359]
                                  mb-3">

                        Email Administrator

                    </label>


                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        placeholder="admin@gmail.com"
                        class="w-full
                               h-14
                               rounded-2xl
                               border
                               border-[#D7D8D0]
                               bg-white
                               px-5
                               text-sm
                               text-[#354335]
                               placeholder:text-[#B2B5AE]
                               outline-none
                               focus:border-[#71816B]
                               focus:ring-4
                               focus:ring-[#71816B]/10
                               transition">

                </div>



                {{-- PASSWORD --}}
                <div class="mt-6">

                    <div class="flex
                                items-center
                                justify-between
                                mb-3">

                        <label for="password"
                               class="text-xs
                                      font-medium
                                      text-[#596359]">

                            Password

                        </label>

                    </div>


                    <div class="relative">

                        <input
                            type="password"
                            id="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Masukkan password"
                            class="w-full
                                   h-14
                                   rounded-2xl
                                   border
                                   border-[#D7D8D0]
                                   bg-white
                                   px-5
                                   pr-14
                                   text-sm
                                   text-[#354335]
                                   placeholder:text-[#B2B5AE]
                                   outline-none
                                   focus:border-[#71816B]
                                   focus:ring-4
                                   focus:ring-[#71816B]/10
                                   transition">


                        {{-- SHOW PASSWORD --}}
                        <button
                            type="button"
                            id="togglePassword"
                            class="absolute
                                   right-4
                                   top-1/2
                                   -translate-y-1/2
                                   w-9
                                   h-9
                                   rounded-full
                                   text-[#929890]
                                   hover:bg-[#EEF1EB]
                                   hover:text-[#52634F]
                                   transition">

                            <svg id="eyeOpen"
                                 xmlns="http://www.w3.org/2000/svg"
                                 class="w-5 h-5 mx-auto"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.5">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M2.25 12s3.75-6 9.75-6 9.75 6 9.75 6-3.75 6-9.75 6-9.75-6-9.75-6z"/>

                                <circle cx="12"
                                        cy="12"
                                        r="2.5"/>

                            </svg>


                            <svg id="eyeClosed"
                                 xmlns="http://www.w3.org/2000/svg"
                                 class="w-5 h-5 mx-auto hidden"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.5">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M3 3l18 18M10.6 10.6a2 2 0 102.8 2.8M9.9 5.2A10.8 10.8 0 0112 5c6 0 9.75 7 9.75 7a18.4 18.4 0 01-3.2 3.9M6.2 6.2C3.9 8.1 2.25 12 2.25 12S6 19 12 19c1.4 0 2.7-.3 3.8-.8"/>

                            </svg>

                        </button>

                    </div>

                </div>



                {{-- SUBMIT --}}
                <button
                    type="submit"
                    class="mt-8
                           w-full
                           h-14
                           rounded-full
                           bg-[#334336]
                           text-white
                           text-sm
                           font-medium
                           flex
                           items-center
                           justify-center
                           gap-3
                           hover:bg-[#26352A]
                           active:scale-[0.99]
                           transition">

                    Masuk ke Dashboard

                    <span class="text-white/60">
                        →
                    </span>

                </button>

            </form>



            {{-- BACK --}}
            <div class="mt-8
                        text-center">

                <a href="{{ url('/') }}"
                   class="inline-flex
                          items-center
                          gap-2
                          text-xs
                          text-[#858C84]
                          hover:text-[#52634F]
                          transition">

                    <span>←</span>

                    Kembali ke Tanah Salama

                </a>

            </div>



            {{-- SECURITY NOTE --}}
            <div class="mt-12
                        pt-6
                        border-t
                        border-[#E2E2DA]">

                <div class="flex
                            items-start
                            gap-3">

                    <div class="w-7 h-7
                                shrink-0
                                rounded-full
                                bg-[#E9EEE5]
                                flex
                                items-center
                                justify-center">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-3.5 h-3.5 text-[#60725C]"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.5">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 15v2m-6 4h12a2 2 0 002-2V9a2 2 0 00-2-2H6a2 2 0 00-2 2v10a2 2 0 002 2z"/>

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M8 7V5a4 4 0 018 0v2"/>

                        </svg>

                    </div>


                    <p class="text-[10px]
                              leading-5
                              text-[#9A9F98]">

                        Halaman ini khusus untuk administrator
                        Tanah Salama. Jangan bagikan informasi
                        login kepada pihak lain.

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>



{{-- =====================================================
    PASSWORD SCRIPT
====================================================== --}}
<script>

document.addEventListener('DOMContentLoaded', function () {

    const password =
        document.getElementById('password');

    const toggle =
        document.getElementById('togglePassword');

    const eyeOpen =
        document.getElementById('eyeOpen');

    const eyeClosed =
        document.getElementById('eyeClosed');


    toggle.addEventListener('click', function () {

        if (password.type === 'password') {

            password.type = 'text';

            eyeOpen.classList.add('hidden');

            eyeClosed.classList.remove('hidden');

        } else {

            password.type = 'password';

            eyeOpen.classList.remove('hidden');

            eyeClosed.classList.add('hidden');

        }

    });

});

</script>

</body>

</html>