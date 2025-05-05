<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGMAGANG - Register</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white">
    <!-- Header -->
    <header class="w-full bg-white border-b border-gray-200 shadow-sm">
        <div class="container mx-auto px-4 py-3 flex items-center">
            <div class="flex items-center mr-12">
                <img src="{{ asset('img/logo/sigmagang.png') }}" alt="Logo" class="h-8 w-25">
            </div>
            <nav class="flex space-x-10 text-gray-500 font-medium">
                <a href="#" class="hover:text-blue-600">Beranda</a>
                <a href="#" class="hover:text-blue-600">Fitur</a>
                <a href="#" class="hover:text-blue-600">Panduan</a>
            </nav>
        </div>
    </header>

    <!-- Konten utama -->
    <div class="w-full min-h-screen bg-white flex px-12 py-10">
        <!-- Kiri: Form Register -->
        <div class="w-full md:w-2/5 flex items-center justify-center">
            <div class="w-full max-w-md p-8 border rounded-lg shadow-sm">
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Daftar Akun</h2>
                    <p class="text-sm text-gray-500">Lengkapi data untuk mulai mendaftar magang.</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Username -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                        <input id="name" name="name" type="text" placeholder="Masukkan username"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"
                            value="{{ old('name') }}" required autofocus autocomplete="name" />
                        @error('name')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input id="email" name="email" type="email" placeholder="Masukkan email"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"
                            value="{{ old('email') }}" required autocomplete="username" />
                        @error('email')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Kata sandi</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" placeholder="Masukkan kata sandi"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"
                                required autocomplete="new-password" />
                            <svg id="togglePassword" class="h-5 w-5 text-gray-400 absolute right-3 top-2.5 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        @error('password')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi kata sandi</label>
                        <div class="relative">
                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi kata sandi"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"
                                required autocomplete="new-password" />
                            <svg id="toggleConfirmPassword" class="h-5 w-5 text-gray-400 absolute right-3 top-2.5 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        @error('password_confirmation')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tombol -->
                    <div class="space-y-3">
                        <x-primary-button class="block w-full text-center bg-blue-500 hover:bg-blue-600 text-white border border-blue-500 py-2 px-4 rounded-md font-medium transition justify-center text-center">
                            {{ __('Register') }}
                        </x-primary-button>

                        <a href="{{ route('login') }}" class="block w-full text-center text-blue-600 border border-blue-500 py-2 rounded-md hover:bg-blue-50 transition font-medium">
                            Sudah punya akun? Masuk
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

    <!-- Script toggle password -->
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('text-blue-500');
        });

        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const confirmPassword = document.getElementById('password_confirmation');

        toggleConfirmPassword.addEventListener('click', function () {
            const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPassword.setAttribute('type', type);
            this.classList.toggle('text-blue-500');
        });
    </script>
</body>
</html>
