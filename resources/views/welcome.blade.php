<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sigmagang - Landing Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-800 bg-white">
    <!-- Navbar -->
    <nav class="flex justify-between items-center px-6 py-4 border border-gray-200 sticky top-0 z-50 bg-white">
        <div class="flex items-center gap-2">
            <img src="{{ asset('images/Logo-Sigmagang.png') }}" alt="logo" class="w-8 h-10 mr-0">
            <span class="text-[20px] font-bold text-orange-500 mr-12">SIGMAGANG</span>
            <div class="hidden md:flex gap-8 text-sm text-gray-400">
                <a href="#" class="text-blue-500 font-medium">Beranda</a>
                <a href="#">Fitur</a>
                <a href="#">Panduan</a>
            </div>
        </div>
        <div class="flex gap-3 text-sm">
            <button class="px-6 py-2 border border-blue-500 rounded-md text-blue-500 font-semibold hover:bg-blue-500 hover:text-white transition-all duration-300 ease-in-out" onclick="location.href='{{ url('login') }}'">Masuk</button>
            <button class="px-6 py-2 bg-blue-500 text-white rounded-md font-semibold hover:bg-blue-800  transition-all duration-300 ease-in-out" onclick="location.href='{{ url('register') }}'">Buat Akun</button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pl-6 pr-0 py-24 max-w-7xl mx-auto overflow-hidden ">

        <!-- Teks -->
        <div class="max-w-xl relative z-10">
            <h1 class="text-[50px] text-mirage-950 font-extrabold leading-snug">
                Temukan Magang <br>
                Sesuai Minat dan <br>
                <span class="text-blue-500">Keahlianmu!</span>
            </h1>
            <p class="text-gray-400 font-medium text-[18px] mt-4">
                Sistem Rekomendasi Magang untuk Mahasiswa <br>Jurusan Teknologi Informasi
            </p>
            <div class="flex gap-4 mt-6">
                <button class="bg-blue-500 text-white px-6 py-3 font-semibold rounded-md text-sm hover:bg-blue-800  transition-all duration-300 ease-in-out">Mulai
                    Sekarang</button>
                <button
                    class="border border-blue-300 text-blue-500 text-sm px-6 py-3 font-semibold rounded-md hover:bg-blue-500 hover:text-white transition-all duration-300 ease-in-out ">Pelajari
                    lebih lanjut</button>
            </div>
        </div>

        <!-- Gambar dan Badge -->
        <div class="absolute right-0 top-[47%] -translate-y-1/2 w-[60%] max-w-[600px]">
            <div class="relative">
                <img src="{{ asset('images/landing.png') }}" alt="Team" />

                {{-- <!-- Badge Mitra -->
                <div
                    class="absolute bottom-4 left-4 bg-white px-4 py-2 rounded-lg shadow flex items-center gap-2 text-sm">
                    <div class="text-orange-500 text-lg">🏫</div>
                    <div>
                        <p class="font-semibold">Mitra Kampus</p>
                        <p class="text-xs text-gray-500">500++</p>
                    </div>
                </div>

                <!-- Badge Lowongan -->
                <div
                    class="absolute bottom-0 right-2 bg-white px-4 py-2 rounded-lg shadow flex items-center gap-2 text-sm">
                    <div class="text-orange-500 text-lg">📋</div>
                    <div>
                        <p class="font-semibold">Lowongan tersedia</p>
                        <p class="text-xs text-gray-500">1000++</p>
                    </div>
                </div>
            </div> --}}
            </div>
    </section>

    <section class="py-16 bg-white">
          <!-- Baris Logo 1: Scroll ke kiri -->
          <div class="overflow-hidden mb-6">
            <div class="flex animate-scroll-left gap-16">
              <img src="{{ asset('images/logo/mandiri.png') }}" alt="Mandiri" class="h-10">
              <img src="{{ asset('images/logo/bni.png') }}" alt="BNI" class="h-10">
              <img src="{{ asset('images/logo/btn.png') }}" alt="BTN" class="h-10">
              <img src="{{ asset('images/logo/bri.png') }}" alt="BRI" class="h-10">
              <img src="{{ asset('images/logo/telkom.png') }}" alt="Telkom" class="h-10">
              <img src="{{ asset('images/logo/krakatau.png') }}" alt="Krakatau" class="h-10">
              <img src="{{ asset('images/logo/kai.png') }}" alt="KAI" class="h-32">
              <img src="{{ asset('images/logo/pln.png') }}" alt="PLN" class="h-32">
              <img src="{{ asset('images/logo/pertamina.png') }}" alt="Pertamina" class="h-32">
              <img src="{{ asset('images/logo/inka.png') }}" alt="INKA" class="h-32">
              <img src="{{ asset('images/logo/perumnas.png') }}" alt="Perumnas" class="h-32">
            </div>
          </div>
      
          <!-- Baris Logo 2: Scroll ke kanan -->
          <div class="overflow-hidden">
            <div class="flex animate-scroll-right gap-16">
              <img src="{{ asset('images/logo/kai.png') }}" alt="KAI" class="h-32">
              <img src="{{ asset('images/logo/pln.png') }}" alt="PLN" class="h-32">
              <img src="{{ asset('images/logo/pertamina.png') }}" alt="Pertamina" class="h-32">
              <img src="{{ asset('images/logo/inka.png') }}" alt="INKA" class="h-32">
              <img src="{{ asset('images/logo/perumnas.png') }}" alt="Perumnas" class="h-32">
            </div>
          </div>
      </section>


    <!-- Fitur -->
    <section class="px-6 py-16 bg-gray-50">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-[28px] font-bold">
                Cari Magang Sesuai Kompetensimu, <span class="text-orange-500">Tanpa Ribet</span>
            </h2>
            <p class="text-gray-500 text-[14px] mt-2 font-regular">
                Platform rekomendasi magang Polinema hadir untuk memudahkanmu menemukan tempat magang sesuai keahlian,
                minat, dan tujuan karirmu.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
            <div class="bg-white p-6 rounded-lg shadow text-center hover:border-2 border-blue-500">
                <img src="{{ asset('images/Rekomendasi.png') }}" alt="Otomatis" class="h-32 mx-auto mb-6">
                <h3 class="text-[20px] text-mirage-950 font-bold">Rekomendasi Magang Otomatis</h3>
                <p class="text-sm text-gray-500 mt-2">Sistem akan mencocokkan lowongan magang dengan profil mahasiswa
                    (kompetensi, lokasi, minat, keahlian).
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow text-center hover:border-2 border-blue-500">
                <img src="{{ asset('images/Logbook.png') }}" alt="Logbook" class="h-32 mx-auto mb-6">
                <h3 class="text-[20px] text-mirage-950 font-bold">Logbook & Evaluasi Magang</h3>
                <p class="text-sm text-gray-500 mt-2">Mahasiswa bisa mencatat kegiatan magang (harian/mingguan) dan
                    memberikan feedback setelah selesai.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow text-center hover:border-2 border-blue-500">
                <img src="{{ asset('images/Sertifikat.png') }}" alt="Sertifikat" class="h-32 mx-auto mb-6">
                <h3 class="text-[20px] text-mirage-950 font-bold">Unduh Sertifikat & Dokumen</h3>
                <p class="text-sm text-gray-500 mt-2">mahasiswa dapat mengunduh sertifikat dan dokumen penting terkait
                    kegiatan magang merekadengan mudah dan cepat.
                </p>
            </div>
        </div>
    </section><!-- Lowongan Terpopuler -->
    <section class="px-6 py-16">
        <div class="text-center mb-12">
            <h2 class="text-[28px] font-bold">Lowongan Magang <span class="text-orange-500">Terpopuler</span></h2>
            <p class="text-gray-600 text-sm mt-2">Beberapa lowongan yang paling diminati oleh mahasiswa saat ini.</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-6xl mx-auto">
            <div class="max-w-sm w-full mx-auto bg-white rounded-lg border border-gray-200 overflow-hidden">
                <div class="p-6">
                    <img src="{{ asset('images/Logo/KAI.png') }}" alt="KAI Logo" class="h-20 mb-1">
                    <h2 class="text-[14px] font-medium text-gray-400 mb-2">PT Kereta Api Indonesia (Persero)</h2>
                    <h3 class="text-[18px] font-semibold text-mirage-950 leading-snug mb-4">
                        Internship KAI 2025 – IT Department,<br>Open for Informatics Engineering Students
                    </h3>

                    <div class="flex items-center font-medium text-[14px] text-gray-400 mb-1">
                        <span>Kota Madiun</span>
                    </div>

                    <div class="flex items-center text-[14px] font-reguler text-mirage-950 mb-3">
                        <span>5 Posisi</span>
                        <span class="mx-1">•</span>
                        <span>20 Pelamar</span>
                    </div>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="bg-green-100 text-green-600 text-xs font-medium px-3 py-1 rounded-full">Umum</span>
                        <span class="bg-gray-200 text-gray-600 text-xs font-medium px-3 py-1 rounded-full">6
                            Bulan</span>
                        <span class="bg-gray-200 text-gray-600 text-xs font-medium px-3 py-1 rounded-full">Onsite</span>
                    </div>

                    <hr class="my-4">

                    <div class="text-sm mb-4">
                        <span class="font-medium text-[14px] text-gray-400">Penutupan :</span>
                        <span class="text-red-500 font-semibold">30 April 2025</span>
                    </div>

                    <div
                        class="flex items-center gap-2 font-reguler text-gray-500 text-xs bg-gray-100 p-2 rounded-lg mb-4">
                        <svg class="w-6 h-6 text-gray-500 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
                        </svg>
                        <span>Dibuat 2 hari yang lalu</span>
                    </div>

                    <button type="button"
                        class="w-full text-white bg-blue-500 hover:bg-blue-800 font-semibold rounded-[8px] text-sm px-5 py-2.5 text-center transition-all duration-300 ease-in-out">
                        Lihat Detail
                    </button>
                </div>
            </div>
            <div class="max-w-sm w-full mx-auto bg-white rounded-lg border border-gray-200 overflow-hidden">
                <div class="p-6">
                    <img src="{{ asset('images/Logo/Gresik.png') }}" alt="KAI Logo" class="h-20 mb-1">
                    <h2 class="text-[14px] font-medium text-gray-400 mb-2">PT Petrokimia Gresik</h2>
                    <h3 class="text-[18px] font-semibold text-mirage-950 leading-snug mb-4">
                        Internship Petrokimia 2025 – IT Department,<br>Open for Informatics Engineering Students
                    </h3>

                    <div class="flex items-center font-medium text-[14px] text-gray-400 mb-1">
                        <span>Kota Gresik</span>
                    </div>

                    <div class="flex items-center text-[14px] font-reguler text-mirage-950 mb-3">
                        <span>25 Posisi</span>
                        <span class="mx-1">•</span>
                        <span>5 Pelamar</span>
                    </div>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <span
                            class="bg-green-100 text-green-600 text-xs font-medium px-3 py-1 rounded-full">Umum</span>
                        <span class="bg-gray-200 text-gray-600 text-xs font-medium px-3 py-1 rounded-full">6
                            Bulan</span>
                        <span
                            class="bg-gray-200 text-gray-600 text-xs font-medium px-3 py-1 rounded-full">Onsite</span>
                    </div>

                    <hr class="my-4">

                    <div class="text-sm mb-4">
                        <span class="font-medium text-[14px] text-gray-400">Penutupan :</span>
                        <span class="text-red-500 font-semibold">30 April 2025</span>
                    </div>

                    <div
                        class="flex items-center gap-2 font-reguler text-gray-500 text-xs bg-gray-100 p-2 rounded-lg mb-4">
                        <svg class="w-6 h-6 text-gray-500 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
                        </svg>
                        <span>Dibuat 2 hari yang lalu</span>
                    </div>

                    <button type="button"
                        class="w-full text-white bg-blue-500 hover:bg-blue-800 font-semibold rounded-[8px] text-sm px-5 py-2.5 text-center transition-all duration-300 ease-in-out">
                        Lihat Detail
                    </button>
                </div>
            </div>
            <div class="max-w-sm w-full mx-auto bg-white rounded-lg border border-gray-200 overflow-hidden">
                <div class="p-6">
                    <img src="{{ asset('images/Logo/KimiaFarma.png') }}" alt="KAI Logo" class="h-20 mb-1">
                    <h2 class="text-[14px] font-medium text-gray-400 mb-2">Kimia Farma (Persero) Tbk</h2>
                    <h3 class="text-[18px] font-semibold text-mirage-950 leading-snug mb-4">
                        Internship Kimia Farma 2025 – IT Department,<br>Open for Informatics Engineering Students
                    </h3>

                    <div class="flex items-center font-medium text-[14px] text-gray-400 mb-1">
                        <span>Kota Madiun</span>
                    </div>

                    <div class="flex items-center text-[14px] font-reguler text-mirage-950 mb-3">
                        <span>2 Posisi</span>
                        <span class="mx-1">•</span>
                        <span>10 Pelamar</span>
                    </div>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <span
                            class="bg-green-100 text-green-600 text-xs font-medium px-3 py-1 rounded-full">Umum</span>
                        <span class="bg-gray-200 text-gray-600 text-xs font-medium px-3 py-1 rounded-full">6
                            Bulan</span>
                        <span
                            class="bg-gray-200 text-gray-600 text-xs font-medium px-3 py-1 rounded-full">Onsite</span>
                    </div>

                    <hr class="my-4">

                    <div class="text-sm mb-4">
                        <span class="font-medium text-[14px] text-gray-400">Penutupan :</span>
                        <span class="text-red-500 font-semibold">30 April 2025</span>
                    </div>

                    <div
                        class="flex items-center gap-2 font-reguler text-gray-500 text-xs bg-gray-100 p-2 rounded-lg mb-4">
                        <svg class="w-6 h-6 text-gray-500 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
                        </svg>
                        <span>Dibuat 2 hari yang lalu</span>
                    </div>

                    <button type="button"
                        class="w-full text-white bg-blue-500 hover:bg-blue-800 font-semibold rounded-[8px] text-sm px-5 py-2.5 text-center transition-all duration-300 ease-in-out">
                        Lihat Detail
                    </button>
                </div>
            </div>
            <div class="max-w-sm w-full mx-auto bg-white rounded-lg border border-gray-200 overflow-hidden">
                <div class="p-6">
                    <img src="{{ asset('images/Logo/BUMN.png') }}" alt="KAI Logo" class="h-20 mb-1">
                    <h2 class="text-[14px] font-medium text-gray-400 mb-2">Badan Usaha Milik Negara</h2>
                    <h3 class="text-[18px] font-semibold text-mirage-950 leading-snug mb-4 ">
                        Internship BUMN 2025 – IT Department,<br>Open for Informatics Engineering Students
                    </h3>

                    <div class="flex items-center font-medium text-[14px] text-gray-400 mb-1">
                        <span>Kota Jakarta Selatan</span>
                    </div>

                    <div class="flex items-center text-[14px] font-reguler text-mirage-950 mb-3">
                        <span>10 Posisi</span>
                        <span class="mx-1">•</span>
                        <span>20 Pelamar</span>
                    </div>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <span
                            class="bg-green-100 text-green-600 text-xs font-medium px-3 py-1 rounded-full">Umum</span>
                        <span class="bg-gray-200 text-gray-600 text-xs font-medium px-3 py-1 rounded-full">6
                            Bulan</span>
                        <span
                            class="bg-gray-200 text-gray-600 text-xs font-medium px-3 py-1 rounded-full">Onsite</span>
                    </div>

                    <hr class="my-4">

                    <div class="text-sm mb-4">
                        <span class="font-medium text-[14px] text-gray-400">Penutupan :</span>
                        <span class="text-red-500 font-semibold">30 April 2025</span>
                    </div>

                    <div
                        class="flex items-center gap-2 font-reguler text-gray-500 text-xs bg-gray-100 p-2 rounded-lg mb-4">
                        <svg class="w-6 h-6 text-gray-500 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
                        </svg>
                        <span>Dibuat 2 hari yang lalu</span>
                    </div>

                    <button type="button"
                        class="w-full text-white bg-blue-500 hover:bg-blue-800 font-semibold rounded-[8px] text-sm px-5 py-2.5 text-center transition-all duration-300 ease-in-out">
                        Lihat Detail
                    </button>
                </div>
            </div>
        </div>
        <div class="text-center mt-10">
            <button type="button"
                class="flex items-center mx-auto gap-2 text-blue-500 bg-white border border-blue-500 hover:bg-blue-500 hover:text-white font-semibold rounded-[8px] text-sm px-4 py-3 group transition-all duration-300 ease-in-out">
                Lihat Lebih Banyak
                <svg class="w-6 h-6 text-current group-hover:text-white transition-all duration-300 ease-in-out"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 12H5m14 0-4 4m4-4-4-4" />
                </svg>
            </button>
        </div>
    </section>

    <!-- 5 Langkah Magang -->
    <section class="bg-blue-500 py-12 px-6">
        <div class="max-w-7xl mx-auto">
            <!-- H2 di tengah atas -->
            <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center text-white">
                5 Langkah, Langsung Magang!
            </h2>

            <div class="flex flex-col md:flex-row items-center gap-10">
                <!-- Image -->
                <div class="flex justify-center md:w-1/2">
                    <img src="{{ asset('images/Panduan.png') }}" alt="5 Langkah Magang" class="w-full max-w-md">
                </div>

                <!-- Steps -->
                <div class="md:w-1/2 text-white">
                    <div class="flex flex-col gap-4">

                        <!-- Step 1 -->
                        <div class="bg-blue-400 rounded-lg p-4 flex items-center gap-4 shadow-md">
                            <div class="flex-shrink-0 w-10 h-10 min-w-10 min-h-10 aspect-square rounded-full bg-white flex items-center justify-center text-blue-600 font-bold text-lg">
                                1
                            </div>
                            <div>
                                <h3 class="text-lg font-bold">Login ke akun</h3>
                                <p class="text-sm font-regular">Masuk ke akun kamu. Belum punya akun? Daftar dulu ya!</p>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="bg-blue-400 rounded-lg p-4 flex items-center gap-4 shadow-md">
                            <div class="flex-shrink-0 w-10 h-10 min-w-10 min-h-10 aspect-square rounded-full bg-white flex items-center justify-center text-blue-600 font-bold text-lg">
                                2
                            </div>
                            <div>
                                <h3 class="text-lg font-bold">Lengkapi profil kamu</h3>
                                <p class="text-sm font-regular">Isi data diri, keahlian, minat, lokasi favorit, dan upload dokumen
                                    penting kayak CV atau sertifikat.</p>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="bg-blue-400 rounded-lg p-4 flex items-center gap-4 shadow-md">
                            <div class="flex-shrink-0 w-10 h-10 min-w-10 min-h-10 aspect-square rounded-full bg-white flex items-center justify-center text-blue-600 font-bold text-lg">
                                3
                            </div>
                            <div>
                                <h3 class="text-lg font-bold">Lihat rekomendasi magang</h3>
                                <p class="text-sm font-regular">Sistem akan kasih daftar magang yang cocok banget sama profil kamu.</p>
                            </div>
                        </div>

                        <!-- Step 4 -->
                        <div class="bg-blue-400 rounded-lg p-4 flex items-center gap-4 shadow-md">
                            <div class="flex-shrink-0 w-10 h-10 min-w-10 min-h-10 aspect-square rounded-full bg-white flex items-center justify-center text-blue-600 font-bold text-lg">
                                4
                            </div>
                            <div>
                                <h3 class="text-lg font-bold">Ajukan lamaran dan pantau statusnya</h3>
                                <p class="text-sm font-regular">Klik magang yang kamu minati, kirim lamaran langsung dari sistem,
                                    lalu pantau statusnya secara real-time.</p>
                            </div>
                        </div>

                        <!-- Step 5 -->
                        <div class="bg-blue-400 rounded-lg p-4 flex items-center gap-4 shadow-md">
                            <div class="flex-shrink-0 w-10 h-10 min-w-10 min-h-10 aspect-square rounded-full bg-white flex items-center justify-center text-blue-600 font-bold text-lg">
                                5
                            </div>
                            <div>
                                <h3 class="text-lg font-bold">Lakukan magang, isi logbook, dan dapatkan sertifikat</h3>
                                <p class="text-sm ">Isi logbook rutin selama magang, upload laporan, dan dapatkan
                                    sertifikat setelah selesai.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    
    <!-- Footer -->
    <footer class="text-center text-sm text-gray-500 py-6 border-t mt-16">
        © 2025 Sigmagang. Semua hak dilindungi.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>



</body>

</html>
