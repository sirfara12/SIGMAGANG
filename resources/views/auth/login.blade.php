<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGMAGANG - Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white">
    <!-- Header -->
    <header class="w-full bg-white border-b border-gray-200 shadow-sm">
        <div class="container mx-auto px-4 py-3 flex items-center">
            <!-- Logo -->
            <div class="flex items-center mr-12">
                <img src="{{ asset('img/logo/sigmagang.png') }}" alt="Logo" class="h-8 w-25">
            </div>
            <!-- Navigasi -->
            <nav class="flex space-x-10 text-gray-500 font-medium">
                <a href="#" class="hover:text-blue-600">Beranda</a>
                <a href="#" class="hover:text-blue-600">Fitur</a>
                <a href="#" class="hover:text-blue-600">Panduan</a>
            </nav>
        </div>
    </header>

    <!-- Konten -->
    <div class="w-full min-h-screen bg-white flex px-12 py-10">
        <!-- Kiri: Form Login -->
        <div class="w-full md:w-2/5 flex items-center justify-center">
            <div class="w-full max-w-md p-8 border rounded-lg shadow-sm">
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Masuk</h2>
                    <p class="text-sm text-gray-500">
                        Jangan tunggu nanti, daftar magang sekarang dan tunjukkan potensimu di perusahaan besar!
                    </p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email / Username -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                        @error('email')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-2">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Kata sandi</label>
                        <div class="relative">
                            <input type="password" name="password" id="password" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                            <svg class="h-5 w-5 text-gray-400 absolute right-3 top-2.5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 
                                      9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 
                                      0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        @error('password')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Ingat Saya & Lupa Password -->
                    <div class="flex items-center justify-between mt-4 mb-6">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" name="remember"
                                   class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                                Lupa password
                            </a>
                        @endif
                    </div>

                    <!-- Tombol -->
                    <div class="space-y-3">
                        <button type="submit"
                                class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-md font-medium transition">
                            MASUK
                        </button>

                        <a href="{{ route('register') }}"
                           class="block w-full text-center text-blue-600 border border-blue-500 py-2 rounded-md hover:bg-blue-50 transition font-medium">
                            Daftar
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Kanan: Logo Perusahaan -->
        <div class="w-full md:w-1/2 grid grid-cols-3 gap-y-2 place-items-center px-6">
            @foreach ([
                'mandiri', 'bni', 'btn',
                'bri', 'telkom', 'krakatau',
                'bappenas', 'inka', 'perumnas',
                'kai', 'pln', 'pertamina'
            ] as $logo)
                <div class="flex items-center justify-center py-2">
                    <img src="{{ asset('img/logo/' . $logo . '.png') }}" alt="{{ $logo }}" class="h-24 w-auto object-contain" />
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
